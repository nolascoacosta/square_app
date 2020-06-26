<?php

namespace App\Http\Controllers\Api;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends ApiController
{

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        try {

            $credentials = $request->only(['email', 'password']);

            if (! $token = JWTAuth::attempt($credentials)) {
                return  $this->messageBuilder->badRequest('Credentials does not match','ValidationException',401);
            }


            return response()->json([
                'status_code' => 200,
                'access_token' => $token,
                'token_type' => 'Bearer',
                'expires_in' => auth()->factory()->getTTL() * 60,
                'user' => new UserResource(auth()->user())
            ]);

        } catch (\Exception $error) {
            return  $this->messageBuilder->badRequest();
        }
    }

    public function logout(Request $request)
    {
        try {

            config([
                'jwt.blacklist_enabled' => true
            ]);
            auth()->logout();
            JWTAuth::invalidate(JWTAuth::parseToken());

            return response()->json([
                'status_code' => 200,
                'message' => 'Logged out successfully'
            ]);

        } catch (\Exception $error)
        {
            return  $this->messageBuilder->badRequest();
        }


    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
        ]);
    }
}
