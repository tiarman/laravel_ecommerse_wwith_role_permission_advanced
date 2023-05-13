<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasTags extends Model
{
    use HasFactory;
    protected $table = 'user_has_tags';
    protected $fillable = [
        'product_id',
        'tag_name',
    ];
}
