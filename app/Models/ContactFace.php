<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ContactFace extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'position', 'gender', 'status', 'client_id'];

    public $genders = [
        'm' => 'Man',
        'w' => 'Woman'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
