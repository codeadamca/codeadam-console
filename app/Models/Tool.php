<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ToolType;

class Tool extends Model
{

    protected $fillable = [
        'title',
        'url',
        'tool_type_id',
        'image',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function type()
    {

        return $this->belongsTo(ToolType::class, 'tool_type_id');

    }

}
