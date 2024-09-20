<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class rgisterRequest extends FormRequest
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
            'name'=> 'required',
            'firstName'=> 'required',
            'Pseudo'=> 'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:8'
        ];
    }
    public function message()
    {
        return [
            'name.required'=> 'Le champ nom est requis',
            'firstName.required'=> 'Le champ prénoms est requis',
            'Pseudo.required'=> 'Le champ Pseudo est requis',
            'email.required'=> 'Le champ Mail est requis',
            'email.unique'=> 'L\'email est unique pour un utilisateur',
            'password.required'=> 'Le champ password est requis',
            'password.min'=> 'Le champ password est doit excéder de 8 caractères'
        ];
    }
}
