<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'title',
    ];

    public function manyMemes()
    {

        return $this->belongsToMany(Meme::class);

    }
    
}
