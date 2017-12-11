<?php
namespace UoCMaps\Http\Controllers;
use Illuminate\Http\Request;
use UoCMaps\Post;
class AutoCompleteController extends Controller
{
    public function index()
    {
    	return view('autocomplete');
    }
    public function ajaxData(Request $request){
        $query = $request->get('query','');        
        $posts = Post::where('name','LIKE','%'.$query.'%')->get();        
        return response()->json($posts);
	}
}