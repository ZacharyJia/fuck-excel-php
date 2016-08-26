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