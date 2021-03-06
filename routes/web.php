<?php
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


//to switch the language in cms
Route::get('setLocale/{locale}', 'AdminController@setLocale');

Route::post('/payment/add-funds/paypal', 'PaypalController@paywithpaypal')->name('paywithpaypal');

Route::get('/pay', 'PaypalController@payForm')->name('pay');

Route::get('status','PaypalController@getPaymentStatus')->name('status');
/**
 * there is only post methods in Auth::routes for logout so we make here get method
 */
$this->get('logout', 'Auth\LoginController@logout')->name('logout');
// helper class that helps you generate all the routes required for user authentication.
Auth::routes();

/**
 * / Authentication Routes...
* $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
* $this->post('login', 'Auth\LoginController@login');
* $this->post('logout', 'Auth\LoginController@logout')->name('logout');

* Registration Routes...
* $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
* $this->post('register', 'Auth\RegisterController@register');

* Password Reset Routes...
* $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
* $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
* $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
* $this->post('password/reset', 'Auth\ResetPasswordController@reset');
 */
Route::group(['middleware'=>['auth'], 'prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/profile', 'AdminController@adminprofile');
    Route::post('/profile', 'AdminController@adminprofile');
});

/**
 * export excel routes
 * common for all modules
 */
Route::get('importExport', 'ExportController@importExport');
Route::get('downloadExcel/{type}', 'ExportController@exportExcel');
Route::post('importExcel', 'ExportController@importExcel');

/**
 * common for all modules
 * dropzone routes
 */
Route::get('admin/media', function () {
    return view('dropzone');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
