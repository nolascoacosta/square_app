<?php
namespace App\Services;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

final class ApiMessageBuilder
{
    /**
     * Returns a 400 bad request error.
     *
     * @param string $message
     * @param string $type
     * @param int    $code
     * @param int    $status
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function badRequest(
        string $message = 'The given data was invalid.',
        string $type = ValidationException::class,
        int $code = 400,
        int $status = 400
    ): JsonResponse
    {
        return self::makeResponseError($message, $type, $code, $status);
    }

    /**
     * Returns a 401 unauthorized error.
     *
     * @param string $message
     * @param string $type
     * @param int    $code
     * @param int    $status
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function unauthorized(
        string $message = 'This action is unauthorized.',
        string $type = AuthorizationException::class,
        int $code = 401,
        int $status = 401
    ): JsonResponse
    {
        return self::makeResponseError($message, $type, $code, $status);
    }

    /**
     * Returns a 403 forbidden error.
     *
     * @param string $message
     * @param string $type
     * @param int    $code
     * @param int    $status
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function forbidden(
        string $message = 'This action is forbidden for the current user.',
        string $type = AuthorizationException::class,
        int $code = 403,
        int $status = 403
    ): JsonResponse
    {
        return self::makeResponseError($message, $type, $code, $status);
    }

    /**
     * Returns a 404 not found error.
     *
     * @param string $message
     * @param string $type
     * @param int    $code
     * @param int    $status
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function modelNotFound(
        string $message = 'The resource you are looking for does not exist.',
        string $type = ModelNotFoundException::class,
        int $code = 404,
        int $status = 404
    ): JsonResponse
    {
        return self::makeResponseError($message, $type, $code, $status);
    }

    /**
     * Returns a 429 too many requests error.
     *
     * @param string $message
     * @param string $type
     * @param int    $code
     * @param int    $status
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function tooManyRequests(
        string $message = 'You have made too many requests.',
        string $type = ThrottleRequestsException::class,
        int $code = 429,
        int $status = 429
    ): JsonResponse
    {
        return self::makeResponseError($message, $type, $code, $status);
    }

    /**
     * Returns a 500 internal server error.
     *
     * @param string $message
     * @param string $type
     * @param int    $code
     * @param int    $status
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function serverError(
        string $message = 'Internal server error.',
        string $type = \Exception::class,
        int $code = 500,
        int $status = 500
    ): JsonResponse
    {
        return self::makeResponseError($message, $type, $code, $status);
    }


    /**
     * Returns a JsonResponse with the default error structure.
     *
     * @param string $message
     * @param string $type
     * @param int    $code
     * @param int    $status
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function makeResponseError(string $message, string $type, int $code, int $status): JsonResponse
    {
//        return new JsonResponse( [
//            'type'    => $type,
//            'code'    => $code,
//            'message' => $message,
//        ],$status);
        return new JsonResponse(['errors' => [
            [
                'type'    => $type,
                'code'    => $code,
                'message' => $message,
            ]
        ]], $status);
    }
}
