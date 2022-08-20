<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['client_id', 'user_id',  'bank_account_id', 'currency_id', 'total', 'total_cur', 'rate',
        'paid'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bancAccount()
    {
        return $this->belongsTo(BankAccount::class, 'bank_account_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function buys()
    {
        return $this->hasMany(Buy::class);
    }
}
