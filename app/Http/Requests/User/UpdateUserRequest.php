<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
       // dd($user->id);
        return [
            'name' => 'string|required|max:255',
            'lastname' => 'string|required|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->user->id),

            ],
            //'phone' => 'nullable|unique:users,phone|max:13',
            'phone' => [
                'nullable',
                'max:13',
                Rule::unique('users')->ignore($this->user->id),
            ],
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

    protected function prepareForValidation()
    {
        $this->merge([
            'not_valid' => $this->exists('not_valid') ? true : false,
            'is_admin' => $this->exists('is_admin') ? true : false,
        ]);
    }
}
