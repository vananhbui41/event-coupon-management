<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Event;
use App\Models\Coupon;

class Member extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'members';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'cam_member_id',
        'name',
        'email',
        'cam_member_password',
        'ronline_member_id',
        'nickname',
        'ronline_member_password',
        'activate_flag',
        'access_token',
        'add_family_point',
        'deleted_at',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'members_id', 'event_id')->withTimestamps();
    }

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class, 'coupon_member', 'coupon_id', 'members_id')->withTimestamps();
    }
}
