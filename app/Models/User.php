<?php
namespace App;

use Jenssegers\Mongodb\Eloquent\Model;
/**
 * Created by zachary
 * Date: 16/7/31 上午9:32
 */
class User extends Model
{
    private static $user;

    protected $collection = 'user';

    /**
     * 设置当前用户
     * @param User $user
     */
    public static function setCurrentUser($user)
    {
        User::$user = $user;
    }

    /**
     * 获取当前的登录用户,如果没有用户登录,则返回false
     * @return mixed
     */
    public static function getCurrentUser()
    {
        if (User::$user !== null) {
            return User::$user;
        } else {
            return false;
        }
    }

}