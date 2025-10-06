<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['author_id','is_public','title','content'];

    public function author() { return $this->belongsTo(User::class, 'author_id'); }
}
