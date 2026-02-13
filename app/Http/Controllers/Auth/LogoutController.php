<?php 
namespace App\Http\Controllers\Auth;

use App\Services\AuthService;

class LogoutController{

    public function __invoke(AuthService $authService){
        $authService->logout();
        return response()->json(['success' => true, 'redirect' => route('login.index')]);
    }

}