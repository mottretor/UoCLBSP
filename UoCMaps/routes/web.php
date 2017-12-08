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

Route::get('/', function () {
    return view('myMap');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/getCoords', function () {
    return view('getCoords');
});

Route::get('/searchbuilding', function () {
    return view('searchbuilding');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/adminalter', function () {
    return view('adminalter');
});

Route::get('/adminmappaths', function () {
    return view('adminmappaths');
});

Route::get('/map', function () {
    return view('map');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/containsLocation', function () {
    return view('containsLocation');
});

Route::get('/httprequest', function () {
    return view('httprequest');
});

Route::get('/socket', function () {
    return view('socket');
});

Route::get('/searchPlace', function () {
    return view('searchPlace');
});

Route::get('autocomplete-search',array('as'=>'autocomplete.search','uses'=>'AutoCompleteController@index'));
Route::get('autocomplete-ajax',array('as'=>'autocomplete.ajax','uses'=>'AutoCompleteController@ajaxData'));
//get the data from the database ---> just goto http://localhost:8000/listTest
Route::get('listTest', function () {

    $listTest = DB::table('building')->get();

    return view('listTest', ['listTest' => $listTest]);
});

// Route::get('/myMap', function () {
//     return view('myMap');
// });

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
?>