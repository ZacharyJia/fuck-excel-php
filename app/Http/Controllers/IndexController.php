<?php
/**
 * Created By zachary
 * Time: 16/8/20 上午11:30
 */

namespace App\Http\Controllers;


class IndexController extends BaseController
{
    public function index() {
        return redirect('/login');
    }
}