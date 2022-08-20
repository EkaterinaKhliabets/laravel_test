<?php

namespace App\Http\Requests\Currency;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurrencyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'id_number' => 'required|numeric|digits_between:2,3',
            'character_code' => 'required|alpha|max:3',
            ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Заполните название валюты',
            'id_number.required' => 'Заполните числовой код валюты',
            'id_number.numeric' => 'Числовой код валюты должен состоять только из цифр',
            'id_number.digits_between' => 'Количество символов в числовом коде валюты должно быть 2 или 3',
            'character_code.required' => 'Заполните символьный код валюты',
            'character_code.alpha' => 'Символьный код валюты должен состоять только из букв',
            'character_code.max' => 'Символьный код валюты должен состоять максимум из 3 символов',
        ];
    }
}
