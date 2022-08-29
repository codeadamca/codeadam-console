<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivecodeUser extends Model
{

    protected $fillable = [
        'github',
        'count',
    ];

    protected $dates = ['created_at', 'updated_at'];

}
