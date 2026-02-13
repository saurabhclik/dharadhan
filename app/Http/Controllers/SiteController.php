<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use App\Models\CareerApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Rating;

class SiteController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return $this->loadIndex($request);
    }

    // public function indexOld(Request $request)
    // {
    //     $featuredProperties = Property::active()->featured()->inRandomOrder()->limit(3)->get();
    //     $forRentProperties = Property::active()->inRandomOrder()->where('mode', 'rent')->limit(3)->get();
    //     $forSellProperties = Property::active()->inRandomOrder()->where('mode', 'sell')->limit(3)->get();
    //     $topProperties = Property::active()->inRandomOrder()->limit(3)->get();

    //     $agents = User::role('agent')->inRandomOrder()->limit(4)->get();
    //     return view('index', [
    //         'featuredProperties' => $featuredProperties,
    //         'agents' => $agents,
    //         'forRentProperties' => $forRentProperties,
    //         'forSellProperties' => $forSellProperties,
    //         'topProperties' => $topProperties
    //     ]);
    // }

    public function loadIndex(Request $request)
    {
        $type = $request->type !== 'all' ? $request->type : null;

        $properties = Property::active()
            ->when($type, fn ($q) => $q->where('type', strtoupper($type)))
            ->latest()
            ->limit(6)
            ->get();
        $localities = Property::countsBySpecifiedLocalities();
        $countByOwner = Property::countsByOwnershipTypes();
        $countBudget = Property::active()
            ->whereRaw(
                'CAST(REPLACE(price, ",", "") AS UNSIGNED) BETWEEN ? AND ?',
                [0, 200000]
            )
            ->count();

        $totalProperties = Property::active()->count();
        $pgproperties = Property::active()
            ->latest()
            ->limit(10)
            ->get();

        $ip = request()->ip();

        $userRating = Rating::where('ip_address', $ip)
            ->latest()
            ->first();

        $stats = Rating::selectRaw('
            COUNT(*) as total_people,
            AVG(rating) as average_rating,
            SUM(CASE WHEN rating >= 4 THEN 1 ELSE 0 END) as happy_people
        ')
        ->whereNotNull('rating')
        ->first();

        $totalPeople  = $stats->total_people;
        $averageRating = round($stats->average_rating, 1);
        $happyPeople  = $stats->happy_people;

        $testimonials = Rating::whereNotNull('message')
            ->where('message', '!=', '')
            ->where('status', true)
            ->latest()
            ->take(6)
            ->get();

        return view('index',
        [
            'typeStats' => Property::typeStats(),
            'types' => Property::types(),
            'properties' => $properties,
            'localities' => $localities,
            'countByOwner' => $countByOwner,
            'totalProperties' => $totalProperties,
            'pgproperties' => $pgproperties,
            'countBudget' => $countBudget,
            'userRating' => $userRating,
            'averageRating' => $averageRating,
            'totalPeople' => $totalPeople,
            'happyPeople' => $happyPeople,
            'testimonials' => $testimonials
        ]);
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function properties(Request $request)
    {
        $keyword = trim($request->keyword) ?: null;
        $mode = $request->mode !== 'all' ? $request->mode : null;
        $type = $request->property_type !== 'all' ? $request->property_type : null;
        $user_type = $request->user_type !== 'all' ? $request->user_type : null;
        $sub_type = $request->sub_type !== 'all' ? $request->sub_type : null;
        $availability_status = $request->availability_status === "immediately_available" ? "yes" : null;

        $properties = Property::active()
            ->with([
                'likes:id,property_id',
                'dislikes:id,property_id',
                'favourites:id,property_id',
                'reactions' => function ($q) {
                    if (auth()->check()) {
                        $q->where('user_id', auth()->id());
                    }
                }
            ])
            ->when($keyword, function ($q) use ($keyword) {
                $q->where(function ($s) use ($keyword) {
                    $s->where('title', 'LIKE', "%{$keyword}%")
                    ->orWhere('location', 'LIKE', "%{$keyword}%")
                    ->orWhere('description', 'LIKE', "%{$keyword}%");
                });
            })
            ->when($mode, fn ($q) => $q->where('mode', $mode))
            ->when($type, fn ($q) => $q->where('property_type', $type))
            ->when($user_type, fn ($q) => $q->where('user_type', $user_type))
            ->when($sub_type, fn ($q) => $q->where('sub_type', $sub_type))
            ->when($availability_status, fn ($q) =>
                $q->where('availability_status', $availability_status)
            )

            ->latest()
            ->paginate(get_setting('default_pagination'))
            ->withQueryString();

        return view('frontend.properties', [
            'properties' => $properties,
            'types' => Property::types(),
        ]);
    }


    public function services(){
        return view('frontend.services');
    }

    public function terms(){
        return view('frontend.terms');
    }

    public function privacyPolicy(){
        return view('frontend.privacy-policy');
    }

    public function refundCancellationPolicy(){
        return view('frontend.refund-cancellation-policy');
    }

    public function career(){
        return view('frontend.career');
    }

    public function applyCareer(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255',
            'phone'    => 'required|string|max:20',
            'position' => 'required|string|max:255',
            'resume'   => 'required|mimes:pdf,doc,docx|max:2048',
            'message'  => 'nullable|string'
        ]);

        // Upload Resume
        $resumePath = $request->file('resume')->store('resumes', 'public');

        // Save to DB
        CareerApplication::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'position' => $request->position,
            'resume'   => $resumePath,
            'message'  => $request->message,
        ]);

        return back()->with('success', 'Your resume has been submitted successfully!');
    }

    public function propertiesDetail($propertyId){
        $property = Property::with(['category', 'reviews.user'])->findOrFail($propertyId);
        $reviews = $property->reviews()->with('user')->latest()->get();
        $featuredProperties = Property::featured()->latest()->limit(6)->get();
        $recentProperties = Property::latest()->limit(3)->get();
        $user = $property->agent;
        return view('frontend.property-detail' ,[
            'property' => $property,
            'review' => $reviews,
            'featuredProperties' => $featuredProperties,
            'recentProperties' => $recentProperties,
            'user' => $user
        ]);
    }

    public function send(Request $request)
    {
        // Validate
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'message'   => 'required|string',
        ]);

        // Ensure ADMIN_EMAIL exists
        $admin = env('ADMIN_EMAIL');
        if (empty($admin)) {
            // Log and return helpful error (or throw)
            Log::error('ADMIN_EMAIL is not set in .env');
            return response()->json(['success' => false, 'message' => 'Admin email not configured.'], 500);
        }

        // Send mail using Mailable
        try {
            Mail::to($admin)
                ->send(new ContactFormMail($data));
        } catch (\Exception $e) {
            Log::error('Contact form mail failed: '.$e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to send email.'], 500);
        }

        return response()->json(['success' => true, 'message' => 'Message sent successfully.']);
    }

    public function search(){
        return view('place_search');
    }

    public function postProperty (){
        $featuredProperties = Property::active()->featured()->inRandomOrder()->limit(3)->get();
        $forRentProperties = Property::active()->inRandomOrder()->where('mode', 'rent')->limit(3)->get();
        $forSellProperties = Property::active()->inRandomOrder()->where('mode', 'sell')->limit(3)->get();
        $topProperties = Property::active()->inRandomOrder()->limit(3)->get();
        $agents = User::role('agent')->inRandomOrder()->limit(4)->get();
        $postData = session('post_property');
        return view('post', [
            'featuredProperties' => $featuredProperties,
            'agents' => $agents,
            'forRentProperties' => $forRentProperties,
            'forSellProperties' => $forSellProperties,
            'topProperties' => $topProperties,
            'post' => $postData,
            'step' => 'one'
        ]);
    }

    public static function postPropertyAddPost(Request $request){
        session()->put('post_property', $request->all());
        session()->save();
        $route = propertyStepRoute($request->nextstep ?? "");
        return response()->json(['status' => 'success', 'message' => 'Great job! You’re almost done — just a few more property details to finish.', 'redirect' => $route]);
    }

    public static function unsetSessionData(){
        session()->forget([
            'post_property',
            'otpsession_id',
            'locationData',
            'basicData',
            'featured_image',
            'featureData',
            'property_images',
            'post_id'
        ]);
        session()->save();
    }

    public static function postPropertyPrimaryDetails(Request $request){
        if($request->has('id') || (session('post_id') != $request->id)){
            $property = Property::find($request->id);
            if($property){
                $propertyData = $property->toArray();
                unset($propertyData['created_at']);
                unset($propertyData['updated_at']);
                unset($propertyData['deleted_at']);

                $postProperty = [
                    'mode'  => $propertyData['mode'],
                    'userType'  => $propertyData['user_type'],
                    'mainType'  => $propertyData['property_type'],
                    'subType'  => $propertyData['sub_type'],
                    'subTypeItem'  => $propertyData['sub_type_item'],
                ];
                $locationData = [
                    'location' => $propertyData['location'],
                ];
                $basicData = [
                    'title' => $propertyData['title'],
                    'description' => $propertyData['description'],
                    "availability_status" => $propertyData["availability_status"],
                    "balconies" => $propertyData["balconies"],
                    "bathrooms" => $propertyData["bathrooms"],
                    "bedrooms" => $propertyData["bedrooms"],
                    "bhks" => $propertyData["bhks"],
                    "boundary_wall" => $propertyData["boundary_wall"],
                    "build_up_area" => $propertyData["build_up_area"],
                    "carpet_area" => $propertyData["carpet_area"],
                    "construction" => $propertyData["construction"],
                    "custombathrooms" => $propertyData["bedrooms"],
                    "custombedrooms" => $propertyData["bathrooms"],
                    "open_sides" => $propertyData["open_sides"],
                    "ownership" => $propertyData["ownership"],
                    "price" => $propertyData["price"],
                    "price_negotiable" => $propertyData["price_negotiable"],
                    "super_build_up_area" => $propertyData["super_build_up_area"],
                    "total_floors" => $propertyData["total_floors"],
                    "allowed_floors" => $propertyData["allowed_floors"],
                    "annual_dues" => $propertyData["annual_dues"],
                    "booking_amount" => $propertyData["booking_amount"],
                    "breadth" => $propertyData["breadth"],
                    "expected_rental" => $propertyData["expected_rental"],
                    "length" => $propertyData["length"],
                    "maintenance_amount" => $propertyData["maintenance_amount"],
                    "maintenance_type" => $propertyData["maintenance_type"],
                    "membership_charge" => $propertyData["membership_charge"],
                    "plot_area" => $propertyData["plot_area"],
                    "possession_by" => $propertyData["possession_by"],
                    'approved_by' => $propertyData["approved_by"]
                ];
                $featureData = [
                    'smart_home_features' => $propertyData['smart_home_features'],
                ];
                $property_images = $property->images()->where('type', 'property')->get()->pluck('path')->toArray();
                $featured_image = $property->featured_image;

                session()->put('post_id', $property->id);
                session()->put('property_images', $property_images);
                session()->put('featured_image', $featured_image);
                session()->put('post_property', $postProperty);
                session()->put('locationData', $locationData);
                session()->put('basicData', $basicData);
                session()->put('featureData', $featureData);
                session()->save();
            }else{
                self::unsetSessionData();
                session()->put('post_property', $request->all());
                session()->save();
            }
        }

        $postData = session('post_property') ?? [];
        return view('primarydetails',['post' => $postData, 'step' => 'one']);
    }

    public static function postPropertyLocationDetails(Request $request){
        $locationData = session('locationData') ?? [];
        $postData = array_merge(session('post_property'), $locationData);
        return view('primarylocation',['post' => $postData, 'step' => 'two']);
    }

    public static function postPropertyBasicDetails(Request $request){
        $basicData =  session('basicData') ?? [];
        $postData = array_merge(session('post_property') ?? [], session('locationData') ?? [], $basicData);
        return view('primarybasic',['post' => $postData, 'step' => 'three']);
    }

    public static function postPropertyPhotoDetails(Request $request){
        $postData = array_merge(session('post_property') ?? [], session('locationData') ?? [], session('basicData') ?? []);
        return view('primaryphoto',['post' => $postData, 'step' => 'four']);
    }

    public static function postPropertyFeatureDetails(Request $request){
        $fearturesData = session('featureData') ?? [];
        $postData = array_merge(session('post_property') ?? [], session('locationData') ?? [], session('basicData') ?? [], $fearturesData);
        return view('primaryfeature',['post' => $postData, 'step' => 'five']);
    }

    public static function savePostProperty(Request $request){
        if($request->has('step')){
            if($request->step == "two"){
                session()->put('locationData', $request->only(['location']));
            }elseif($request->step == "three"){
                session()->put('basicData', $request->all());
            }elseif($request->step == "four"){
                $sessionImages = session()->get('property_images', []);
                $sessionFeatured = session()->get('featured_image', null);
                // FEATURED IMAGE
                if ($request->hasFile('featured_image')) {
                    $file = $request->file('featured_image');
                    $path = $file->store('properties/featured', 'public');
                    session()->put('featured_image', $path);
                }

                // GALLERY IMAGES
                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $image) {
                        $path = $image->store('properties', 'public');
                        $sessionImages[] = $path;
                    }
                    session()->put('property_images', $sessionImages);
                }

            }elseif($request->step == "five"){
                session()->put('featureData', $request->only(['smart_home_features']));
            }
            session()->save();
        }
        $route = propertyStepRoute($request->nextstep ?? "");
        if($request->step == "five"){
            $property_data = array_merge(session('locationData'),session('basicData'),session('post_property'),session('featureData'));
            $property_data['user_id'] = auth()->user()->id;
            $property_data['user_type'] = $property_data['userType'];
            $property_data['property_type'] = $property_data['mainType'];
            $property_data['sub_type'] = $property_data['subType'];
            $property_data['sub_type_item'] = $property_data['subTypeItem'];
            $property_data['status'] = 'inactive';
            $property_data['property_category_id'] = 1;
            $property_data['current_status'] = "Pending";

            unset($property_data['submit_type']);
            unset($property_data['step']);
            unset($property_data['nextstep']);
            unset($property_data['_token']);
            unset($property_data['userType']);
            unset($property_data['mainType']);
            unset($property_data['subType']);
            unset($property_data['subTypeItem']);
            unset($property_data['custombathrooms']);
            unset($property_data['custombedrooms']);

            DB::beginTransaction();
            try{
                if(session()->has('post_id')){
                    $property = Property::find(session('post_id'));
                    $property_data['status'] = $property->status;
                    $property_data['current_status'] = $property->current_status;
                }else{
                    $property = null;
                }

                if(!$property){
                    $property = new Property();
                }

                $property->fill($property_data);
                $property->save();

                $sessionImages = session()->get('property_images', []);
                $sessionFeatured = session()->get('featured_image', null);

                if($sessionImages){
                    foreach($sessionImages as $image){
                        $property->images()->create([
                            'path' => $image,
                            'type' => 'property'
                        ]);
                    }
                }

                if($sessionFeatured){
                    $property->featured_image = $sessionFeatured;
                    $property->save();
                }

                self::unsetSessionData();
                DB::commit();
                return response()->json(['status' => 'success', 'message' => 'Great job! Your property has been created successfully. You’re all set to start getting inquiries!', 'redirect' => route('myaccount.properties')]);
            }catch (\Exception $e) {
                // Error ➜ Rollback all DB changes
                DB::rollBack();

                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to create property: ' . $e->getMessage(),
                ], 500);
            }

        }
        return response()->json(['status' => 'success', 'message' => 'Property saved successfully!', 'redirect' => $route]);
    }

    public function agentListing(){
        $agents = User::role('agent')->paginate(get_setting('default_pagination'));
        return view('frontend.agents', [
            'agents' => $agents
        ]);
    }

    public function agentDetail($id){
        $user = User::role('agent')->findOrFail($id);
        $featuredProperties = Property::featured()->latest()->limit(6)->get();
        $recentProperties = Property::latest()->limit(3)->get();
        $types = Property::types();
        return view('frontend.agent-detail', [
            'user' => $user,
            'featuredProperties' => $featuredProperties,
            'recentProperties' => $recentProperties,
            'types' => $types
        ]);
    }

    public function storeRating(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'device_hash' => 'required'
        ]);

        $ip = $request->ip();

        Rating::updateOrCreate(
            ['ip_address' => $ip], // condition
            [
                'name' => $request->name,
                'location' => $request->location,
                'rating' => $request->rating,
                'message' => $request->message,
                'is_testimonial' => filled($request->message),
                'status' => 'inactive',
            ]
        );

        return back()->with('success', 'Thank you for your feedback!');
    }
}
