<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivecodeUser extends Model
{

    protected $fillable = [
        'github',
        'display',
        'count',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function files()
    {

        return $this->hasMany(LivecodeFile::class);
        
    }

}
