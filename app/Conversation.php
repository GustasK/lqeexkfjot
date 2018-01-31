<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        'member_1', 'member_2'
    ];

//    public function messages()
//    {
//        return $this->hasMany(Message::class);
//    }
}
