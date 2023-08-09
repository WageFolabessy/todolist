<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HanyaBelumLogin
{

    public function handle(Request $request, Closure $next): Response
    {
        if($request->session()->exists('user'))
        {
            return redirect('/');
        }
        return $next($request);
    }
}
