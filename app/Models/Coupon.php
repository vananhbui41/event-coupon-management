<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Member;
use App\Models\Event;

class Coupon extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'coupons';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'coupon_code',
        'r_online_code',
        'title',
        'name',
        'summary',
        'image',
        'date_public_start',
        'start_from',
        'end_to',
        'type',
        'memo',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];

    public function members()
    {
        return $this->belongsToMany(Member::class,'coupon_member','coupon_id', 'members_id')->withTimestamps();
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'id', 'coupon_id', 'id');
    }

}
