<?php
/**
 * Created by zachary
 * Date: 16/7/31 上午10:52
 */

namespace App\Http\Controllers;

use App\Exceptions\RedirectException;
use App\Http\Responses\AjaxResponse;
use App\Models\User;
use Illuminate\Routing\Controller;
use Redirect;
use Response;
use Session;

class BaseController extends Controller
{
    public function __construct()
    {
        view()->share([
            'login_user' => User::getCurrentUser(),
        ]);
    }

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

    /**
     * 检查当前登录用户对指定类型的对象是否有管理权限
     * 如果没有权限,则直接返回到指定网址
     * @param $obj_id
     * @param string $type 对象类型,当前支持类型有: user,
     * @param string $redirect_url 鉴权失败时要跳转到的url
     * @throws RedirectException
     * @internal param $objId
     */
    public function checkPermission($obj_id, $type='user', $redirect_url = '/')
    {
        $check_method = "check_".$type."_permission";
        $result = $this->$check_method($obj_id);
        if (!$result) {
            redirect_now($redirect_url);
        }
    }

    /**
     * 对ajax请求,检查是否有相应操作权限
     * @param $obj_id
     * @param string $type
     */
    public function checkAjaxPermission($obj_id, $type='user')
    {
        $check_method = "check_".$type."_permission";
        $result = $this->$check_method($obj_id);
        if (!$result) {
            AjaxResponse::getAjaxResponse('NO_AUTH');
        }
    }

    protected function check_user_permission($obj_id)
    {
        $current_user = User::getCurrentUser();
        $user = User::find($obj_id);
        if ($user && array_intersect($current_user->tags, $user->tags)) {
            return true;
        } else {
            return false;
        }
    }


}