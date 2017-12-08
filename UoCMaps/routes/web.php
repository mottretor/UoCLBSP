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
    return view('welcome');
});

// user*******************************************************************************

Route::get('/home', function () {
    return view('home');
});


Route::get('/searchbuilding', function () {
    return view('searchbuilding');
});

// admin*******************************************************************************

Route::get('/showpoints', function () {
    return view('admin.showpoints');
});

Route::get('/showpaths', function () {
    return view('admin.showpaths');
});

Route::get('/showmap', function () {
    return view('admin.showmap');
});

Route::get('/showpolygon', function () {
    return view('admin.showpolygon');
});

Route::get('/addbuilding', function () {
    return view('addbuilding');
});

Route::get('/addpolygon', function () {
    return view('admin.addpolygon');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/adminalter', function () {
    return view('adminalter');
});

// Route::get('/adminmappaths', function () {
//     return view('adminmappaths');
// });

Route::get('/searchdetails', function () {
    return view('searchdetails');
});

Route::get('/addpath', function () {
    return view('admin.addpath');
});


Route::get('/map', function () {
    return view('map');
});

Route::get('/test', function () {
    return view('test');
});

<<<<<<< HEAD
Route::get('/test2', function () {
    return view('test2');
});

Route::get('/test3', function () {
    return view('test3');
=======
Route::get('/containsLocation', function () {
    return view('containsLocation');
});

Route::get('/httprequest', function () {
    return view('httprequest');
});

Route::get('/socket', function () {
    return view('socket');
>>>>>>> origin/master
});

// Route::get('/myMap', function () {
//     return view('myMap');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// database*******************************************************************

Route::get('test4', function () {

    $source = DB::table('building')->get();

    return view('buildingdata', ['source' => $source]);
});
