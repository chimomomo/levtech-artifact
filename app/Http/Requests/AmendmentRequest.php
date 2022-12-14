<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AmendmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amendment.title' => 'required|string|max:50',
            'amendment.body' => 'required|string|max:200',
        ];
    }
}
