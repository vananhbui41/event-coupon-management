<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
        'code',
        'ronline_coupon_code',
        'title',
        'name',
        'summary',
        'image',
        'public_date',
        'start_time',
        'end_time',
        'type',
        'memo',
        'deleted_at'];

    public function members() {
        return $this->belongsToMany(Member::class);
    }
}
