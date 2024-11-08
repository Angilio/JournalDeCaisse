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
            'date' => 'required|array',
            'date.*' => 'date',
            'Context' => 'required|array',
            'Context.*' => 'string',
            'Quantity' => 'array',
            'Quantity.*' => 'numeric|min:1',
            'Montant' => 'array',
            'Montant.*' => 'numeric|min:1',
            'category_id' => 'required|array',
            'category_id.*' => 'numeric',
            'beneficiaire_id' => 'required|array',
            'beneficiaire_id.*' => 'numeric',
            'personnel_id' => 'required|array',
            'personnel_id.*' => 'numeric'

            /*'Montant' => ['required', 'integer'],
            'Quantity' => ['integer'],
            'Context' => ['required', 'min:5'],
            'category_id' => 'required|exists:categories,id',
            'personnel_id' => 'required|exists:personnels,id',
            'beneficiaire_id' => 'required|exists:beneficiaires,id',
            'date' => ['required']*/
        ];
    }
}
