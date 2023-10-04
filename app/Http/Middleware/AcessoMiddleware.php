<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AcessoMiddleware
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
        if(Auth::check()){
            if(Auth::user()->vc_tipo_utilizador==1 || Auth::user()->vc_tipo_utilizador==2 || Auth::user()->vc_tipo_utilizador==3){
                return $next($request);
            }
            else{
                return redirect()->back()->with('error',1);
            }
        }
        else{
            
            return redirect()->route('login')->with('error',1);
        }
    }
}
