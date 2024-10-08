<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PageRequestForm extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'text' => ['required'],
            'numero' => ['required', 'numeric', 'min:0']
        ];
    }

    public function messages() {
        return [
            'text.required' => 'Le text est requis pour créer une page',
            'numero.required' => 'Le Numero est requis pour créer une page',
            'numero.numeric' => 'Le Numero est doit être un nombre',
            'numero.min' => 'Le Numero est doit être supérieur à 0',            
        ];
    }

}
