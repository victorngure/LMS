<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'message',
        'staff_number',
        'status',
        'date',
        'avatar'
    ];
}
