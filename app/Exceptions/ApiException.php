<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;

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

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if($request->expectsJson()){
            $response=response()->json([
                'status'=>3,
                'msg' => $exception->getMessage(),
                'errors'=>[],
            ], 200);
        }else{
            $response=redirect()->guest(route('login'));
        }
        return $response;
    }

    protected function invalidJson($request, ValidationException $exception)
    {
        return response()->json([
            'status'=>2,
            'msg' => $exception->getMessage(),
            'errors' => $exception->errors(),
        ], $exception->status);
    }
}