<?php

use App\Http\Controllers\Backend\AboutUsController as BackendAboutUsController;
use App\Http\Controllers\Backend\ContactUsController as BackendContactUsController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\BlogController as BackendBlogController;
use App\Http\Controllers\Backend\EventsController as BackendEventsController;
use App\Http\Controllers\Backend\EventRegistrationsController as BackendEventRegistrationsController;
use App\Http\Controllers\Backend\AccreditationController as BackendAccreditationController;
use App\Http\Controllers\Backend\AreaOfFocusController;
use App\Http\Controllers\Backend\SubscriberController;
use App\Http\Controllers\Backend\SlideshowController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\TeamMembersController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\PermissionController;

use App\Http\Controllers\Front\AboutUsController;
use App\Http\Controllers\Front\HomepageController;
use App\Http\Controllers\Front\ContactUsController;
use App\Http\Controllers\Front\EventsController;
use App\Http\Controllers\Front\EventsRegistrationsController;
use App\Http\Controllers\Front\CSRController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\AreasOfFocusController;
use App\Http\Controllers\Front\PlaygroundController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomepageController::class, 'welcome'])->name('home');
Route::get('about-us', [AboutUsController::class, 'index'])->name('front_about');
Route::get('events/{isTest?}', [EventsController::class, 'index'])->name('front_events');
Route::get('event-item/{id}', [EventsController::class, 'show'])->name('front_event_single');

Route::get('register-for-event/{id}', [EventsRegistrationsController::class, 'index'])->name('front_register_for_event');
Route::post('submit-registration', [EventsRegistrationsController::class, 'store'])->name('submit_registration');
Route::post('take-payment', [EventsRegistrationsController::class, 'takePayment'])->name('takePayment');
Route::get('csr', [CSRController::class, 'index'])->name('front_csr');
Route::get('blog', [BlogController::class, 'index'])->name('front_blog');
Route::get('blog-item/{id}', [BlogController::class, 'getSingleBlog'])->name('front_blog_single');
Route::get('areas-of-focus', [AreasOfFocusController::class, 'index'])->name('front_areas_of_focus');
Route::get('contact-us', [ContactUsController::class, 'index'])->name('front_contact');
Route::post('contact-us', [ContactUsController::class, 'sendMail'])->name('sendMail');
Route::post('send-mail-ajax', [ContactUsController::class, 'sendMailAjax'])->name('sendMailAjax');
// Route::get('test-cert', [PlaygroundController::class, 'testCert'])->name('test_cert');
Route::get('test', [PlaygroundController::class, 'test'])->name('test');

