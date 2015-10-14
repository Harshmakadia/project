<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('viewpayment',function() {
return view('templates.viewpayment');
});*/
/*Route::get('sampletemplate',function() {
return view('templates.sampletemplate');
});*/
$router->resource('ledger','AddLedgerController');
$router->resource('viewpayment','ViewPaymentController');
$router->resource('payment','PaymentController');

//Route::get('payment','PaymentController@getledger');
//Route::get('showledger','PaymentController@getledger');
//Route::post('payment','PaymentController@store');
Route::post('adduser', 'AjaxAddUserController@index');
$router->resource('manageusers','ManageUsersController');
$router->resource('login','LoginController');
$router->resource('home','HomeController');
$router->resource('loginhistory','LoginHistoryController');
