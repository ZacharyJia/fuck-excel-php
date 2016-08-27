<?php
/**
 * Created By zachary
 * Time: 16/8/13 下午1:01
 */

namespace App\Http\Controllers\User;


use App\Http\Controllers\BaseController;
use App\Models\User;
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

    public function index(Request $request)
    {
        return view('user.home');
    }

}