<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolType extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'title',
    ];

    public function tools()
    {

        return $this->hasMany(Tool::class, 'tool_type_id');

    }
    
}
