<?php

declare(strict_types=1);

use \App\Models\Billing;
use App\Services\ImageService;
use App\Services\LanguageService;
use App\Services\MenuService\AdminMenuItem;
use App\Services\MenuService\AdminMenuService;
use App\Services\Modules\ModuleService;
use App\Services\PasswordService;
use App\Services\SlugService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Vite;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use App\Models\Locality;
use Illuminate\Support\Facades\Log;
function get_module_asset_paths(): array
{
    return app(ModuleService::class)->getModuleAssetPath();
}

/**
 * support for vite hot reload overriding manifest file.
 */
function module_vite_compile(string $module, string $asset, ?string $hotFilePath = null, $manifestFile = '.vite/manifest.json'): Vite
{
    return app(ModuleService::class)
        ->moduleViteCompile($module, $asset, $hotFilePath, $manifestFile);
}

/**
 * Invoke a method on the SettingService.
 *
 * @param  string  $method  The method name to invoke
 * @param  mixed  ...$parameters  The parameters to pass to the method
 *
 * @return mixed  The result of the method invocation
 */
function invoke_setting(string $method, ...$parameters): mixed
{
    $service = app(App\Services\SettingService::class);

    if (! method_exists($service, $method)) {
        throw new \InvalidArgumentException("Method {$method} does not exist on SettingService");
    }

    return $service->{$method}(...$parameters);
}

/**
 * Add a new setting.
 *
 * @param  string  $optionName  The name of the setting option
 * @param  mixed  $optionValue  The value of the setting option
 * @param  bool  $autoload  Whether to autoload this setting (default: false)
 */
function add_setting(string $optionName, mixed $optionValue, bool $autoload = false): void
{
    invoke_setting('addSetting', $optionName, $optionValue, $autoload);
}

/**
 * Update an existing setting.
 *
 * @param  string  $optionName  The name of the setting option
 * @param  mixed  $optionValue  The value of the setting option
 * @param  bool|null  $autoload  Whether to autoload this setting (default: null)
 */
function update_setting(string $optionName, mixed $optionValue, ?bool $autoload = null): bool
{
    return invoke_setting('updateSetting', $optionName, $optionValue, $autoload);
}

/**
 * Delete a setting.
 *
 * @param  string  $optionName  The name of the setting option
 */
function delete_setting(string $optionName): bool
{
    return invoke_setting('deleteSetting', $optionName);
}

/**
 * Get a setting value.
 *
 * @param  string  $optionName  The name of the setting option
 * @param  mixed  $default  The default value if the setting does not exist
 *
 * @return mixed  The setting value or the default value
 */
function get_setting(string $optionName, mixed $default = null): mixed
{
    try {
        return invoke_setting('getSetting', $optionName) ?? $default;
    } catch (\Exception $e) {
        return $default;
    }
}

/**
 * Get all settings.
 *
 * @param  int|bool|null  $autoload  Autoload setting (default: true)
 * @return array  All settings
 */
function get_settings(int|bool|null $autoload = true): array
{
    return invoke_setting('getSettings', $autoload);
}

/**
 * Store uploaded image and return its public URL.
 *
 * @param  \Illuminate\Http\Request|array  $input  Either the full request or a file from validated input
 * @param  string  $fileKey  The key name (e.g., 'photo')
 * @param  string  $path  Target relative path (e.g., 'uploads/contacts')
 */
function store_image_url($input, string $fileKey, string $path): ?string
{
    return app(ImageService::class)
        ->storeImageAndGetUrl($input, $fileKey, $path);
}

/**
 * Delete an image from the public path.
 *
 * @param  string  $imageUrl  The URL of the image to delete
 * @return bool  True if the image was deleted, false otherwise
 */
function delete_image_from_public_path(string $imageUrl): bool
{
    return app(ImageService::class)
        ->deleteImageFromPublic($imageUrl);
}

/**
 * Add a menu item to the admin sidebar.
 *
 * @param  array|AdminMenuItem  $item  The menu item configuration array or instance
 * @param  string|null  $group  The group to add the item to (defaults to 'Main')
 */
