<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choreography extends Model
{
    use HasFactory;

    public function song()
    {
        return $this->belongsTo(Song::class, 'song_id');
    }

    public function dancer1()
    {
        return $this->belongsTo(User::class, 'dancer1_id');
    }

    public function dancer2()
    {
        return $this->belongsTo(User::class, 'dancer2_id');
    }

    public function dancer3()
    {
        return $this->belongsTo(User::class, 'dancer3_id');
    }

    public function dancer4()
    {
        return $this->belongsTo(User::class, 'dancer4_id');
    }

    public function dancer5()
    {
        return $this->belongsTo(User::class, 'dancer5_id');
    }

}
