<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'gender', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token', 'admin',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
