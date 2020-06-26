<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\ApiMessageBuilder;
use App\Services\GenerateUserName;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;

/**
 * Class RegisterController
 * @package App\Http\Controllers\Api
 */
class RegisterController extends ApiController
{

    /**
     * A helper to generate userNames .
     *
     * @var GenerateUserName
     */
    protected $generateUserName;

    public function __construct(ResponseFactory $responseFactory, ApiMessageBuilder $messageBuilder, GenerateUserName $generateUserName)
    {
        parent::__construct($responseFactory, $messageBuilder);
        $this->generateUserName = $generateUserName;
    }

    /**
     * @param RegisterRequest $request
     */
    public function register(RegisterRequest $request)
    {
        $request->merge(['user_name' => $this->generateUserName->generateUserName($request->get('first_name'),$request->get('last_name'))]);

        $user = User::create($request->all());
        return response()->json([
            'status_code' => 200,
            'message' => 'Welcome to Blogging Platform. You have successfully registered.',
            'user' => new UserResource($user)
        ]);
    }
}
