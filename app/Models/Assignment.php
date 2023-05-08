<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{

    protected $fillable = [
        'title',
        'url',
        'github_id',
        'image',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function manyTopics()
    {

        return $this->belongsToMany(Topic::class);

    }

}
