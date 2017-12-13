<?php

namespace UoCMaps\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use UoCMaps\Post;
use UoCMaps\User;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
  public function login(Request $request){
    // dd($request->all());

    if(Auth::attempt([
      'email' => $request->email,
      'password' => $request->password
    ])){

          $user = User::where('email', $request->email)->first();
          if($user->is_admin()){
            return redirect()->route('dashboard');
            //return redirect()->route('users');
          }

          else if ($user->is_approve()) {
            return redirect()->route('approvedashboard');
          }

          else {
            return redirect()->route('newuser');
          }

    }

    return redirect()->back();
  }

    public function index(Request $request)
    {
      $request->session()->put('search', $request
              ->has('search') ? $request->get('search') : ($request->session()
              ->has('search') ? $request->session()->get('search') : ''));

              $request->session()->put('field', $request
                      ->has('field') ? $request->get('field') : ($request->session()
                      ->has('field') ? $request->session()->get('field') : 'email'));

                      $request->session()->put('sort', $request
                              ->has('sort') ? $request->get('sort') : ($request->session()
                              ->has('sort') ? $request->session()->get('sort') : 'asc'));

      $users = new Post();
            $users = $users->where('email', 'like', '%' . $request->session()->get('search') . '%')
                ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
                ->paginate(5);
            if ($request->ajax()) {
              return view('users.index', compact('users'));
            } else {
              return view('users.ajax', compact('users'));
            }
    }

    // public function create(Request $request)
    // {
    //     if ($request->isMethod('get'))
    //     return view('users.form');
    //
    //     $rules = [
    //       'title' => 'required',
    //       'name' => 'required|max:50',
    //       // 'email' => 'required|email|unique:users|max:100',
    //       // 'nic' => 'required|unique:users|size:10',
    //       // 'job_title' => 'required|max:20',
    //       // 'password' => 'required|password|min:4',
    //       'admin' => 'required|size:1',
    //       'approve' => 'required|size:1',
    //       'description' => 'required',
    //     ];
    //
    //     $validator = Validator::make($request->all(), $rules);
    //     if ($validator->fails())
    //     return response()->json([
    //       'fail' =>true,
    //       'errors' => $validator->errors()
    //     ]);
    //
    //     $post = new Post();
    //     $post->title = $request->title;
    //     $post->name = $request->name;
    //     // $post->email = $request->email;
    //     // $post->nic = $request->nic;
    //     // $post->job_title = $request->job_title;
    //     // $post->password = $request->password;
    //     $post->admin = $request->admin;
    //     $post->approve = $request->approve;
    //     $post->description = $request->description;
    //     $post->save();
    //
    //     return response()->json([
    //       'fail' => false,
    //       'redirect_url' => url('users')
    //     ]);
    // }

    public function show(Request $request, $id)
    {
        if($request->isMethod('get')) {
          return view('users.detail',['post' => Post::find($id)]);
        }
    }

    public function update(Request $request, $id)
    {
      if ($request->isMethod('get'))
      return view('users.form',['post' => Post::find($id)]);

      $rules = [
        // 'title' => 'required',
        'name' => 'required|max:50',
        // 'email' => 'required|email|unique:users|max:100',
        // 'nic' => 'required|unique:users|size:10',
        // 'job_title' => 'required|max:20',
        // 'password' => 'required|password|min:4',
        'admin' => 'required|size:1',
        'approve' => 'required|size:1',
        'description' => 'required',
      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails())
      return response()->json([
        'fail' =>true,
        'errors' => $validator->errors()
      ]);

      $post = Post::find($id);
      // $post->title = $request->title;
      $post->name = $request->name;
      // $post->email = $request->email;
      // $post->nic = $request->nic;
      // $post->job_title = $request->job_title;
      // $post->password = $request->password;
      $post->admin = $request->admin;
      $post->approve = $request->approve;
      $post->description = $request->description;
      $post->save();

      return response()->json([
        'fail' => false,
        'redirect_url' => url('users')
      ]);
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect('users');
    }
}
