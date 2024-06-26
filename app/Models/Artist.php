<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public function songs()
    {
        return $this->hasMany(Song::class, 'artistId')->orderBy('created_at', 'desc');
    }
}
