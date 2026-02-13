<?php

namespace App\Http\Requests;

use App\Services\AuthService;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required'],
            'tac' => ['accepted']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The full name field is required.',
            'tac.accepted' => 'Terms and conditions must be accepted.'
        ];
    }

    public function authenticate(AuthService $authService): void{
        $authService->register($this->only('name', 'email', 'password'));
    }
}
