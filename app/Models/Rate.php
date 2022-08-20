<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'rate', 'scale', 'currency_id'];

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
