<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'review.title' => 'required|string|max:50',
            'review.body' => 'required|string|max:200',
            'review.stars' => 'required|integer|min:0|max:5',
        ];
    }
}
