<?php

declare(strict_types=1);

use App\Http\Controllers\Backend\ActionLogController;
use App\Http\Controllers\Backend\ActivityController;
use App\Http\Controllers\Backend\AgentController;
use App\Http\Controllers\Backend\Auth\ScreenshotGeneratorLoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\LeadController;
use App\Http\Controllers\Backend\LocaleController;
use App\Http\Controllers\Backend\ModulesController;
use App\Http\Controllers\Backend\PermissionsController;
use App\Http\Controllers\Backend\PostsController;
use App\Http\Controllers\Backend\ProfilesController;
use App\Http\Controllers\Backend\PropertyCategoryController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\RatingController;
use App\Http\Controllers\Backend\CareerApplicationController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\TermsController;
use App\Http\Controllers\Backend\TranslationController;
use App\Http\Controllers\Backend\UserLoginAsController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\PropertyEngagementController as EngagementController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\PropertyReactionController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\MobileForgotPasswordController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\Backend\LocalityController;
use App\Http\Controllers\PaymentController;
Route::get('/clear-all', function () 
{
    Artisan::call('optimize:clear');
    return "All cache cleared!";
});

Route::get('/migrate', function () 
{
    try 
    {
        Artisan::call('migrate');
        return 'Migrated successfully!';
    } 
    catch (\Exception $e) 
    {
        return 'Error: ' . $e->getMessage();
    }
});

Route::get('/seed', function () 
{
    try 
    {
        Artisan::call('db:seed');
        return 'Migrated successfully!';
    } 
    catch (\Exception $e) 
    {
        return 'Error: ' . $e->getMessage();
    }
});

