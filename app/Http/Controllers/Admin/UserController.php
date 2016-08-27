<?php
/**
 * Created By zachary
 * Time: 16/8/14 下午4:38
 */

namespace App\Http\Controllers\Admin;


use App\Exceptions\AjaxException;
use App\Exceptions\RedirectException;
use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        view()->share([
            'users' => true,
        ]);
    }

    public function index()
    {
        $user_list = User::whereUserContainsTags(['jk1301'])->paginate(10);

        return view('admin.users', ['user_list' => $user_list]);
    }

    public function detail(Request $request)
    {
        $user_id = $request->input('id');
        $user = User::find($user_id);
        if ($user) {
            return view('admin.user_detail', ['user' => $user]);
        }
        else {
            $this->setMsg("用户不存在");
        }
    }

    // @todo 所有的AJAX都需要验证该管理员对该用户是否有操作权限

    public function ajax_get_tags(Request $request) {
        $user_id = $request->input('id');

        $this->checkAjaxPermission($user_id, 'user');
        $user = User::find($user_id);
        return json_encode(['tags' => $user['tags']]);
    }

    public function ajax_save_tags(Request $request) {
        $user_id = $request->input('pk');
        $tags = $request->input('value');

        $this->checkAjaxPermission($user_id, 'user');
        $user = User::find($user_id);

        // todo 需要验证是否符合要求
        $user['tags'] = $tags;
        if ($user->save()) {
            return json_encode(['code' => 0]);
        } else {
            return json_encode(['code' => -1, 'msg' => '出现错误']);
        }
    }
}