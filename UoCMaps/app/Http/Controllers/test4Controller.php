<?php

namespace UoCMaps\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class test4Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function submit(Request $req){
    	$name = $req->input('name');
    	$description = $req->input('description');
    	$latitudes = $req->input('latitudes');
    	$longitudes = $req->input('longitudes');

    	// echo $name." ".$description." ".$latitudes." ".$longitudes;
    	// $data = DB::table('building')->where(['name'=>$name, 'description'=>$description, 'latitudes'=>$latitudes, 'longitutes'=>$longitudes])->get();
    	$data = DB::table('building')->where(['name'=>$name])->get();
    	echo $data;
    }
}
