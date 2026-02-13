<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

class LoginController{

    public function __construct(private AuthService $authService){} 

    public function index(){
        return view('auth.login');
    }

    //login attempt
    public function store(LoginRequest $loginRequest): JsonResponse{
        $loginRequest->authenticate($this->authService);
        return response()->json(['success' => true, 'redirect' => route('dashboard')]);
    }

}
