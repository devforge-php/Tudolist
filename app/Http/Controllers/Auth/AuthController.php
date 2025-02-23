<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authServices;

    public function __construct(AuthServices $authServices)
    {
        $this->authServices = $authServices;
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $response = $this->authServices->register($request);
        return response()->json($response['data'], $response['status']);
    }

    public function verify(Request $request): JsonResponse
    {
        $response = $this->authServices->verify($request);
        return response()->json($response['data'], $response['status']);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $response = $this->authServices->login($request);
        return response()->json($response['data'], $response['status']);
    }

    public function logout(Request $request): JsonResponse
    {
        $response = $this->authServices->logout($request);
        return response()->json($response['data'], $response['status']);
    }
}