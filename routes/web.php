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
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::post('make-order', function(Request $request) {
	echo $request->name;
});

Route::get('update-delivery-days', function () {
    $answer['days'][0]['id'] = 1;
    $answer['days'][0]['name'] = 'Monday';
    return json_encode($answer);
});

Route::get('get-tariffs', 'TariffController@list');
Route::post('get-delivery-days', 'TariffController@list_days');