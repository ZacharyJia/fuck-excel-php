<?php
/**
 * Created By zachary
 * Time: 16/8/14 下午4:30
 */

namespace app\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;

class FormController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        view()->share([
            'forms' => true,
        ]);
    }

    public function index()
    {
        return view('admin.forms');
    }
}