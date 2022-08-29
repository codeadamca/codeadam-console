<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivecodePath extends Model
{

    protected $fillable = [
        'file',
        'content',
        'user_id',
    ];

    protected $dates = ['created_at', 'updated_at'];
    
}
