<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $casts = [
        'me' => 'boolean',
    ];

    protected $fillable = ['id', 'from_id', 'to_id', 'content'];
}
