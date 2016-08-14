<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Session;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $type
     * @return mixed
     */
    public function handle($request, Closure $next, $type)
    {
        $user = User::getCurrentUser();
        if ($user === null || $type != strtolower($user['type'])) {
            Session::set('msg', ['msg' => '还未登录或登录已过期', 'type' => 'error']);
            return redirect('/login');
        }

        return $next($request);
    }
}
