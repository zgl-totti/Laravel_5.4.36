<?php

namespace App\Exceptions;

use Exception;

class ApiException extends Exception
{
    public $code;

    public $http_code=200;

    public function __construct($msg,$http_code)
    {
        parent::__construct($msg);

        $this->code=0;

        $this->http_code=$http_code;
    }
}