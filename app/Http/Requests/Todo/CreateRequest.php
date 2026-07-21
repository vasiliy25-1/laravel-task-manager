<?php

namespace App\Http\Requests\Todo;

use App\Http\Requests\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'category_id' => 'integer|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'string|max:1000',
            'priority' => 'integer|min:-128|max:127',
            'completed_at' => 'date_format:Y-m-d\\TH:i:sP'
        ];
    }
}
