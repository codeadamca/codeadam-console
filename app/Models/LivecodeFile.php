<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivecodeFile extends Model
{

    protected $fillable = [
        'path',
        'content',
        'livecode_user_id',
    ];

    protected $dates = ['created_at', 'updated_at'];
  
    public function user()
    {

        return $this->belongsTo(LivecodeUser::class, 'livecode_user_id');
        
    }
    
}
