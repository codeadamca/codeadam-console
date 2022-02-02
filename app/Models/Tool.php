<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ToolType;

class Tool extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'tool_type_id',
        'image',
    ];

    public function type()
    {
        return $this->belongsTo(ToolType::class, 'tool_type_id');
    }
}
