<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvertiserController;
use App\Http\Controllers\AdvertisingController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\AdvertiserTypeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Mail\UserWelcomeEmail;
use App\Http\Controllers\ContactController;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('cms/')->middleware('guest:admin,user')->group(function(){
    Route::get('{guard}/login',[AuthController::class, 'showLoginView'])->name('cms.login');
    Route::Post('login',[AuthController::class, 'login']);

    Route::get('forgot-password',[ResetPasswordController::class,'showForgotPassword'])->name('password.forgot');
    Route::post('forgot-password', [ResetPasswordController::class, 'sendResetEmail'])->name('password.email');
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordView'])->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'updatePassword'])->name('password.update');

    // Route::get('verify', [EmailVerificationController::class, 'notice'])->name('verification.notice');

});

Route::prefix('cms/admin')->middleware(['auth:admin','verified'])->group(function () {
Route::resource('admins',AdminController::class);
Route::resource('roles',RoleController::class);
Route::resource('permissions',PermissionController::class);
});

Route::prefix('cms/admin')->middleware(['auth:admin,user','verified'])->group(function(){
    // Route::prefix('cms/admin')->group(function(){
        Route::view('/','cms.temp')->name('cms.dashboard');
        Route::resource('cities',CityController::class);
        Route::resource('users',UserController::class);
        Route::resource('advertisers',AdvertiserController::class);
        Route::resource('advertisings',AdvertisingController::class);
        Route::resource('applicants',ApplicantController::class);
        Route::resource('sections',SectionController::class);
        Route::resource('specializations',SpecializationController::class);
        Route::resource('advertiserTypes',AdvertiserTypeController::class);
        Route::get('logout',[AuthController::class, 'logout'])->name('cms.logout');
    
});

Route::prefix('cms/admin')->middleware(['auth:admin, user','verified'])->group(function(){

    Route::get('roles/{role}/permissions/edit', [RoleController::class, 'editRolePermissions'])->name('roles.edit-permissions');
    Route::put('roles/{role}/permissions/edit', [RoleController::class, 'updateRolePermissions']);

    Route::get('users/{user}/permissions/edit', [UserController::class, 'editUserPermissions'])->name('user.edit-permissions');
    Route::put('users/{user}/permissions/edit', [UserController::class, 'updateUserPermissions']);

    Route::get('edit-password', [AuthController::class, 'editPassword'])->name('password.edit');
    Route::put('update-password', [AuthController::class, 'updatePassword']);


});

Route::prefix('cms/admin')->middleware(['auth:admin, user'])->group(function(){
    Route::get('verify', [EmailVerificationController::class, 'notice'])->name('verification.notice');
    Route::get('send-verification', [EmailVerificationController::class, 'send'])->middleware('throttle:1,1')->name('verification.send');
    Route::get('verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->middleware('signed')->name('verification.verify');
    
    // Route::get('contact-us',ContactController::class,'contact');
    // Route::get('contact',[ContactController::class,'sendEmail'])->name('contact.us');
});




    // Route::get('news', function(){
    //     dd(111);
    // })->middleware('ageCheck');

    // Route::get('news', function(){
    //     dd(111);
    // })->middleware(ageCheck::class);

    // Route::middleware('ageCheck:18,19,20')->group(function(){
    //     Route::get('news1',function(){
    //         echo 'News (1) content';
    //     });
    //     Route::get('news2',function(){
    //         echo 'News (2) content';
    //     })->withoutMiddleware('ageCheck');
    // });

Route::get('test-email',function(){
    return new UserWelcomeEmail(User::first());
});