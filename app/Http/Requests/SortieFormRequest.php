<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SortieFormRequest extends FormRequest
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
            'Quantity' => ['required', 'integer'],
            'Context' => ['required', 'min:5'],
            'category_id' => 'required|exists:categories,id',
            'personnel_id' => 'required|exists:personnels,id',
            'beneficiaire_id' => 'required|exists:beneficiaires,id',
            'date' => ['required']
        ];
    }
}
