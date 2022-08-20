<?php

namespace App\Http\Requests\Bank;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBankRequest extends FormRequest
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
            'BIK' => 'required|numeric',
            'phone' => 'nullable|string|max:13',
            'address' => 'string|nullable',
            'city' => 'string|nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Заполните название банка',
            'BIK.required' => 'Заполните БИК',
            'BIK.numeric' => 'БИК должен состоять только из цифр',
            'phone.numeric' => 'Телефон должен состоять только из цифр',
            'phone.digits' => 'В телефоне должно быть 12 цифр',
        ];
    }
}
