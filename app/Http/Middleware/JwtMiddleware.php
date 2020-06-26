<?php

namespace App\Http\Middleware;

use App\Services\ApiMessageBuilder;
use Closure;
use Exception;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * A helper to create error messages.
     *
     * @var ApiMessageBuilder
     */
    protected $messageBuilder;
    public function __construct(ApiMessageBuilder $messageBuilder)
    {
        $this->messageBuilder = $messageBuilder;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //dd(JWTAuth::parseToken()->authenticate());
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof TokenBlacklistedException){
                return $this->messageBuilder->badRequest('The token has been blacklisted','TokenBlacklistedException',401,$e->getCode());
            }
            else if ($e instanceof TokenInvalidException){
                return $this->messageBuilder->badRequest('Token is Invalid','TokenInvalidException',401,$e->getCode());
            }else if ($e instanceof TokenExpiredException){
                return $this->messageBuilder->badRequest('Token is Expired', 'TokenExpiredException',401,$e->getCode());
            }else{
                return $this->messageBuilder->unauthorized('Authorization Token not found');
            }
        }
        return $next($request);
    }
}
