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

    public function pages()
    {
        return $this->hadMany(Page::class, 'topic_id');
    }
    
}
