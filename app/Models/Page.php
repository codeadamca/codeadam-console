<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

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

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class);
    }
}
