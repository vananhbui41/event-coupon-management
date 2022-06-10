<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function members () {
        return $this->belongsToMany(Member::class);
    }

    public function shops() {
        return $this->belongsToMany(Shop::class);
    }
}
