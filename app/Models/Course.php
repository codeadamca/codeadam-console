<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = [
        'name',
        'code',
        'url',
        'description',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function manyTopics()
    {

        return $this->belongsToMany(Topic::class);

    }
    
}
