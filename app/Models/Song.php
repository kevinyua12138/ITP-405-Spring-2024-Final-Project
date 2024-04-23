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

    public function comments()
    {
        return $this->hasMany(Comment::class, 'song_id', 'songId')->orderBy('created_at', 'desc');
    }

    public function choreographies()
    {
        return $this->hasMany(Choreography::class, 'song_id');
    }
}
