<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:20', 'min:2'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'category nom bering',
            'name.max' => 'sozlar 20tadan oshmaslik kerak',
            'name.min' => 'sozlar 2tadan kam bolmaslik kerak',
        ];
    }
}
