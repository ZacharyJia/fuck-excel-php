<?php

/**
 * Created By zachary
 * Time: 16/8/13 下午1:09
 */
namespace App\Http\Controllers\Sa;

use App\Http\Controllers\BaseController;

class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        view()->share([
            'home' => true,
        ]);
    }

    public function index()
    {
        return view('sa.home');
    }
}