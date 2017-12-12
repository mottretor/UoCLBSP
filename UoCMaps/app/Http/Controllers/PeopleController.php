<?php

namespace UoCMaps\Http\Controllers;

use Illuminate\Http\Request;
use UoCMaps\People;
use Illuminate\Routing\Controller;
use DB;

class PeopleController extends Controller
{
    public function index()
    {
    	return view('people.addpeople');
    }

    public function store(Request $request)
    {
    	$people = new people();
        
    	$people->nic = $request->nic;
    	$people->name = $request->name;
    	$people->designation = $request->designation;
    	$people->description = $request->description;
    	$people->longitude = $request->Longitudes;
    	$people->latitude = $request->Latitudes;

    	if($people->save())
            echo "<script>alert('Successful!')</script>";
    	else
        echo "<script>alert('ID Allready Added!')</script>";
        return view('managepeople');

    }

    public function show()
    {
    	$people = DB::table('people')->get();
        $coords = array();
        foreach ($people as $peopl) {
            array_push($coords, array("lat"=>$peopl->latitude,"lng"=>$peopl->longitude));
            # code...
        }
        //$coordsJson = json_encode($coords);

        //$a=$buildings[2]->name;

        $coordsObj = (object) $coords;
        // dd($coords);

    	//return view('manage', ['coordsObj' => $coordsObj]);
        return view('managepeople', compact('coords'));
    }

    public function search(Request $req)
    {
       $name = $req->input('q');
       //$q = Input::get ( 'q' );

       $user = DB::table('people')->where ( 'nic', 'LIKE', '%' . $name . '%' )->get ();
       $coords = array();
        foreach ($user as $peopl) {
            array_push($coords, array("lat"=>$peopl->latitude,"lng"=>$peopl->longitude));
            # code...
        }
        //$coordsJson = json_encode($coords);

        //$a=$buildings[2]->name;

        $coordsObj = (object) $coords;

       //$id=SELECT DISTINCT (id) FROM[buildings] WHERE name=$user;
       //dd($user);
        
        // foreach($user as $use){
        //     ($coords, array("lat"=>$use->lat,"lng"=>$use->long));
        //     # code...
        // }
        //$coordsObj = (object) $coords;
        //return view('buildings.searchbuilding', compact('user'));

       
    if (count ( $user ) > 0)
        return view ( 'people.searchpeople',compact('coords') )->withDetails ( $user )->withQuery ( $name );
    else
        echo "<script>alert('No Result Found!')</script>";
        return view('managepeople');
    }

    public function update(Request $request)
    {   
       //  $name = $req->input('q');
       // //$q = Input::get ( 'q' );

       // $user = DB::table('buildings')->where ( 'name', 'LIKE', '%' . $name . '%' )->get ();
       //  dd($user);
        //$buildings = Building::find($user);
        //dd($buildings);
        // if($request->isMethod('get'))
        //     return view('buildings.searchbuilding',[POST => Post::find($id)]);
        //  $building = Building::find($user);
        //  $building->id = $request->id;
        //  $building->name = $request->name;
        //  $building->description = $request->description;
        // $building->long = $request->Longitudes;
        // $building->lat = $request->Latitudes;
        //$affected = DB::update('update buildings set name='.$name.', description='.$description.' where name=$user);
        //dd($request->id);
        DB::table('people')
            ->where('nic', $request->nic)
            ->update(['nic'=>$request->nic,'name'=>$request->name,'designation'=>$request->designation,'description'=>$request->description,'longitude' => $request->Longitudes,'latitude'=>$request->Latitudes]);
         // $building->save();
        
        echo "<script>alert('Successful!')</script>";
        return view ('managepeople');
    }


    function delete($nic){
        DB::table('people')->where('nic', '=', $nic)->delete();
        echo "<script>alert('Delete Successful!')</script>";
        return view('managepeople');
    }

}
