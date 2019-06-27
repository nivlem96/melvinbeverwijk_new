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

Route::get('/', 'Controller@index')->name('home');
Route::get('/info', 'Controller@info')->name('info');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/financials', 'FinancialController@index')->name('financial');
Route::get('/create', 'FinancialController@create')->name('createFinancial');
Route::get('/deleteFinancial/{id}', 'FinancialController@deleteFinancial')->name('deleteFinancial');

Auth::routes();

$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');


$this->post('/financials', 'FinancialController@index')->name('financial');
$this->post('/add-financial', 'FinancialController@addFinancial')->name('addFinancial');
