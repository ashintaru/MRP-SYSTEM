<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class pageAunth
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
        if($request->path()=="/" && $request->session()->has('accId') ){
            return redirect()->back();
        }
        elseif($request->path()=="dashboard" && !$request->session()->has('accId') ){
            return redirect('/');
        }
        elseif($request->path()=="account" && !$request->session()->has('accId') ){
                        return redirect('/');
        }
        elseif($request->path()=="inventory" && !$request->session()->has('accId') ){
                        return redirect('/');
        }
        elseif($request->path()=="list" && !$request->session()->has('accId') ){
                        return redirect('/');
        }
        elseif($request->path()=="origin" && !$request->session()->has('accId') ){
                       return redirect('/');

        }
        elseif($request->path()=="master-list" && !$request->session()->has('accId') ){
                        return redirect('/');
            }
        elseif($request->path()=="model" && !$request->session()->has('accId') ){
            return redirect('/');
        }
        elseif($request->path()=="production" && !$request->session()->has('accId') ){
            return redirect('/');
        }
        elseif($request->path()=="material" && !$request->session()->has('accId') ){
            return redirect('/');
        }
        elseif($request->path()=="inventory-report" && !$request->session()->has('accId') ){
            return redirect('/');
        }
        // if($request->session('type')==true){
        //     return redirect('/');
        // }
        
        return $next($request);
    }
}
