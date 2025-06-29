<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    protected $guarded = [];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    public function receiver()
    {
        return $this->hasMany(User::class, 'receiver_id', 'id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
}
