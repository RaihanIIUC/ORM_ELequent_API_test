<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Sub_CategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name"=>'required',
			"is_active" =>'boolean|required'
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
    
        throw new \Illuminate\Validation\ValidationException($validator , response()->json($validator->errors(), 422));
    }
    
}