function add_menu_item(array|AdminMenuItem $item, ?string $group = null): void
{
    app(AdminMenuService::class)->addMenuItem($item, $group);
}

/**
 * Get the list of available languages with their flags.
 */
function get_languages(): array
{
    return app(LanguageService::class)->getActiveLanguages();
}

/**
 * Get the SVG icon for a given name.
 *
 * @param  string  $name  The name of the icon file (without .svg extension)
 * @param  string  $classes  Additional CSS classes to apply to the SVG
 * @param  string  $fallback  Fallback icon name if the SVG file does not exist
 * @return string  The SVG icon HTML or an Iconify icon if the SVG does not exist
 */
function svg_icon(string $name, string $classes = '', string $fallback = ''): string
{
    return app(ImageService::class)
        ->getSvgIcon($name, $classes, $fallback);
}

/**
 * Generate a unique slug for a given string.
 *
 * @param  string  $string  The base string to generate the slug from
 * @param  string  $column  The column name to check for uniqueness (default: 'slug')
 * @param  string  $separator  The separator to use in the slug (default: '-')
 * @param  Model|null  $model  The model instance if checking against an existing record
 *
 * @return string  The generated unique slug
 */
function generate_unique_slug(string $string, string $column = 'slug', string $separator = '-', $model = null): string
{
    return app(SlugService::class)
        ->generateSlugFromString(
            $string,
            $column,
            $separator,
            $model
        );
}

/**
 * Generate a secure password.
 *
 * @param  int  $length  The length of the password
 * @param  bool  $includeSpecialChars  Whether to include special characters
 *
 * @return string  The generated password
 */
function generate_secure_password(int $length = 12, bool $includeSpecialChars = true): string
{
    return app(PasswordService::class)
        ->generatePassword($length, $includeSpecialChars);
}


function get_invoice_number(): string
{
    $lastInvoice = Billing::orderBy('id', 'desc')->first();
    if (!$lastInvoice) {
        return 'INV-1000';
    }
    $lastNumber = (int) str_replace('INV-', '', $lastInvoice->invoice_no);
    return 'INV-' . ($lastNumber + 1);
}

function formatAmountForGateway($amount, $provider) {
    if ($provider === 'stripe') {
        // Stripe needs integer (minor unit)
        return intval(round($amount * 100));
    }
    if ($provider === 'paypal') {
        // PayPal needs string with 2 decimals
        return number_format($amount, 2, '.', '');
    }
    return $amount;
}

function formatPrice($price){
    $price = (int) $price;
    return env('CURRENCY_SYMBOL','₹') . number_format($price, 0, '.', ',');
}

function statuses(){
    return [
        'active' => 'Active',
        'inactive' => 'Inactive',
    ];
}

function moderateStatuses(){
    return [
        ...statuses(),
        'review' => 'Pending Review',
        'moderate' => 'Moderate',
    ];
}

function propertyCurrentStatus(){
    return [
        'available'         => 'Available',
        'pending'           => 'Pending',
        'under_offer'       => 'Under Offer',
        'in_progress'       => 'In Progress',
        'ready_to_move'     => 'Ready to Move',
        'under_construction'=> 'Under Construction',
        'sold'              => 'Sold',
        'rented'            => 'Rented',
        'closed'            => 'Closed',
        'on_hold'           => 'On Hold',
        'cancelled'         => 'Cancelled',
    ];
}

function leadInterests(){
    return [
        'buying' => 'Buying',
        'selling' => 'Selling',
        'renting' => 'Renting',
        'other' => 'Other'
    ];
}

