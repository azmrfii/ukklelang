<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth()->user()->status == 1) {
            return $next($request);
        }
        else {
            return redirect()->route('coba')->with('alert', 'Your Account is block');
            // return abort(403);
            // return $next($request);
        }
        // return redirect()->route('coba')->with('alert', 'Your Account is block');
        return abort(403);

        // elseif(Auth::user()->status == 0) {
        //     // dd('error');
        //     return redirect()->route('coba')->with('alert', 'Your Account is block');
        // }
    
        // elseif(Auth::user()->status == 0){
        //     if(! Auth::check(Auth::user()->status == 0)){
        //         return abort(403);
        //     }
        //     // return redirect()->intended('')->with('alert', 'Your Account is block');
        //     // dd($next);
        // else{
        //     dd('error');
        // }
    }
}
