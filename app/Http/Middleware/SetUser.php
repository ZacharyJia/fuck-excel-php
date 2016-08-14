<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Models\User;

class SetUser
{
    /**
     * Handle an incoming request.
     *
     * 将登录用户信息存储到User类中
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('user')) {
            User::setCurrentUser(Session::get('user'));
        } else {
            User::setCurrentUser(null);
        }
        return $next($request);
    }
}
