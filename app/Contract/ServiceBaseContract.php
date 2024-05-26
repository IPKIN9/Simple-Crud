<?php

namespace App\Contract;

interface ServiceBaseContract
{
    public function success($data, $message = null, $code = 200);
    public function error($message, \Throwable $th, $code = 400);
}