<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{

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

        return $this->hasMany(Page::class);

    }

    public function manyPages()
    {

        return $this->belongsToMany(Page::class);

    }

    public static function teachings()
    {

        return ['Yes', 'No'];

    }
    
    public static function backgrounds()
    {

        return ['Dark', 'Light'];

    }

    public function manyCourses()
    {

        return $this->belongsToMany(Course::class);

    }

    public function manyJournals()
    {

        return $this->belongsToMany(Journal::class);

    }
    
    public function manyAssignments()
    {

        return $this->belongsToMany(Assignment::class);
        
    }

}
