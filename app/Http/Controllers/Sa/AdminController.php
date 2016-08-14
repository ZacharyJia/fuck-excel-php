<?php
/**
 * Created By zachary
 * Time: 16/8/13 下午1:52
 */

namespace app\Http\Controllers\Sa;


use App\Http\Controllers\BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;

class AdminController extends BaseController
{
    use ValidatesRequests;

    public function __construct()
    {
        parent::__construct();
        view()->share([
            'admins' => true,
        ]);
    }

    public function index()
    {

        $admins = User::where('type', 'admin')->paginate(10);

        return view('sa.admin', ['adminList' => $admins]);
    }

    public function getAdmin(Request $request)
    {
        $id = $request->input('id');
        $admin = User::where('_id', $id)->first();
        return $admin->toArray();
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|alpha_dash|max:16|unique:user',
            'password' => 'required|min:6|string|max:32',
            'tags'     => 'regex:/^[^\,]+(\,[^\,]+)*$/',
        ]);

        $user = new User();
        $user['username'] = $request->input('username');
        $user['password'] = $request->input('password');
        $user['type'] = 'admin';
        $tags = $request->input('tags');
        $tag_arr = explode(',', $tags);
        $tag_arr = array_filter(array_unique(array_merge($tag_arr, [$user['username']])));

        //这里是为了保证下标从0开始,这样保存到mongo中会是数组而不是Object
        $tag_arr = array_merge($tag_arr);
        $user['tags'] = $tag_arr;
        $user->save();
        $this->setMsg("创建成功", "success");
        return redirect('/sa/admins');
    }

    public function delete(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:user,_id',
        ]);

        $user = User::find($request->input('id'));
        if ($user) {
            $user->delete();
        }
        $this->setMsg("删除成功", "success");
        return redirect('/sa/admins');
    }

    public function edit(Request $request)
    {
        $this->validate($request, [
            'admin_id' => 'required|exists:user,_id',
            'new_password' => 'min:6|max:32',
            'new_tags' => 'regex:/^[^\,]+(\,[^\,]+)*$/',
        ]);

        $user = User::find($request->input('admin_id'));
        if ($request->input('new_password')) {
            $user['password'] = $request->input('new_password');
        }
        $tags = $request->input('new_tags');
        $tag_arr = explode(',', $tags);
        $tag_arr = array_filter(array_unique(array_merge($tag_arr, [$user['username']])));

        //这里是为了保证下标从0开始,这样保存到mongo中会是数组而不是Object
        $tag_arr = array_merge($tag_arr);
        $user['tags'] = $tag_arr;
        $user->save();
        $this->setMsg("修改成功", "success");
        return redirect('/sa/admins');
    }

}