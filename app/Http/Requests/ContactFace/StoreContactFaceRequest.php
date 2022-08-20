<?php

namespace App\Http\Requests\ContactFace;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactFaceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'nullable|unique:contact_faces,phone|max:13',
            'email' => 'required|email|unique:contact_faces',
            'position' => 'nullable|string|max:50',
            'gender' => 'required',
            'status' => 'nullable',
            'client_id' => 'required|exists:clients,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Заполните ФИО',
            'name.max' => 'Поле ФИО может содержать максимум 255 символов',
            'phone.unique' => 'В БД есть уже такой номер телефона',
            'phone.max' => 'Номер телефона должен содежрать максимум 13 символов',
            'position.max' => 'Поле должность должна содержать максимум 50 символов',
            'client_id.exists' => 'Не существует такой компании',
        ];
    }
}
