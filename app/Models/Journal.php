<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{

    protected $fillable = [
        'name',
        'description',
        'url',
        'image',
        'published_at',
    ];

    protected $dates = ['created_at', 'updated_at', 'published_at'];

    public function manyTopics()
    {

        return $this->belongsToMany(Topic::class);

    }

}
