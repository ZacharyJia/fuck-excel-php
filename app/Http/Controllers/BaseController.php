<?php
/**
 * Created by zachary
 * Date: 16/7/31 上午10:52
 */

namespace App\Http\Controllers;


use App\User;
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
        return User::getCurrentUser() ? true : false;
    }

    /**
     * 设置在下一个页面将显示给用户的提示
     * @param string $msg
     * @param string $type 提示的类型,目前有 success, error, alert, warning 四种
     */
    public function setMsg($msg, $type='alert')
    {
        if ($msg) {
            Session::set('msg', ['msg' => $msg, 'type' => $type]);
        }
    }
}