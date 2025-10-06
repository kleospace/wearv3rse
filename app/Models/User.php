<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;
use App\Models\{Stylebook, Article};

class User extends Authenticatable
{
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    protected $fillable = ['name','email','password'];
    protected $hidden = ['password','remember_token'];

    protected function casts(): array {
        return ['email_verified_at' => 'datetime', 'password' => 'hashed'];
    }

    public function initials(): string {
        return Str::of($this->name)->explode(' ')->take(2)->map(fn($w)=>Str::substr($w,0,1))->implode('');
    }

    public function stylebooks() { return $this->hasMany(Stylebook::class, 'user_id'); }
    public function articles()   { return $this->hasMany(Article::class, 'author_id'); }
}