function sendOtp($phone)
{
    $phone = preg_replace('/[^0-9]/', '', $phone);
    if(strlen($phone) > 10)
    {
        $phone = substr($phone, -10);
    }
    session([
        'otpsession_id' => $phone,
        'password_otp_time' => now(),
        'phone' => $phone
    ]);
    $otp = rand(100000, 999999);
    Cache::put('otp_'.$phone, $otp, now()->addMinutes(5));
    $apiKey = env('SMSWALA_API_KEY', '369B3A52DE81CB');
    $campaign = env('SMSWALA_CAMPAIGN_ID', '17206');
    $routeid = '30';
    $senderid = env('SMSWALA_SENDER_ID', 'DHRDHN');
    $template_id = env('SMSWALA_TEMPLATE_ID', '1707177337770473217');
    $message = "Your OTP for login is $otp. Do not share this code with anyone. Valid for 5 minutes. -Dharadhan Ventures Private Limited";

    $postData = [
        'key' => $apiKey,
        'campaign' => $campaign,
        'routeid' => $routeid,
        'type' => 'text',
        'contacts' => $phone,
        'senderid' => $senderid,
        'msg' => $message,
        'template_id' => $template_id
    ];
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://sms.smswala.in/app/smsapi/index.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query($postData),
        CURLOPT_TIMEOUT => 30,
    ]);

    $response = curl_exec($curl);
    $error = curl_error($curl);
    log::info($response);
    curl_close($curl);
    if ($error || strpos($response, 'ERR:') !== false)
    {
        return response()->json([
            'status' => 'error',
            'message' => 'OTP sending failed.'
        ],500);
    }

    if (strpos($response,'SMS-SHOOT-ID') !== false) 
    {
        return response()->json([
            'status' => 'success',
            'message' => 'OTP sent successfully.'
        ]);
    }

    return response()->json([
        'status' => 'error',
        'message' => 'OTP sending failed.'
    ],500);
}

function verifyOtp($phone, $otp)
{
    $phone = preg_replace('/[^0-9]/', '', $phone);
    if(strlen($phone) > 10) $phone = substr($phone, -10);

    $cachedOtp = Cache::get('otp_'.$phone);
    if($cachedOtp && $cachedOtp == $otp) 
    {
        Cache::forget('otp_'.$phone);
        return true;
    }
    return false;
}

// function sendOtp($phone)
// {
//     if(env('SMS_MODE') === 'local') {
//         session()->put('otpsession_id', "asdlkajsdkljaslkdj");
//         return response()->json([
//             'status' => 'success',
//             'message' => 'OTP sent successfully.'
//         ]);
//     }

//     $phone = "+91".$phone;
//     $apiKey = env("SMS_API_KEY");

//     $url = "https://2factor.in/API/V1/$apiKey/SMS/$phone/AUTOGEN/OTP1";
//     $curl = curl_init();

//     curl_setopt_array($curl, [
//         CURLOPT_URL => $url,
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_TIMEOUT => 20,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => "GET",
//     ]);

//     $response = curl_exec($curl);
//     $error = curl_error($curl);

//     curl_close($curl);

//     if ($error) {
//         return response()->json([
//             'status' => 'error',
//             'message' => 'OTP sending failed. Please try again.',
//         ], 500);
//     }

//     $result = json_decode($response, true);

//     if(isset($result['Status']) && $result['Status'] = "Success"){
//         session()->put('otpsession_id', $result['Details']);
//     }else{
//         return response()->json([
//             'status' => 'error',
//             'message' => 'OTP sending failed. Please try again.',
//         ], 500);
//     }

//     return response()->json([
//         'status' => 'success',
//         'message' => 'OTP sent successfully.'
//     ]);
// }

// function verifyOtp($otpsession_id, $otp)
// {
//     if(env('SMS_MODE') === 'local') return true;

//     $apiKey = env("SMS_API_KEY");
//     $url = "https://2factor.in/API/V1/$apiKey/SMS/VERIFY/$otpsession_id/$otp";
//     $curl = curl_init();

//     curl_setopt_array($curl, [
//         CURLOPT_URL => $url,
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_CUSTOMREQUEST => "GET",
//     ]);

//     $response = curl_exec($curl);
//     $error = curl_error($curl);

//     curl_close($curl);

//     if ($error) {
//         return false;
//     }

//     $result = json_decode($response, true);
//     if(isset($result['Status']) && $result['Status'] == "Success"){
//         return true;
//     }
//     return false;
// }

function sendLoginDetails($data)
{
    $user = auth()->user();
}

function getUserPhoto($user)
{
    return $user->photo ? asset('uploads/users/' . $user->photo) : asset('images/testimonials/ts-1.jpg');
}

