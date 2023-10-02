<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFooterRequest extends FormRequest
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
            'sobre' => 'required|min:6|max:255',
            'info' => 'required|min:6|max:255',
            'contato' => 'required|min:6|max:255',
            'endereco' => 'required|min:6|max:255',
            'email' => 'required|email|min:6|max:255',
        ];
    }
}
