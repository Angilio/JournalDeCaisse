<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntreFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'Montant' => ['required', 'integer'],
            'Description' => ['required', 'min:5'],
            'category_enter_id' => 'required|exists:category_enters,id',
            'date' => ['required']
        ];
    }
}
