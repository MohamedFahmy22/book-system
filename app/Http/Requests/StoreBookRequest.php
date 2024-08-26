<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // Ensure the user is authorized to make this request
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'code' => 'required|string|max:10',
            'deserved' => 'nullable|boolean', // Include if 'deserved' is part of the form
        ];
    }
}
