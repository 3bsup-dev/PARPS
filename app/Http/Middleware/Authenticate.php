<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authenticate
{
    public function handle(Request $request, Closure $next)
    {


        $s = session('PARPS');
        $session = session('user');
        if ($session && $s) {
            return $next($request);
        }
        return redirect('http://sistao.3bsup.eb.mil.br');
    }
}
