<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'github_id',
        'image',
    ];

    public function manyTopics()
    {
        return $this->belongsToMany(Topic::class);
    }
    
    protected $dates = ['created_at', 'updated_at'];
}
