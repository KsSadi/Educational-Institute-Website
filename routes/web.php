<?php

use Illuminate\Support\Facades\Mail;
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
Route::get('/',[\App\Http\Controllers\Admin\FrontEndController::class,'home'])->name('home');


//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/dashboard_old', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard_old');

Route::get('testmail', function () {
    $subject = 'New Publication Notification';
    $user = ['email' => 'healthmedsci.org@gmail.com', 'password' => 'healthmedsci.org@456'];
    $url = 'https://google.com/ncr';
    Mail::to(['mdsadi4@gmail.com'])
        ->send(new \App\Mail\PasswordResetMail('New Registration Notification', $user));
    return 'Processed';
});


Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::resource('admins', 'App\Http\Controllers\AdminsController', ['names' => 'dashboard.admins']);
    Route::resource('roles', 'App\Http\Controllers\RolesController', ['names' => 'dashboard.roles']);
    Route::resource('settings', 'App\Http\Controllers\Admin\GlobalSettingController', ['names' => 'dashboard.settings']);
    Route::resource('notices', 'App\Http\Controllers\Admin\NoticeController', ['names' => 'dashboard.notices']);
    Route::resource('speeches', 'App\Http\Controllers\Admin\SpeechController', ['names' => 'dashboard.speeches']);
    Route::resource('sliders', 'App\Http\Controllers\Admin\SliderController', ['names' => 'dashboard.sliders']);


    Route::get('/login', 'App\Http\Controllers\AdminAuth\AuthenticatedSessionController@showLoginForm')->name('dashboard.login');
    Route::post('/login/submit', 'App\Http\Controllers\AdminAuth\AuthenticatedSessionController@login')->name('dashboard.login.submit');
    Route::post('/logout/submit', 'App\Http\Controllers\AdminAuth\AuthenticatedSessionController@logout')->name('dashboard.logout.submit');
    Route::get('/forgot-password', 'App\Http\Controllers\AdminAuth\ForgotPassword@forgot')->name('dashboard.forgot.password');
    Route::post('/forgot-password', 'App\Http\Controllers\AdminAuth\ForgotPassword@password')->name('dashboard.forgot.password.submit');
    Route::get('/reset-password', 'App\Http\Controllers\AdminAuth\ForgotPassword@reset_password')->name('dashboard.reset.password');
    Route::post('/reset-password', 'App\Http\Controllers\AdminAuth\ForgotPassword@post_reset_password')->name('dashboard.reset.password.submit');
    Route::get('user-profile',[\App\Http\Controllers\Admin\ProfileController::class,'index'])->name('user.profile');
    Route::get('setting',[\App\Http\Controllers\Admin\ProfileController::class,'setting'])->name('user.setting');
    Route::post('update-password',[\App\Http\Controllers\Admin\ProfileController::class,'update_password'])->name('user.update-password');


});

require __DIR__ . '/auth.php';
