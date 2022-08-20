<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use HasFactory;
    use Filterable;
    use Notifiable; // подключаем для того, чтобы клиент мог получать эл. почту

    protected $fillable = ['name', 'user_id', 'email'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contactFaces()
    {
        return $this->hasMany(ContactFace::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
