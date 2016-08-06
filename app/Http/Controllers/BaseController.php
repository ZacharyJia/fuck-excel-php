<?php
/**
 * Created by PhpStorm.
 * User: zachary
 * Date: 16/7/31
 * Time: 上午10:52
 */

namespace App\Http\Controllers;


use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class BaseController extends Controller
{
    public function isLogin()
    {
        if (Session::get('user', null) !== null) {
            return true;
        } else {
            return false;
        }
    }

    public function currentUser()
    {
        if ($this->isLogin()) {
            return Session::get('user');
        } else {
            return false;
        }
    }

    public function setMsg($msg, $type='alert')
    {
        if ($msg) {
            Session::set('msg', ['msg' => $msg, 'type' => $type]);
        }
    }
}