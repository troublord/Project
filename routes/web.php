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
// Route::get('/', function () {
//     return view('welcome');
// });

 Route::get('/', 'HomeController@index')->name('index');

  Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
  Route::post('login', 'Auth\LoginController@login');
  Route::post('logout', 'Auth\LoginController@logout')->name('logout');
  // Auth::routes();

Route::resource('company', 'CompanyController');
Route::get('companysearch','HomeController@companysearch');
Route::resource('workpiece', 'WorkpieceController');
Route::resource('employee', 'EmployeeController');
Route::resource('paymentrequest', 'PaymentRequestController');
Route::resource('produce', 'ProduceController');
Route::resource('purchase', 'PurchaseController');
Route::resource('receipt', 'ReceiptController');
Route::resource('shipment', 'ShipmentController');
Route::resource('storage', 'StorageController');
