<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class CheckRoot
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $name)
    {
        // dd($request->route('key'));
        $user =User::find(1)->name;
        if ( $user == $name) {
            return $next($request);
        }else{
            Auth::logout();
            return redirect('/login')->withErrors(['Sistema deshabilitado']);;
        } 
    }
}
