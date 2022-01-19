<?php

namespace App\Models;

use App\Models\ToolType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->belongsTo(ToolType::class, 'type_id');
    }
}
