<?php
/**
 * Created By zachary
 * Time: 16/8/13 下午1:52
 */

namespace App\Http\Controllers\Sa;


use App\Http\Controllers\BaseController;

class TagController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        view()->share([
            'tags' => true,
        ]);
    }
}