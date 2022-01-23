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
        'tool_type_id',
        'image',
    ];

    public function tool_type()
    {
        return $this->belongsTo(ToolType::class);
    }
}
