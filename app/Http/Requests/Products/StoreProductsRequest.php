<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|regex:/^\d*(\.\d{2})?$/',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Заполните название продукта',
            'price.regex' => 'Цена записывается целым числом или дробным с двумя знаками после точки',
        ];
    }
}
