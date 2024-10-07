<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntreFormRequest extends FormRequest
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
            'Montant' => ['required', 'numeric'],
            'created_at' => ['required', 'date'],
            'Description' => ['required'],
            'category_enter_id' => ['required', 'exists:category_enters,id'],
            'User_id' => ['required', 'exists:users,id']
        ];
    }
}
