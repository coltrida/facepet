<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, Notifiable;

    protected $guarded = [];

    public function getPathPhotoAttribute()
    {
        if(Storage::disk('public')->exists('/posts/'.$this->id.'.jpg'))
        {
            return '/storage/posts/'.$this->id.'.jpg';
        }
    }

    public function getLikeduserAttribute()
    {
        return $this->likes()
            ->where('user_id', auth()->id())
            ->count();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'like_post_user', 'post_id', 'user_id');
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
