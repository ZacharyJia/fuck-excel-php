<?php
/**
 * Created by zachary
 * Date: 16/7/31 上午10:46
 */

namespace App\Http\Controllers;

use App\Models\User;
use Request;
use Session;

class LoginController extends BaseController
{

    public function login()
    {
        if ($this->isLogin()) {
            $user = User::getCurrentUser();
            return redirect('/' . $user['type'] . '/home');
        }
        return view('login');
    }

    public function doLogin()
    {
        $username = Request::input('username');
        $password = Request::input('password');

        if ($username && $password) {
            $user = User::where('username', $username)->where('password', $password)->first();
            if ($user !== null) {
                $this->setMsg('登录成功');
                Session::set('user', $user);
                return redirect('/' . $user->type . '/home');
            } else {
                $this->setMsg('用户名或密码错误', 'error');
                return redirect('/login');
            }
        } else {
            $this->setMsg('用户名或密码不能为空', 'error');
            return redirect('/login');
        }
    }

    public function logout()
    {
        Session::clear();
        return redirect('/login');
    }
}