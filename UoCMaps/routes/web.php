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



Route::get('/home', function () {
    return view('home');
});


Route::get('/getCoords', function () {
    return view('getCoords');
});

Route::get('/searchbuilding', function () {
    return view('searchbuilding');
});


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






Route::get('/test2', function () {
    return view('test2');
});

Route::get('/test3', function () {
    return view('test3');
});


Route::get('/test4', function () {
    return view('test4');
});



Route::get('/containsLocation', function () {
    return view('containsLocation');
});

Route::get('/httprequest', function () {
    return view('httprequest');
});

Route::get('/searchMap', function () {
    return view('searchMap');
});

Route::get('/socket', function () {
    return view('socket');

});

Route::get('/polyOk', function () {
    return view('polyOk');

});

Route::get('/getAll', function () {
    return view('getAll');
});

Route::get('/getPoly', function () {
    return view('getPoly');
});

Route::get('/makePoly', function () {
    return view('makePoly');

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
 
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// database*******************************************************************

// Route::get('test4', function () {

//     $source = DB::table('building')->get();

//     return view('buildingdata', ['source' => $source]);
// });

// Route::get('/viewx', 'test4Controller@index');

Route::post('/formlogic', 'test4Controller@submit');


//people

Route::get('/addpeople', function () {
    return view('people.addpeople');
});

Route::get("/peopleShow",'peopleController@show');

Route::post("people",'PeopleController@store');

Route::post("/peoplesearch",'peopleController@search');



Route::post("/update",'peopleController@delete');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/login/custom',[
  'uses' => 'LoginController@login',
  'as' => 'login.custom'
]);

Route::group(['middleware' => 'auth'], function(){

  Route::get('/home', function(){
    return view('home');
  })->name('home');

  Route::get('/approvedashboard', function(){
    return view('approvedashboard');
  })->name('approvedashboard');

  Route::get('/dashboard', function(){
    return view('dashboard');
  })->name('dashboard');
}
);


Route::group(['prefix' => 'users'], function() {
  Route::get('/', 'PostController@index');
  Route::match(['get', 'post'], 'create', 'PostController@create');
  Route::match(['get', 'put'], 'update/{id}', 'PostController@update');
  Route::get('show/{id}', 'PostController@show');
  Route::delete('delete/{id}', 'PostController@destroy');
});













