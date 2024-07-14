<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Providers\AuthServiceInterface;
use App\Service\AuthService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class AuthController extends Controller
{

    public function __construct(private AuthServiceInterface $authService)
    {}

    public function login(Request $request)
    {
        $access_token = $this->authService->login($request->all());
        return response()->json(['access_token' => $access_token], 200);
    }

    public function logout()
    {
        $user = auth()->user();
        $user->currentAccessToken()->delete();
        return response()->json(['message' => 'Token revoked'], 200);
    }

    public function register(UserRequest $request)
    {
        $this->authService->register($request->all());
        return response()->json(['message' => 'User registered successfully'], 201);
    }

}
