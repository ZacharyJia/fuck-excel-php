<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Session;

class AuthCheck
{
    /**
     * 检查当前用户是否登录,以及要访问的页面需要的权限是否与该用户的权限相符
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $type 从路由中传来的参数,表示要访问的页面需要的权限
     * @return mixed
     */
    public function handle($request, Closure $next, $type)
    {
        $user = User::getCurrentUser();
        if ($user === null || $type != strtolower($user['type'])) {
            Session::set('msg', ['msg' => '还未登录或登录已过期', 'type' => 'error']);
            //权限不符合,跳转到登录页面
            return redirect('/login');
        }

        return $next($request);
    }
}
