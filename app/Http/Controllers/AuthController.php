<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\BearerToken;
use App\Http\Resources\UserResource;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function __construct(private AuthService $service)
    {}

    public function index(Request $request): UserResource
    {
        return new UserResource($request->user());
    }

    public function register(RegisterRequest $request): BearerToken
    {
        $user = $this->service->register($request->email, $request->password, $request->name);

        return new BearerToken($user->createToken('auth_token')->plainTextToken);
    }

    public function login(LoginRequest $request): BearerToken
    {
        $user = $this->service->login($request->email, $request->password);

        return new BearerToken($user->createToken('auth_token')->plainTextToken);
    }

    public function logout(Request $request): Response
    {
        $request->user()->currentAccessToken()->delete();

        return response()->noContent();
    }
}
