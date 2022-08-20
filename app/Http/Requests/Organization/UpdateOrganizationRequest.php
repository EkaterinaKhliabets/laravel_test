<?php

namespace App\Http\Requests\Organization;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrganizationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'unp' => 'required|numeric|digits:9',
            'phone' => 'required|numeric|digits:12',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Заполните название организации',
            'address.required' => 'Заполните адрес организации',
            'email.required' => 'Заполните email',
            'email.email' => 'Некорректно указан email',
            'unp.required' => 'Заполните УНП',
            'unp.numeric' => 'УНП должно состоять только из цифр',
            'unp.digits' => 'Длина УНП должна быть 9 символов',
            'phone.required' => 'Заполните телефон',
            'phone.numeric' => 'Телефон должен состоять только из цифр',
            'phone.digits' => 'В телефоне должно быть 12 цифр',
        ];
    }
}
