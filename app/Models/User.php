<?php
namespace App;

use Jenssegers\Mongodb\Eloquent\Model;
/**
 * Created by zachary
 * Date: 16/7/31 上午9:32
 */
class User extends Model
{

    protected $collection = 'user';
}