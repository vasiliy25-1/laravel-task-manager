<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'name' => 'max:255'
        ];
    }
}
