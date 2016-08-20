<?php
/**
 * Created By zachary
 * Time: 16/8/14 下午4:38
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;

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
        return view('admin.users');
    }

}