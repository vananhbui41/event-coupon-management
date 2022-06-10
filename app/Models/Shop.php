<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    public function Events() {
        return $this->belongToMany(Event::class);
    }

    public function Coupons() {
        return $this->hasMany(Coupons::class);
    }
}
