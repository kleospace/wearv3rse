<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    protected $fillable = [
        'author_id',
        'is_public',
        'title',
        'content',
    ];

    // Relation zum Autor (User)
    public function author()
    {
        return $this->belongsTo(\App\Models\User::class, 'author_id');
    }
}
