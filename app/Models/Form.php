<?php
/**
 * Created By zachary
 * Time: 16/8/14 上午11:26
 */

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    use SoftDeletes;

    protected $collection = 'forms';
}