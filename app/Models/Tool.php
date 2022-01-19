<?php

namespace App\Models;

use App\Models\ToolType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'slug',
        'tool_type_id',
        'image',
    ];

    public function type()
    {
        return $this->belongsTo(ToolType::class, 'type_id');
    }
}
