<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $primaryKey = 'songId';

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artistId');
    }

    public function favoredByUsers()
    {
        return $this->belongsToMany(User::class, 'users_favourites', 'song_id', 'user_id')->withTimestamps();
    }
}
