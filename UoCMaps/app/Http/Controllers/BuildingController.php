<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Building;

class BuildingController extends Controller
{
    public function index()
    {
    	return view('buildings.addbuilding');
    }

    public function store(Request $request)
    {
    	$building = new Building();
    	$building->name = $request->name;
    	$building->description = $request->description;
    	$building->long = $request->Longitudes;
    	$building->lat = $request->Latitudes;

    	$building->save();
    	return 'Building Entered  Successfully';

    }
}
