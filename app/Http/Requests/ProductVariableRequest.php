<?php

namespace App\Http\Requests;

use App\VariableProduct;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ProductVariableRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        $args = [
            'code'   => 'required',
            'name' => 'required'
        ];

        return $args;

    }

    public function messages()
    {
        return [
            'code.required' => 'El código es obligatorio',
            'name.required' => 'El nombre es obligatorio',
        ];
    }
}
