<?php
/**
 * Created By zachary
 * Time: 16/8/27 下午1:34
 */

namespace App\Exceptions;


use Exception;

class RedirectException extends Exception
{
    public $response;

    public function __construct($response, $message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->response = $response;
    }
}