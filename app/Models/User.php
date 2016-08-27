<?php

namespace App\Models;

/**
 * Created by zachary
 * Date: 16/7/31 上午9:32
 */
class User extends BaseModel
{
    private static $user;

    protected $table = 'user';

    protected $hidden = ['password'];

    protected $pgArrays = ['tags'];


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

    /**
     * 查找与给定tags有交集的用户
     * 即查找管理员可以管理的普通用户
     * @param $tags
     * @param string $type
     * @return
     */
    public static function whereUserContainsTags($tags, $type = 'user') {
        if (!is_array($tags)) {
            $tags = array($tags);
        }

        $builder = self::wherePgArrayOverlap('tags', $tags)
            ->where('type', $type);

        return $builder;
    }

}