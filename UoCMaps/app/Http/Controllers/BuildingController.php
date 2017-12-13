<?php

namespace UoCMaps\Http\Controllers;

use Illuminate\Http\Request;
use UoCMaps\Building;
use Illuminate\Routing\Controller;
use DB;

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
    	$building->longitudes = $request->Longitudes;
    	$building->latitudes = $request->Latitudes;

    	$building->save();
        echo "<script>alert('Successful!')</script>";
    	
        return view('buildings.addbuilding');

    }

    public function show()
    {
    	$buildings = DB::table('building')->get();
        $coords = array();
        foreach ($buildings as $building) {
            array_push($coords, array("latitudes"=>$building->lat,"longitudes"=>$building->long));
            # code...
        }
        //$coordsJson = json_encode($coords);

        //$a=$buildings[2]->name;

        $coordsObj = (object) $coords;
        // dd($coords);

    	//return view('manage', ['coordsObj' => $coordsObj]);
        return view('manage', compact('coords'));
    }

    public function search(Request $req)
    {
       $name = $req->input('q');
       //$q = Input::get ( 'q' );

       $user = DB::table('building')->where ( 'name', 'LIKE', '%' . $name . '%' )->get ();
       //$id=SELECT DISTINCT (id) FROM[buildings] WHERE name=$user;
       //dd($user);
        //$coords = array();
        // foreach($user as $use){
        //     ($coords, array("lat"=>$use->lat,"lng"=>$use->long));
        //     # code...
        // }
        //$coordsObj = (object) $coords;
        //return view('buildings.searchbuilding', compact('user'));

       
    if (count ( $user ) > 0)
        return view ( 'buildings.searchbuilding' )->withDetails ( $user )->withQuery ( $name );
    else
        echo "<script>alert('No Result Found!')</script>";
        return view('manage');
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
        DB::table('building')
            ->where('id', $request->id)
            ->update(['name'=>$request->name,'description'=>$request->description,'long' => $request->Longitudes,'lat'=>$request->Latitudes]);
         // $building->save();
        
        // return 'Building Updateded Successfully';
            echo "<script>alert('Successful!')</script>";
            return view ( 'manage');

    }

    function delete($id){
<<<<<<< HEAD
        DB::table('buildings')->where('id', '=', $id)->delete();
=======
        DB::table('building')->where('id', '=', $id)->delete();
>>>>>>> origin/master
        echo "<script>alert('Delete Successful!')</script>";
        return view('manage');
    }
}
