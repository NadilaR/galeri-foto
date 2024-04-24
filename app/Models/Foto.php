<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class Foto extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function hasLike()
    {
        return $this->hasOne(Like::class)->where('likes.user_id', Auth::user()->id);
    }

    public function hasLikee()
    {
        return $this->hasOne(Like::class)->where('likes.user_id', '1');
    }

    public function totalLikes()
    {
        return $this->hasMany(Like::class)->count();
    }

}
