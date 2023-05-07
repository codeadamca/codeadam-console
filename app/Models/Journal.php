<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'url',
        'image',
        'published_at',
    ];

    public function manyTopics()
    {
        return $this->belongsToMany(Topic::class);
    }
}
