<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meme extends Model
{

    protected $fillable = [
        'title',
        'image',
        'displayed_at',
    ];

    protected $dates = ['created_at', 'updated_at', 'displayed_at'];

    public function manyTags()
    {

        return $this->belongsToMany(Tag::class);

    }

}
