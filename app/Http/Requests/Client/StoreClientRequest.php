<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'user_id' => 'nullable|exists:users,id',
            'email' => 'nullable|email',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Заполните название',
            'name.max' => 'В названии может быть максимум 255 символов',
            'user_id.exists' => 'Не найден в БД такой менеджер',
        ];
    }
}