function propertyModes()
{
    return ['sell' => 'Sell', 'rent' => 'Rent/Lease'];
}

if (!function_exists('propertyStepRoute')) 
{
    function propertyStepRoute($step)
    {
        switch ($step) 
        {
            case "one":
                return route('post.property.primarydetails');
            case "two":
                return route('post.property.location');
            case "three":
                return route('post.property.basicdetails');
            case "four":
                return route('post.property.photodetails');
            case "five":
                return route('post.property.features');
            default:
                return route('post.property.primarydetails');
        }
    }
}

if (!function_exists('getPropertyViewByType')) {
    function getPropertyViewByType()
    {
        $type = session('post_property.type');
        switch ($type) {
            case "R":
                return 'frontend.post.r.basic';
            case "C":
                return 'frontend.post.c.basic';
            default:
                return 'frontend.post.r.basic';
        }
    }
}

function allAmenities(){
    return [
        "Basic" => [
            "power_backup" => "Power Backup",
            "lift" => "Lift/Elevator",
            "parking" => "Parking",
            "security" => "24x7 Security",
            "cctv" => "CCTV Surveillance",
            "intercom" => "Intercom",
        ],

        "Recreation" => [
            "gym" => "Gym",
            "swimming_pool" => "Swimming Pool",
            "club_house" => "Club House",
            "kids_play_area" => "Kids Play Area",
            "garden" => "Garden/Park",
            "indoor_games" => "Indoor Games Room",
            "banquet_hall" => "Banquet Hall"
        ],

        "Convenience" => [
            "wifi" => "Wi-Fi",
            "shopping_center" => "Shopping Center",
            "visitors_parking" => "Visitors Parking",
            "community_hall" => "Community Hall",
            "maintenance_staff" => "Maintenance Staff",
        ],

        "Environment" => [
            "rainwater_harvesting" => "Rainwater Harvesting",
            "solar_panels" => "Solar Panels",
            "landscaped_gardens" => "Landscaped Gardens",
            "sewage_treatment" => "Sewage Treatment Plant",
            "waste_management" => "Waste Management System"
        ],

        "Safety" => [
            "fire_alarm" => "Fire Alarm",
            "fire_safety" => "Fire Safety Systems",
            "earthquake_resistant" => "Earthquake Resistant Structure"
        ],

        "Luxury" => [
            "spa" => "Spa",
            "theatre" => "Mini Theatre",
            "jogging_track" => "Jogging Track",
            "roof_garden" => "Rooftop Garden"
        ],
    ];

}

function getBhks(){
    return [
        '1bhk' => '1 BHK',
        '2bhk' => '2 BHK',
        '3bhk' => '3 BHK',
        '4bhk' => '4 BHK',
        'ohherbhk' => 'Other'
    ];
}

function getBedBathRooms($length = 4){

    return array_combine(range(1, $length ?? 4), range(1, $length ?? 4));
}


function getAvailability(){
    return ['yes' => 'yes', 'no' => 'No'];
}


function getOwnership(){
    return [
        'freehold' => 'Freehold',
        'leasehold' => 'Leasehold',
        'cooperative_society' => 'Co-operative Society',
        'power_of_attorney' => 'Power of Attorney',
    ];
}


