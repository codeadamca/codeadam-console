<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    protected $fillable = [
        'title',
        'content',
        'slug',
        'tinkercad_id',
        'arduino_id',
        'github_id',
        'youtube_id',
        'topic_id',
        'image',
        'published_at',
    ];

    protected $dates = ['created_at', 'updated_at', 'published_at'];
    
    public function topic()
    {

        return $this->belongsTo(Topic::class);

    }
    
    public function manyTopics()
    {

        return $this->belongsToMany(Topic::class);
        
    }
    
}
