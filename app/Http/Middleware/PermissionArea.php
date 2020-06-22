<?php

namespace App\Http\Middleware;

use Closure;

class PermissionArea
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
        if($request->session()->has('userInfo'))
        {
            $userInfo = $request->session()->get('userInfo');
            if($userInfo['role'] == '1') return $next($request);
            // return redirect()->route('notify/no-permission');
        }
        return redirect()->route('auth/login');
    }
}