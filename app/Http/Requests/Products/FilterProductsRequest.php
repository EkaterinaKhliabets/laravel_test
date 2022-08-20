<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class FilterProductsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'prod' => 'nullable|string|max:25',
        ];
    }
}
