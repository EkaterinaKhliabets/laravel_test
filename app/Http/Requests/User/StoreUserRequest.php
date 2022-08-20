<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'string|required|max:255',
            'lastname' => 'string|required|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'nullable|unique:users,phone|max:13',
            'avatar' => 'nullable|image',
            'not_valid' => 'required|boolean',
            'is_admin' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Заполните имя',
            'lastname.required' => 'Заполните фамилию',
            'email.required' => 'Заполните email',
            'phone.max' => 'Телефон должен состоять максимум из 13 символов',
            'phone.unique' => 'Пользователь с таким номером телефона уже существует',
        ];
    }

    // в этой функции можно обработать валидационные данные до валидации.
    protected function prepareForValidation()
    {
        $this->merge([
            'not_valid' => $this->exists('not_valid') ? true : false,
            'is_admin' => $this->exists('is_admin') ? true : false,
        ]);
    }
}
