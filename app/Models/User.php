<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\UploadedFile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use Filterable;

    const NO_IMAGE = 'uploads/no-image.png';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'phone',
        'avatar',
        'not_valid',
        'organization_id',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getAvatarAttribute($value){
        return $value ?? self::NO_IMAGE;
    }

    public function setAvatarAttribute($value)
    {
        if ($value instanceof UploadedFile) {

            if ($this->avatar !== null && Storage::exists($this->avatar) && $this->avatar !== self::NO_IMAGE) {
                Storage::delete($this->avatar);
            }

            $this->attributes['avatar'] = $value->store("uploads");

        }
    }

    public function scopeNot_valid($query)
    {
        return $query->where('not_valid', false);
    }

    public function setPasswordAttribute($value)
    {
        if ($value != null)
            $this->attributes['password'] = bcrypt($value);
    }

    public function getPasswordAttribute($value)
    {
        return $value;
    }
}
