<?php
/**
 * Created By zachary
 * Time: 16/8/27 上午12:41
 */

namespace app\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Smiarowski\Postgres\Model\Traits\PostgresArray;

class BaseModel extends Model
{
    use SoftDeletes;
    use PostgresArray;

    /**
     * postgresql 中的数组类型的字段名称
     */
    protected $pgArrays = [];

    /**
     * 魔术方法,如果赋值字段是pgArrays中的字段,则进行处理
     * @param string $key
     * @param mixed $value
     */
    public function __set($key, $value)
    {
        if (in_array($key, $this->pgArrays)) {
            if ($value === null) {
                $value = [];
            }
            $this->attributes[$key] = self::mutateToPgArray($value);
        } else {
            parent::__set($key, $value);
        }
    }

    /**
     * 魔术方法,如果要获取的字段是pgArrays中的字段,则处理后返回
     * @param string $key
     * @return array|mixed
     */
    public function __get($key)
    {
        if (in_array($key, $this->pgArrays)) {
            return self::accessPgArray($this->attributes[$key]);
        }
        return parent::__get($key);
    }

    public function toArray()
    {
        $arr = parent::toArray();
        foreach ($this->pgArrays as $key) {
            $arr[$key] = self::accessPgArray($arr[$key]);
        }
        return $arr;
    }
}