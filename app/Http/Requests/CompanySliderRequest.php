<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CompanySliderRequest extends FormRequest
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
        $args = [];

        if ($this->id)
            $args['image'] = 'nullable';
        else
            $args['image'] = 'required';

        return $args; 
    }

    public function messages()
    {
        return [
            'image.required' => 'Imagen es requerida'
        ];
    }
}
