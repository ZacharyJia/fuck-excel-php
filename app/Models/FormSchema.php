<?php
/**
 * Created By zachary
 * Time: 16/8/14 上午11:19
 */

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormSchema extends Model
{
    use SoftDeletes;

    protected $collection = "form_schemas";

}