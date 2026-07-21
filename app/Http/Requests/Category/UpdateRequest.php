<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
            'color' => ['regex:/^#([a-f0-9]{6})$/i']
        ];
    }
}
