<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        echo "fdfd";
//        dd("fdf");
        if (auth()->check() && $user->role === 0){
            return $next($request);
        }else{
            return redirect('/');
        }

//        return $next($request);
    }
}
