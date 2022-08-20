<?php

namespace App\Http\Requests\BankAccount;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBankAccountRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'checking_account' => 'required|string|max:28|digits:28',
            'bank_id' => 'required|exists:banks,id',
            'currency_id' => 'required|exists:currencies,id',
        ];
    }

    public function messages()
    {
        return [
            'checking_account.required' => 'Заполните расчетный счет',
            'checking_account.digits' => 'Число символов должно быть 28 знаков',
            'bank_id.required' => 'Заполните банк',
            'bank_id.exists' => 'Заполните банк',
            'currency_id.required' => 'Заполните валюты',
            'currency_id.exists' => 'Заполните валюты',
        ];
    }
}
