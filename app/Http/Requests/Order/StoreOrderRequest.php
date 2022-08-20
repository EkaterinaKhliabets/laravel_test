<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'client_id' => 'required|exists:clients,id',
            'user_id' => 'required|exists:users,id',
            'bank_account_id' => 'required|exists:bank_accounts,id',
            'currency_id' => 'required|exists:currencies,id',
            //'currency_id' => 'required',
            'total' => 'required',
            'total_cur' => 'required',
            'rate' => 'required',
            'paid' => 'required',
            //'scale' => 'required',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'paid' => $this->exists('paid') ? true : false,
            'total' => array_sum($this->total),
            'total_cur' => array_sum($this->total_cur),
        ]);
    }

    /*
     *  $table->foreignId('client_id')->constrained('clients')->restrictOnDelete();
            $table->foreignId('user_id')->constrained('users')->restrictOnDelete();
            $table->foreignId('bank_account_id')->constrained('bank_accounts')->restrictOnDelete();
            $table->foreignId('currency_id')->constrained('currencies')->restrictOnDelete();
            $table->float('total', 10, 2); //сумма в бел руб
            $table->float('total_cur', 10, 2); //сумма в валюте заказа
            $table->float('rate', 6,3); // курс валюты
            $table->boolean('paid')->default(0); // оплачено*/
}
