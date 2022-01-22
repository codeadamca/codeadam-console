<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'slug',
        'icon',
        'url',
        'teaching',
        'background',
        'image',
    ];

    /*
    public function pages()
    {
        return $this->hadMany(Page::class, 'topic_id');
    }
    */

    public function pages()
    {
        return $this->belongsToMany(Page::class);
    }

    public function teachings()
    {
        return ['Yes', 'No'];
    }
    
    public function backgrounds()
    {
        return ['Dark', 'LIght'];
    }
    
}
