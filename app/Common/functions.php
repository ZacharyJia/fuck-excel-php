<?php

if (!function_exists('encrypt_id')) {
    function encrypt_id($id)
    {
        $hashids = app('hashids');
        return $hashids->encode($id);
    }
}

if (!function_exists('decrypt_id')) {
    function decrypt_id($hash) {
        $hashids = app('hashids');
        $ids = $hashids->decode($hash);
        if (count($ids)) {
            return $ids[0];
        }
        return -1;
    }
}

if (!function_exists('redirect_now')) {
    function redirect_now($to = null, $status = 302, $headers = [], $secure = null) {
        throw new \App\Exceptions\RedirectException(redirect($to, $status, $headers, $secure));
    }
}

if (!function_exists('json_now')) {
    function json_now($data) {
        throw new \App\Exceptions\AjaxException($data);
    }
}