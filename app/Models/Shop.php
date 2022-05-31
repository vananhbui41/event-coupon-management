<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Event;

class Shop extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'shops';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'code',
        'name',
        'area',
        'prefectures',
        'address',
        'lat',
        'long',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_shop', 'shop_id', 'event_id')->withTimestamps();
    }

}
