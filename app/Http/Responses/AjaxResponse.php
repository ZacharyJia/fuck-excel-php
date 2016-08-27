<?php
/**
 * Created By zachary
 * Time: 16/8/27 下午1:56
 */

namespace App\Http\Responses;

use Exception;
use Illuminate\Http\Response;

class AjaxResponse extends Response
{
    protected static $error_codes = [
        "SUCCESS"           =>  ['code' => '0', 'msg' => 'success'],

        "NO_AUTH"           =>  ['code' => '100001', 'msg' => 'no_auth'],
    ];

    public static function getAjaxResponse($code, $data = [])
    {
        if (array_has(self::$error_codes, $code)) {
            $content = self::$error_codes[$code];
            $content['data'] = $data;
        } else {
            throw new Exception("no given error code", 500);
        }

        $response = new AjaxResponse();
        $response->setContent($content);
        return $response;
    }
}