<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table = 'coupons';
    protected $fillable = [
        'coupon_code',
        'valid_date',
        'type',
        'coupon_amount',
        'status',

    ];

    public static $statusArrays = ['active', 'inactive'];

    public static $typeArrays = ['fixed', 'percentage'];
}
