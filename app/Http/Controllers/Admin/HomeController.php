<?php

/**
 * Created By zachary
 * Time: 16/8/13 下午1:09
 */
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        view()->share([
            'home' => true,
        ]);
    }

    public function home(Request $request)
    {
        return view('admin.home');
    }
}