<?php
/**
 * Created By zachary
 * Time: 16/8/13 下午1:52
 */

namespace app\Http\Controllers\Sa;


use App\Http\Controllers\BaseController;

class AdminController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        view()->share([
            'admins' => true,
        ]);
    }

    public function index() {
        return view('sa.admin');
    }
}