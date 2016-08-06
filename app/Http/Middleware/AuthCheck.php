<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AuthCheck
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
        if (!Session::has('user')) {
            Session::set('msg', ['msg' => '还未登录或登录已过期', 'type' => 'error']);
            return redirect('/login');
        }

        return $next($request);
    }
}
