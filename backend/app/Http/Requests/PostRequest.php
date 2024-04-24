<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'name' => 'required|string',
            'surface' => 'required|string',
            'nbr_piece' => 'required|string',
            'prix' => 'required|string',
            'description' => 'required|string',
            'departement' => 'required|string',
            'ville' => 'required|string',
            'quartier' => 'required|string',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif',
        ];
    }
}
