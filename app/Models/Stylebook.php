<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stylebook extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','title','description'];

    // Owner
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Comments (optional but useful)
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
