<?php

namespace App\Models;

use App\Models\ArticleType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->belongsTo(ArticleType::class, 'type_id');
    }
}
