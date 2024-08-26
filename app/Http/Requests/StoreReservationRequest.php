<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'book_id' => 'required|exists:books,id',
        ];
    }

    public function messages()
    {
        return [
            'book_id.required' => 'Please select a book to reserve.',
            'book_id.exists' => 'The selected book does not exist.',
        ];
    }
}
