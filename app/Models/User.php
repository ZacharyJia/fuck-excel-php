<?php
namespace app;

use Jenssegers\Mongodb\Eloquent\Model;
/**
 * Created by PhpStorm.
 * User: zachary
 * Date: 16/7/31
 * Time: 上午9:32
 */
class User extends Model
{

    protected $collection = 'user';
}