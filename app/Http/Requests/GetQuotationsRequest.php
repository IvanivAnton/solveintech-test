<?php

namespace App\Http\Requests;

class GetQuotationsRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function rules(): array
    {
        return [
            'date' => ['required', 'string'],
        ];
    }
}
