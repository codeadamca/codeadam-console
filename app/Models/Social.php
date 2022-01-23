<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'url',
        'icon',
        'home',
        'about',
        'header',
        'image',
    ];

    public function homes()
    {
        return ['Yes', 'No'];
    }
    
    public function abouts()
    {
        return ['Yes', 'No'];
    }

    public function headers()
    {
        return ['Yes', 'No'];
    }
}