if (!function_exists('jaipur_locations')) {
    function jaipur_locations()
    {
        return [
            [
                'name' => 'Jaipur',
                'keyword' => 'jaipur',
                'city' => 'Jaipur',
                'lat' => 26.9124,
                'lng' => 75.7873,
            ],
            [
                'name' => 'C-Scheme',
                'keyword' => 'c-scheme',
                'city' => 'Jaipur',
                'lat' => 26.9012,
                'lng' => 75.7873,
            ],
            [
                'name' => 'Civil Lines',
                'keyword' => 'civil-lines',
                'city' => 'Jaipur',
                'lat' => 26.9237,
                'lng' => 75.7980,
            ],
            [
                'name' => 'Malviya Nagar',
                'keyword' => 'malviya-nagar',
                'city' => 'Jaipur',
                'lat' => 26.8556,
                'lng' => 75.8069,
            ],
            [
                'name' => 'Vaishali Nagar',
                'keyword' => 'vaishali-nagar',
                'city' => 'Jaipur',
                'lat' => 26.9147,
                'lng' => 75.7412,
            ],
            [
                'name' => 'Mansarovar',
                'keyword' => 'mansarovar',
                'city' => 'Jaipur',
                'lat' => 26.8567,
                'lng' => 75.7620,
            ],
            [
                'name' => 'Jagatpura',
                'keyword' => 'jagatpura',
                'city' => 'Jaipur',
                'lat' => 26.8575,
                'lng' => 75.8800,
            ],
            [
                'name' => 'Nirman Nagar',
                'keyword' => 'nirman-nagar',
                'city' => 'Jaipur',
                'lat' => 26.8820,
                'lng' => 75.7800,
            ],
            [
                'name' => 'Bani Park',
                'keyword' => 'bani-park',
                'city' => 'Jaipur',
                'lat' => 26.9220,
                'lng' => 75.8050,
            ],
            [
                'name' => 'Pratap Nagar',
                'keyword' => 'pratap-nagar',
                'city' => 'Jaipur',
                'lat' => 26.9350,
                'lng' => 75.7700,
            ],
        ];
    }
}


if (!function_exists('get_approval_authorities')) {
    /**
     * Returns all valid property approval authorities
     *
     * @return array
     */
    function get_approval_authorities(): array
    {
        return [
            'JDA',
            'RERA',
            'RHB',
            'JNN',
            'Sociaty Patta',
        ];
    }
}

function getPlans()
{
    return [
        'SBA' => [
            'title' => 'Special Business Associate',
            'mrp'   => 1,
            'price' => 1,
            'benefits' => [
                'Unlimited property listings',
                'Top priority listing visibility',
                'Dedicated relationship manager',
                'Featured on homepage',
                'Lead assignment priority',
            ],
            'powers' => [
                'Add unlimited properties',
                'Edit & boost listings anytime',
                'Access to premium analytics',
                'Can create sub-agents',
            ],
            'child_plans' => ['BA', 'RFC', 'RC']
        ],

        'BA' => [
            'title' => 'Business Associate',
            'mrp'   => 11000,
            'price' => 5100,
            'benefits' => [
                'Up to 365 property listings',
                'Higher visibility in search',
                'Verified agent badge',
            ],
            'powers' => [
                'Add & edit properties',
                'Basic analytics access',
            ],
            'child_plans' => ['RFC', 'RC']
        ],

        'RFC' => [
            'title' => 'Real Estate and Finance Consultant',
            'mrp'   => 5100,
            'price' => 1100,
            'benefits' => [
                'Earn referral commission',
                'Access referral dashboard',
            ],
            'powers' => [
                'Refer properties',
                'Track commissions',
            ],
            'child_plans' => ['RC']
        ],

        'RC' => [
            'title' => 'Referral Consultant',
            'mrp'   => 5100,
            'price' => 1100,
            'benefits' => [
                'Earn referral commission',
                'Access referral dashboard',
            ],
            'powers' => [
                'Refer properties',
                'Track commissions',
            ],
        ],
    ];
}


function getPlan($key){
    $plans =  getPlans();
    return $plans[$key];
}

function cities()
{
    return cache()->remember('cities_grouped', 3600, function () 
    {
        return [
            'nearby_cities' => Locality::nearby()->active()->ordered()->get(['name', 'slug'])->toArray(),
            'popular_cities' => Locality::popular()->active()->ordered()->get(['name', 'slug'])->toArray(),
            'other_cities' => Locality::other()->active()->ordered()->get(['name', 'slug'])->toArray(),
        ];
    });
}
function sortCitiesByName($key)
{
    $cities = cities();
    return collect($cities[$key])
        ->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)
        ->values()
        ->all();
}

function shortName($name){
    $parts = explode(' ', $name);
    if(count($parts) >= 2){
        return strtoupper(substr($parts[0], 0, 1) . substr($parts[1], 0, 1));
    }
    return strtoupper(substr($name, 0, 2));
}