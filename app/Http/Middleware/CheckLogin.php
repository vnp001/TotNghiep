<?php

namespace App\Http\Middleware;

use Closure;
use App\nhanvien;

class CheckLogin
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
   
        if(session()->has('admin_id') == '')
        {
            return redirect()->intended('/');
        }
        return $next($request);

    }
}
