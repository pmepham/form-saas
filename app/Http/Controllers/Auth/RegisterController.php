<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

class RegisterController{

    public function __construct(private AuthService $authService){} 

    public function index(){
        return view('auth.register');
    }

    //login attempt
    public function store(RegisterRequest $registerRequest): JsonResponse{
        $registerRequest->authenticate($this->authService);
        return response()->json(['success' => true, 'redirect' => route('login.index')]);
    }

}
