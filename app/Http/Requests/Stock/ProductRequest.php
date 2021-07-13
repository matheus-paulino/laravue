<?php

namespace App\Http\Requests\Stock;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'É necessário indicar o nome do produto',
            'price.required' => 'É necessário indicar o preço do produto'
        ];
    }
}
