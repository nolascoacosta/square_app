<?php

namespace App\Exceptions;

use App\Services\ApiMessageBuilder;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Container\Container;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Square\Contracts\JsonRenderableInterface;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;

class Handler extends ExceptionHandler
{

    /**
     * A helper to create error messages.
     *
     * @var ApiMessageBuilder
     */
    protected $messageBuilder;

    public function __construct(Container $container, ApiMessageBuilder $messageBuilder)
    {
        parent::__construct($container);

        $this->messageBuilder = $messageBuilder;
    }

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param \Throwable $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {

        if ($request->is('api/*') && $exception instanceof AuthenticationException) {
            return $this->messageBuilder->unauthorized();
        }

        if ($request->is('api/*') && $exception instanceof QueryException) {
            return $this->messageBuilder->badRequest($exception->getMessage());
        }

        if ($request->is('api/*') && $exception instanceof RouteNotFoundException) {
            return $this->messageBuilder->badRequest($exception->getMessage());
        }

        if ($request->is('api/*') && $exception instanceof MethodNotAllowedHttpException) {
            return $this->messageBuilder->badRequest($exception->getMessage());
        }



        if ($request->is('api/*' && $exception instanceof ModelNotFoundException)) {
            return $this->messageBuilder->modelNotFound();
        }
        if ($request->is('api/*' && $exception instanceof AuthorizationException)) {
            return $this->messageBuilder->forbidden();
        }

        if ($request->is('api/*' && ($exception instanceof \Illuminate\Http\Exceptions\ThrottleRequestsException))) {
            return ($this->messageBuilder->tooManyRequests())->withHeaders($exception->getHeaders());
        }
        if ($request->is('api/*' && $exception instanceof JsonRenderableInterface)) {
            return $this->messageBuilder->serverError();
        }

        return parent::render($request, $exception);
    }
}
