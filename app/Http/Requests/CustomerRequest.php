<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            
            'name' => 'required|string|max:50',
            'email' => 'required|string|max:200',
            'postcode' => 'required|string|max:7|min:7',
            'address' => 'required|string|max:200',
            'ter' => 'required|string|max:15|min:6',
        ];
    
    }
}
