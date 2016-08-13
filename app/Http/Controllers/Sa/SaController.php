<?php

/**
 * Created By zachary
 * Time: 16/8/13 下午1:09
 */
namespace App\Http\Controllers\Sa;

use App\Http\Controllers\BaseController;

class SaController extends BaseController
{
    public function index()
    {
        return view('sa.sa');
    }
}