<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthService{

    public function login(array $credentials, bool $remember = false): void{
        if(! Auth::attempt($credentials, $remember)){
            throw ValidationException::withMessages(['email' => 'auth.faild']);
        }

        //$user = Auth::user();
        //TODO: check user actvivity
        request()->session()->regenerate();
    }

    public function register(array $credentials){
        User::create($credentials);
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
    }

}