Route::get('/run-storage-link', function () 
{
    try 
    {
        Artisan::call('storage:link');
        return 'Storage link created successfully!';
    } 
    catch (\Exception $e) 
    {
        return 'Error: ' . $e->getMessage();
    }
});
Route::get('/refresh-storage', function () 
{
    $src = storage_path('app/public');
    $dst = public_path('storage');
    \File::deleteDirectory($dst);
    \File::copyDirectory($src, $dst);
    return 'Storage refreshed!';
});
Route::middleware(['refresh.storage'])->group(function(){

    Route::get('/', [SiteController::class, 'index'])->name('index');
    Route::post('/submit-rating', [SiteController::class, 'storeRating'])->name('rating.store');

    Route::get('search', [SiteController::class, 'search']);
    Route::post('/ajax/login', [App\Http\Controllers\Auth\LoginController::class, 'ajaxLogin'])->name('ajax.login');
    Route::post('/ajax/signup', [App\Http\Controllers\Auth\LoginController::class, 'ajaxSignup'])->name('ajax.signup');
    Route::post('/ajax/send-otp', [App\Http\Controllers\Auth\LoginController::class, 'sendOtp'])->name('ajax.send.otp');
    Route::post('/ajax/verify-otp', [App\Http\Controllers\Auth\LoginController::class, 'verifyOtp'])->name('ajax.verify.otp');
    Route::post('/save-signup', [App\Http\Controllers\Auth\LoginController::class, 'saveSignupData'])->name('save.signup');

    Route::get('/forgot-password', [MobileForgotPasswordController::class, 'showForm'])
        ->name('password.forgot');
    Route::post('/forgot-password/send-otp', [MobileForgotPasswordController::class, 'sendOtp'])
        ->name('password.sendOtp');

    Route::post('/forgot-password/verify-otp', [MobileForgotPasswordController::class, 'verifyOtp'])
        ->name('password.verifyOtp');

    Route::post('/forgot-password/reset', [MobileForgotPasswordController::class, 'resetPassword'])
        ->name('password.reset.mobile');

    Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
    Route::post('/contact/send', [SiteController::class, 'send']);

    Route::get('/about', [SiteController::class, 'about'])->name('about');
    Route::get('/properties', [SiteController::class, 'properties'])->name('properties');
    Route::get('/property/{id}/details', [SiteController::class, 'propertiesDetail'])->name('property.details');

    Route::get('/post/property', [SiteController::class, 'postProperty'])->name('post.property');
    Route::post('/post/property/add/post', [SiteController::class, 'postPropertyAddPost'])->name('post.property.add.post');
    Route::post('/post/property', [SiteController::class, 'savePostProperty'])->name('save.post.property');
    Route::middleware('auth')->group(function () {
        Route::post('/property/reaction', [PropertyReactionController::class, 'toggle'])
            ->name('property.reaction');
    });

    //add property step route
    Route::get('/post/property/primarydetails', [SiteController::class, 'postPropertyPrimaryDetails'])->name('post.property.primarydetails');
    Route::get('/post/property/location', [SiteController::class, 'postPropertyLocationDetails'])->name('post.property.location');
    Route::get('/post/property/basicdetails', [SiteController::class, 'postPropertyBasicDetails'])->name('post.property.basicdetails');
    Route::get('/post/property/photodetails', [SiteController::class, 'postPropertyPhotoDetails'])->name('post.property.photodetails');
    Route::get('/post/property/features', [SiteController::class, 'postPropertyFeatureDetails'])->name('post.property.features');
    Route::delete('/post/property/delete/{id}', [SiteController::class, 'postPropertyDelete'])
    ->name('post.property.delete');
    Route::get('services', [SiteController::class, 'services'])->name('services');
    Route::get('privacy-policy', [SiteController::class, 'privacyPolicy'])->name('privacy.policy');
    Route::get('terms', [SiteController::class, 'terms'])->name('terms');
    Route::get('refund-cancellation-policy', [SiteController::class, 'refundCancellationPolicy'])->name('refund.policy');
    Route::get('career', [SiteController::class, 'career'])->name('career');
    Route::post('career/apply', [SiteController::class, 'applyCareer'])->name('career.apply');

    Route::Get('/agents/listing', [SiteController::class, 'agentListing'])->name('agents.listing');
    Route::Get('/agent/{id}/details', [SiteController::class, 'agentDetail'])->name('agent.details');

    Route::get('/countries', [LocationController::class, 'getCountries']);
    Route::get('/states/{country_id}', [LocationController::class, 'getStates']);
    Route::get('/cities/{state_id}', [LocationController::class, 'getCities']);

    Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');

    Route::get('/submit-request', [NewsletterController::class, 'submitRequest'])->name('submit.request');
    Route::post('/submit-request', [NewsletterController::class, 'storeSubmitRequest'])->name('store.submit.request');


    Route::post('/payment/create-order', [PaymentController::class, 'createOrder'])->name('payment.create.order');
    Route::post('/payment/verify', [PaymentController::class, 'verifyPayment'])->name('payment.verify');
    Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment/failed', [PaymentController::class, 'paymentFailed'])->name('payment.failed');
    Route::get('/payment/details/{paymentId}', [PaymentController::class, 'getPaymentDetails'])->name('payment.details');
    Route::get('/payment/fetch/{paymentId}', [PaymentController::class, 'fetchRazorpayPayment'])->name('payment.fetch');
    Route::post('/payment/webhook', [PaymentController::class, 'handleWebhook'])->name('payment.webhook');
    Route::post('/payment/check-status', [PaymentController::class, 'checkPaymentStatus'])->name('payment.check.status');
    Route::group(['prefix' => 'myaccount', 'as' => 'myaccount.', 'middleware' => ['auth']], function ()
    {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('user-profile', [HomeController::class, 'userProfile'])->name('profile');
        Route::post('user-profile', [HomeController::class, 'updateProfile'])->name('store.profile');
        Route::get('change-password', [HomeController::class, 'changePassword'])->name('change.password');
        Route::post('change-password', [HomeController::class, 'savePassword'])->name('save.password');

        Route::get('properties', [FrontendController::class, 'index'])->name('properties');
        Route::get('add-property', [FrontendController::class, 'addProperty'])->name('add.property');
        Route::get('edit-property/{id}/edit', [FrontendController::class, 'editProperty'])->name('edit.property');
        Route::post('store-property', [FrontendController::class, 'storeProperty'])->name('store.property');
        Route::post('update-property/{id}', [FrontendController::class, 'updateProperty'])->name('update.property');

        Route::get('leads', [FrontendController::class, 'myLeads'])->name('leads');
        Route::get('transferred-leads', [FrontendController::class, 'myTransferredLeads'])->name('transferred.leads');
    });

    /**
     * Admin routes.
     */
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('roles', RolesController::class);
        Route::delete('roles/delete/bulk-delete', [RolesController::class, 'bulkDelete'])->name('roles.bulk-delete');

        // Permissions Routes.
        Route::get('/permissions', [PermissionsController::class, 'index'])->name('permissions.index');
        Route::get('/permissions/{id}', [PermissionsController::class, 'show'])->name('permissions.show');

        // Modules Routes.
        Route::get('/modules', [ModulesController::class, 'index'])->name('modules.index');
        Route::post('/modules/toggle-status/{module}', [ModulesController::class, 'toggleStatus'])->name('modules.toggle-status');
        Route::post('/modules/upload', [ModulesController::class, 'store'])->name('modules.store');
        Route::delete('/modules/{module}', [ModulesController::class, 'destroy'])->name('modules.delete');

        // Settings Routes.
        Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingsController::class, 'store'])->name('settings.store');

        // Translation Routes
        Route::get('/translations', [TranslationController::class, 'index'])->name('translations.index');
        Route::post('/translations', [TranslationController::class, 'update'])->name('translations.update');
        Route::post('/translations/create', [TranslationController::class, 'create'])->name('translations.create');

        // Login as & Switch back
        Route::resource('users', UsersController::class);
        Route::delete('users/delete/bulk-delete', [UsersController::class, 'bulkDelete'])->name('users.bulk-delete');
        Route::get('users/{id}/login-as', [UserLoginAsController::class, 'loginAs'])->name('users.login-as');
        Route::post('users/switch-back', [UserLoginAsController::class, 'switchBack'])->name('users.switch-back');

        // Action Log Routes.
        Route::get('/action-log', [ActionLogController::class, 'index'])->name('actionlog.index');

        // Content Management Routes

        // Posts/Pages Routes - Dynamic post types
        Route::get('/posts/{postType?}', [PostsController::class, 'index'])->name('posts.index');
        Route::get('/posts/{postType}/create', [PostsController::class, 'create'])->name('posts.create');
        Route::post('/posts/{postType}', [PostsController::class, 'store'])->name('posts.store');
        Route::get('/posts/{postType}/{id}', [PostsController::class, 'show'])->name('posts.show');
        Route::get('/posts/{postType}/{id}/edit', [PostsController::class, 'edit'])->name('posts.edit');
        Route::put('/posts/{postType}/{id}', [PostsController::class, 'update'])->name('posts.update');
        Route::delete('/posts/{postType}/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');
        Route::delete('/posts/{postType}/delete/bulk-delete', [PostsController::class, 'bulkDelete'])->name('posts.bulk-delete');

        // Terms Routes (Categories, Tags, etc.)
        Route::get('/terms/{taxonomy}', [TermsController::class, 'index'])->name('terms.index');
        Route::get('/terms/{taxonomy}/{term}/edit', [TermsController::class, 'edit'])->name('terms.edit');
        Route::post('/terms/{taxonomy}', [TermsController::class, 'store'])->name('terms.store');
        Route::put('/terms/{taxonomy}/{id}', [TermsController::class, 'update'])->name('terms.update');
        Route::delete('/terms/{taxonomy}/{id}', [TermsController::class, 'destroy'])->name('terms.destroy');
        Route::delete('/terms/{taxonomy}/delete/bulk-delete', [TermsController::class, 'bulkDelete'])->name('terms.bulk-delete');

        // Editor Upload Route
        Route::post('/editor/upload', [App\Http\Controllers\Backend\EditorController::class, 'upload'])->name('editor.upload');
    });

    Route::middleware(['auth'])
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {
            Route::resource('properties', PropertyController::class)
                ->names('properties');
            Route::delete('properties/delete/bulk-delete', [PropertyController::class, 'bulkDelete'])->name('properties.bulk-delete');

            //route property categories
            Route::resource('property/categories', PropertyCategoryController::class)
                ->names('property.categories');
            Route::delete('property/categories/delete/bulk-delete', [PropertyCategoryController::class, 'bulkDelete'])->name('property.categories.bulk-delete');

            // agents
            Route::resource('agents', AgentController::class)
                ->names('agents');
            Route::delete('agents/delete/bulk-delete', [AgentController::class, 'bulkDelete'])->name('agents.bulk-delete');

            //reviews
            Route::resource('reviews', ReviewController::class)
                ->names('reviews');
            Route::delete('reviews/delete/bulk-delete', [ReviewController::class, 'bulkDelete'])->name('reviews.bulk-delete');

            // Property Engagement
            Route::get('property-engagements', [EngagementController::class, 'index'])->name('engagements.index');

            //Ratings
            Route::resource('ratings', RatingController::class)
                ->names('ratings');
            Route::delete('ratings/delete/bulk-delete', [RatingController::class, 'bulkDelete'])->name('ratings.bulk-delete');

            //career applications
            Route::resource('career-applications', CareerApplicationController::class)
                ->names('career-applications');
            Route::delete('career-applications/delete/bulk-delete', [CareerApplicationController::class, 'bulkDelete'])->name('career-applications.bulk-delete');
            Route::get('career-applications/{id}/download', [CareerApplicationController::class, 'downloadResume'])->name('career-applications.download');


            //add activities routres
            Route::resource('activities', ActivityController::class);
            Route::delete('activities/delete/bulk-delete', [ActivityController::class, 'bulkDelete'])->name('activities.bulk-delete');

            //leads
            Route::resource('leads', LeadController::class)->except(['show']);        
            Route::delete('/leads/delete/bulk-delete', [LeadController::class, 'bulkDelete'])->name('leads.bulk-delete');
            Route::get('/leads/transferred', [LeadController::class, 'transferred'])->name('leads.transferred');        
            Route::post('/leads/{lead}/transfer', [LeadController::class, 'transfer'])->name('leads.transfer');

            Route::resource('videos', VideoController::class)
                ->names('videos');
            Route::delete('videos/delete/bulk-delete', [VideoController::class, 'bulkDelete'])
                ->name('videos.bulk-delete');

            Route::resource('logos', LogoController::class)->names('logos');
            Route::delete('logos/delete/bulk-delete', [LogoController::class, 'bulkDelete'])->name('logos.bulk-delete');
            Route::resource('localities', LocalityController::class)->names('localities');
            Route::delete('localities/delete/bulk-delete', [LocalityController::class, 'bulkDelete'])->name('localities.bulk-delete');
            });

    /**
     * Profile routes.
     */
    Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
        Route::get('/edit', [ProfilesController::class, 'edit'])->name('edit');
        Route::put('/update', [ProfilesController::class, 'update'])->name('update');
    });

    Route::get('/locale/{lang}', [LocaleController::class, 'switch'])->name('locale.switch');
    Route::get('/screenshot-login/{email}', [ScreenshotGeneratorLoginController::class, 'login'])->middleware('web')->name('screenshot.login');

});
Route::get('/clear-session', function () {
    session()->flush();  
    session()->regenerate(); 
    return redirect('/')->with('success', 'Session cleared successfully.');
})->name('clear.session');