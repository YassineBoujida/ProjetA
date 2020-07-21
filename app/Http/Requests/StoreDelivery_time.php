<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDelivery_time extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'delivery_at'=>['required','regex:/^([1]?[0-9]|2[0-3])\->([1]?[0-9]|2[0-3])$/']
        ];
    }

    public function messages()
    {
    return [
        'delivery_at.regex' => 'A delivery time must be like "8->12"'
    ];
    }
}
