<?php
/**
 * Created by zachary
 * Date: 16/7/31 上午10:52
 */

namespace App\Http\Controllers;


use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class BaseController extends Controller
{
    /**
     * 判断当前用户是否登录
     * @return bool
     */
    public function isLogin()
    {
        if (Session::get('user', null) !== null) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 获取当前用户,如果没有登录,返回false
     * @return bool
     */
    public function currentUser()
    {
        if ($this->isLogin()) {
            return Session::get('user');
        } else {
            return false;
        }
    }

    /**
     * 设置在下一个页面将显示给用户的提示
     * @param $msg 提示内容
     * @param string $type 提示的类型,目前有 success, error, alert, warning 四种
     */
    public function setMsg($msg, $type='alert')
    {
        if ($msg) {
            Session::set('msg', ['msg' => $msg, 'type' => $type]);
        }
    }
}