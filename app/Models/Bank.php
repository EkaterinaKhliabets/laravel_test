<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'BIK', 'phone', 'city', 'address'];

    public function bankAccounts()
    {
        return $this->hasMany(BankAccount::class);
    }

    /* public function getCityAttribute($value)
     {
         if($value == null){
             $value = '-';
         }
         return $value;
     }

     public function getAddressAttribute($value)
     {
         if($value == null){
             $value = '-';
         }
         return $value;
     }

     public function getPhoneAttribute($value)
     {
         if($value == null){
             $value = '-';
         }
         return $value;
     }*/
}
