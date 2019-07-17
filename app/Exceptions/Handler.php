<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        //如果为debug模式的话让laravel自行处理
        if(env('APP_DEBUG')){
            return parent::render($request, $exception);
        }

        return $this->handle($request,$exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest(route('login'));
    }

    /*
     * 异常处理
     */
    protected function handle($request, Exception $e)
    {
        // 只处理自定义的APIException异常
        if($e instanceof ApiException) {
            $result = [
                'code' => $e->getCode(),
                'msg'  => $e->getMessage()
            ];

            return response()->json($result,$e->http_code);
        }

        if ($e instanceof NotFoundHttpException) {
            if($request->isMethod('post')) {
                $result = [
                    'code' => 0,
                    'msg' => '抱歉，未找到数据！'
                ];

                return response()->json($result, 404);
            }

            return view('index.404');
        }

        if ($e instanceof ValidationException) {
            $message = current(current(array_values($e->errors())));

            // 不加4022，会返回httpStatus=422;加4022是因为返回前端统一httpStatus为200，就在422中加了0
            throw new BaseException($message, 4022);
        }

        return parent::render($request, $e);
    }
}
