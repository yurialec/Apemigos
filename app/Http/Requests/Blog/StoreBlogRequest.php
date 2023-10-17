<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'titulo' => 'required|min:6|max:255',
            'data_evento' => 'required|date',
            'texto' => 'required|min:6|max:255',
            'imagem' => 'required',
            'imagem.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
