<?php
/**
 * Created By zachary
 * Time: 16/8/27 下午1:24
 */

namespace App\Exceptions;


use Exception;

class AjaxException extends Exception
{
    public $data;

    public function __construct($data, $message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->data = $data;
    }
}