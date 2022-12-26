<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class HomeRequest extends FormRequest
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
            'order'         => 'nullable|min:2|max:2',
        ];

        if (! $this->id)
            $args['image'] = 'required';
        else
            $args['image'] = 'nullable';

        
        return $args;
    }

    public function messages()
    {
        return [
            'order.min'         => 'Orden solo puede tener dos caracteres',
            'order.max'         => 'Orden solo puede tener dos caracteres',
            'image.required'    => 'Imagen es requerida',
        ];
    }
}
