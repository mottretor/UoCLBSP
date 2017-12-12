<?php

namespace UoCMaps\Http\Middleware;

use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if (Auth::user() &&  Auth::user()->admin == 1) {
         return $next($request);
      }
      return redirect('/');

      Route::get('admin_area', ['middleware' => 'admin', function () {
      Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
}]);﻿
}
