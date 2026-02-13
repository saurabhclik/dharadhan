<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\ActionType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Property\FrontendPropertyRequest;
use App\Http\Requests\Property\FrontendUpdatePropertyRequest;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\User;
use App\Services\PropertyService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class FrontendController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        private readonly PropertyService $service)
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->checkAuthorization(Auth::user(), ['frontend.property.view']);
        $properties = auth()->user()->properties()->paginate(get_setting('default_pagination'));
        return view('frontend.myaccount.property.index',[
            'properties' => $properties
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function myLeads()
    {
        $this->checkAuthorization(Auth::user(), ['lead.view.list']);
        $requests = auth()->user()->leads()->paginate(get_setting('default_pagination'));
        return view('frontend.myaccount.my-leads',[
            'requests' => $requests
        ]);
    }

    public function myTransferredLeads()
    {
        $this->checkAuthorization(Auth::user(), ['lead.view.transfer']);
        $requests = auth()->user()->transferredLeads()->paginate(get_setting('default_pagination'));
        return view('frontend.myaccount.transferred-leads',[
            'requests' => $requests
        ]);
    }


    /**
     * create prperty.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addProperty()
    {
        $this->checkAuthorization(Auth::user(), ['frontend.property.create']);
        return view('frontend.myaccount.property.add-property', [
            'categories' => PropertyCategory::pluck('name', 'id')->toArray(),
            'statuses' => statuses(),
            'types' => Property::types(),
            'route' => route('myaccount.store.property')
        ]);
    }

    public function storeProperty(FrontendPropertyRequest $request){
        $this->checkAuthorization(Auth::user(), ['frontend.property.create']);

        try {
            $property = $this->service->createProperty($request->validated());

            if ($request->hasFile('featured_image')) {
                $upload = $request->file('featured_image');
                $image = Image::read($upload);

                $featuredPath = 'properties/featured/' . uniqid() . '.jpg';
                Storage::disk('public')->put($featuredPath, $image->encodeByExtension($upload->getClientOriginalExtension(), quality: 70));

                $property->featured_image = $featuredPath;
                $property->save();
            }

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    // Optimize image
                    $image = Image::read($file);

                    // Store image in public storage
                    $path = 'properties/' . uniqid() . '.jpg';
                    Storage::disk('public')->put($path, $image->encodeByExtension($file->getClientOriginalExtension(), quality: 70));

                    // Save record in DB
                    $property->images()->create([
                        'path' => $path,
                        'type' => 'property'
                    ]);
                }
            }

            if ($request->hasFile('plan_images')) {
                foreach ($request->file('plan_images') as $file) {
                    // Optimize image
                    $image = Image::read($file);

                    // Store image in public storage
                    $path = 'properties/' . uniqid() . '.jpg';
                    Storage::disk('public')->put($path, $image->encodeByExtension($file->getClientOriginalExtension(), quality: 70));

                    // Save record in DB
                    $property->images()->create([
                        'path' => $path,
                        'type' => 'site_plan'
                    ]);
                }
            }

            $this->storeActionLog(ActionType::CREATED, ['property' => $request->validated()]);
            return redirect()->route('myaccount.properties')->with('success', __('Property created successfully.'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', __('Failed to create property.'));
        }
    }

    /**
     * edit prperty.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editProperty($id)
    {
        $this->checkAuthorization(Auth::user(), ['frontend.property.create']);
        $property = $this->service->getPropertyById((int)$id);
        return view('frontend.myaccount.property.add-property', [
            'property' => $property,
            'categories' => PropertyCategory::pluck('name', 'id')->toArray(),
            'statuses' => statuses(),
            'types' => Property::types(),
            'route' => route('myaccount.update.property', $id)
        ]);
    }

     public function updateProperty(FrontendUpdatePropertyRequest $request, $id){
        $this->checkAuthorization(Auth::user(), ['frontend.property.create']);

        try {
            $property = $this->service->getPropertyById((int) $id);
            $this->service->updateProperty($property, $request->validated());

            if ($request->hasFile('featured_image')) {
                // Delete old featured image from storage
                if ($request->remove_featured_image && $property->featured_image) {
                    Storage::disk('public')->delete($property->featured_image);
                }

                $upload = $request->file('featured_image');
                $image = Image::read($upload);

                $featuredPath = 'properties/featured/' . uniqid() . '.jpg';
                $property->update(['featured_image' => $featuredPath]);

                Storage::disk('public')->put($featuredPath, $image->encodeByExtension($upload->getClientOriginalExtension(), quality: 70));

            }

            if ($request->hasFile('images')) {
                $property_image = $property->images()->where('type','property')->get();
                if($request->remove_images && $property_image) {
                    // Delete old images from storage and DB
                    foreach ($property_image as $oldImage) {
                        Storage::disk('public')->delete($oldImage->path);
                        $oldImage->delete();
                    }
                }

                foreach ($request->file('images') as $file) {
                    // Optimize image
                    $image = Image::read($file);

                    // Generate a unique file path
                    $path = 'properties/' . uniqid() . '.jpg';
                    Storage::disk('public')->put($path, $image->encodeByExtension($file->getClientOriginalExtension(), quality: 70));

                    // Save in DB
                    $property->images()->create([
                        'path' => $path,
                        'type' => 'property'
                    ]);
                }
            }
            if ($request->hasFile('plan_images')) {
                $property_plan_image = $property->images()->where('type','site_plan')->get();
                if($request->remove_plan_images && $property_plan_image) {
                    // Delete old images from storage and DB
                    foreach ($property_plan_image as $oldImage) {
                        Storage::disk('public')->delete($oldImage->path);
                        $oldImage->delete();
                    }
                }

                foreach ($request->file('plan_images') as $file) {
                    // Optimize image
                    $image = Image::read($file);

                    // Generate a unique file path
                    $path = 'properties/' . uniqid() . '.jpg';
                    Storage::disk('public')->put($path, $image->encodeByExtension($file->getClientOriginalExtension(), quality: 70));

                    // Save in DB
                    $property->images()->create([
                        'path' => $path,
                        'type' => 'site_plan'
                    ]);
                }
            }
            $this->storeActionLog(ActionType::UPDATED, ['property' => $property]);
            return redirect()->route('myaccount.properties')->with('success', __('Property updated successfully.'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', __('Failed to update property.'));
        }
    }
}
