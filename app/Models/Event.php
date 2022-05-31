<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Coupon;
use App\Models\Shop;
use App\Models\Member;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'events';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'event_code',
        'title',
        'name',
        'summary',
        'image',
        'date_public_start',
        'order_keyword',
        'checked_keyword',
        'keyword',
        'keyword_text',
        'order_question',
        'checked_question',
        'question_text',
        'question_type',
        'answer_1',
        'answer_2',
        'answer_3',
        'order_comment',
        'checked_comment',
        'comment_text',
        'order_checkin',
        'checkin_at',
        'name_address',
        'zip_code',
        'detail_address',
        'message',
        'incentive',
        'point',
        'coupon_id',
        'memo',
    ];

    public $timestamps = true;
    protected $dates = ['deleted_at'];

    public function members()
    {
        return $this->belongsToMany(Member::class, 'event_member', 'event_id', 'members_id')->withTimestamps();
    }

    public function shops()
    {
        return $this->belongsToMany(Shop::class, 'event_shop', 'event_id', 'shop_id')->withTimestamps();
    }

    public function coupon() {
        return $this->belongsTo(Event::class, 'coupon_id', 'id');
    }
}