Route::get('carbon', [PlaygroundController::class, 'carbon'])->name('carbon');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Dashboard landing page
Route::group(['middleware' => ['auth']], function () {
    // This is being used by routes that redirect to home, so we will not group it under admin cause it's gonna be a 404
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User profile routes
    Route::group(['prefix' => 'user'], function () {


    });// End user prefixing

    Route::group(['prefix' => 'admin'], function () {
        Route::get('team_members', [TeamMembersController::class,'index'])->name('admin_team_members');
        Route::get('team_member-edit/{id}', [TeamMembersController::class, 'editTeamMember'])->name('team_member_edit');
        Route::post('team_member-image-update', [TeamMembersController::class, 'updateResource'])->name('team_member_update');
        Route::post('team_memberimage-upload', [TeamMembersController::class, 'uploadImages'])->name('team_memberimage_upload');
        Route::post('team_member-delete', [TeamMembersController::class, 'deleteTeamMember'])->name('team_member_delete');
        Route::get('team_member-create', [TeamMembersController::class, 'create'])->name('team_member_create');
        Route::post('team_member-post', [TeamMembersController::class, 'store'])->name('team_member_post');

        Route::get('/subscribers', [SubscriberController::class, 'index'])->name('subscribers');
        Route::get('/subscriber-create', [SubscriberController::class, 'create'])->name('create_sub');
        Route::get('/subscriber/view/{id}', [SubscriberController::class, 'edit'])->name('edit_sub');
        Route::post('/subscriber-update', [SubscriberController::class, 'update'])->name('update_sub');
        Route::post('/subscriber-delete', [SubscriberController::class, 'delete'])->name('delete_sub');


        // Slideshow routes
        Route::get('slideshow', [SlideshowController::class, 'index'])->name('admin_slideshow');
        Route::get('slideshow-image-edit/{id}', [SlideshowController::class, 'editImageView'])->name('slideshowimage_edit');
        Route::post('slideshow-image-update', [SlideshowController::class, 'updateResource'])->name('slideshowimage_update');
        Route::post('slideshowimage-upload', [SlideshowController::class, 'uploadImages'])->name('slideshowimage_upload');
        Route::post('slideshowimage-delete', [SlideshowController::class, 'deleteImage'])->name('slideshowimage_delete');
        Route::post('slideshow-upload', [SlideshowController::class, 'uploadSlideshowToGS'])->name('uploadSlideshowToGS');

        Route::get('/blog-items', [BackendBlogController::class, 'index'])->name('blog_items');
        Route::get('create-blog', [BackendBlogController::class, 'create'])->name('create_blog');
        Route::get('edit-blog/{id}', [BackendBlogController::class, 'edit'])->name('edit_blog');
        Route::post('store-blog', [BackendBlogController::class, 'store'])->name('store_blog');
        Route::post('update-blog', [BackendBlogController::class, 'update'])->name('update_blog');
        Route::post('delete-blog', [BackendBlogController::class, 'delete'])->name('delete_blog');

        Route::get('/accreditation-items', [BackendAccreditationController::class, 'index'])->name('accreditation_items');
        Route::get('create-accreditation', [BackendAccreditationController::class, 'create'])->name('create_accreditation');
        Route::get('edit-accreditation/{id}', [BackendAccreditationController::class, 'edit'])->name('edit_accreditation');
        Route::post('store-accreditation', [BackendAccreditationController::class, 'store'])->name('store_accreditation');
        Route::post('update-accreditation', [BackendAccreditationController::class, 'update'])->name('update_accreditation');
        Route::post('delete-accreditation', [BackendAccreditationController::class, 'delete'])->name('delete_accreditation');

        Route::get('/areas-of-focus', [AreaOfFocusController::class, 'index'])->name('areas_of_focus');
        Route::get('create-area-of-focus', [AreaOfFocusController::class, 'create'])->name('create_area_of_focus');
        Route::get('edit-area-of-focus/{id}', [AreaOfFocusController::class, 'edit'])->name('edit_area_of_focus');
        Route::post('store-area-of-focus', [AreaOfFocusController::class, 'store'])->name('store_area_of_focus');
        Route::post('update-area-of-focus', [AreaOfFocusController::class, 'update'])->name('update_area_of_focus');
        Route::post('delete-area-of-focus', [AreaOfFocusController::class, 'delete'])->name('delete_area_of_focus');

        Route::get('/events', [BackendEventsController::class, 'index'])->name('events');
        Route::get('create-event', [BackendEventsController::class, 'create'])->name('create_event');
        Route::get('edit-event/{id}', [BackendEventsController::class, 'edit'])->name('edit_event');
        Route::post('store-event', [BackendEventsController::class, 'store'])->name('store_event');
        Route::post('update-event', [BackendEventsController::class, 'update'])->name('update_event');
        Route::post('delete-event', [BackendEventsController::class, 'delete'])->name('delete_event');

        Route::get('/events/registrations', [BackendEventRegistrationsController::class, 'index'])->name('event_regs_index');
        Route::get('/event/registrations/{id}', [BackendEventRegistrationsController::class, 'viewRegistrations'])->name('event_view_regs');
        Route::get('/event/issue-certificates/{id}', [BackendEventRegistrationsController::class, 'issueCertificatesIndex'])->name('issueCertificatesIndex');
        Route::post('event/generate-certificates', [BackendEventRegistrationsController::class, 'generateCertificates'])->name('generateCertificates');
        // Route::get('event/generate-certificates-test', [BackendEventRegistrationsController::class, 'generateCertificatesTest'])->name('generateCertificatesTest');

        // Route::get('/event/registrations', [SubscriberController::class, 'index'])->name('subscribers');
        // Roles and users
        Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('roles-create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('roles-create', [RoleController::class, 'store'])->name('roles.store');
        Route::get('roles-edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
        Route::post('roles-edit', [RoleController::class, 'update'])->name('roles.update');
        Route::post('roles-delete', [RoleController::class, 'destroy'])->name('roleDelete');


        Route::get('users', [UserController::class, 'index'])->name('users_index');
        Route::get('users-create', [UserController::class, 'create'])->name('users.create');
        Route::post('users-create', [UserController::class, 'store'])->name('users.store');
        Route::get('users-edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('users-edit', [UserController::class, 'update'])->name('users.update');
        Route::post('users-delete', [UserController::class, 'destroy'])->name('userDelete');
        Route::get('user-profile/{id}', [UserController::class, 'userProfile'])->name('user.profile');
        Route::post('user-profile-update', [UserController::class, 'updateUserProfile'])->name('user.profile.update');

        Route::get('role-permissions', [PermissionController::class, 'index'])->name('permissions.index');//->middleware('admin.only');
        Route::get('permissions-create', [PermissionController::class, 'create'])->name('permissions.create');
        Route::post('permissions-create', [PermissionController::class, 'store'])->name('permissions.store');
        Route::get('permissions-edit/{id}', [PermissionController::class, 'edit'])->name('permissions.edit');
        Route::post('permissions-edit', [PermissionController::class, 'update'])->name('permissions.update');
        Route::post('permissions-delete', [PermissionController::class, 'destroy'])->name('permissionDelete');

        // Route::post('permissions-delete', 'Admin\PermissionController@destroy')->name('permissionDelete');
        Route::get('about-us', [BackendAboutUsController::class, 'index'])->name('admin_about_page');
        Route::post('about-us', [BackendAboutUsController::class, 'saveAboutUs'])->name('admin_about_page_save');

        Route::get('contact-us', [BackendContactUsController::class, 'index'])->name('admin_contact_page');
        Route::post('contact-us', [BackendContactUsController::class, 'saveContactUs'])->name('admin_contact_page_save');

    }); //End Admin prefixing

});// End Auth middleware

require __DIR__.'/auth.php';
