<?php
/**
 * Created By zachary
 * Time: 16/8/14 上午11:26
 */

namespace app\Models;


use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Form extends Model
{
    use SoftDeletes;

    protected $collection = 'forms';
}