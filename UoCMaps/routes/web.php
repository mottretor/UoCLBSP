<?php

Route::get('/', function () {
    return view('manage');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/addbuilding', function () {
    return view('buildings.addbuilding');
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

Route::get('/map', function () {
    return view('map');
});

Route::get('/test', function () {
    return view('test');
});

Route::post("student",'buildingController@store');

?>

