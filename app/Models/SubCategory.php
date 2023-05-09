<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_categories';
    protected $fillable = [
        'category_id',
        'subcategory_name',
        'subcategory_slug',
        'status',

    ];

    public static $statusArrays = ['active', 'inactive'];

    public function category()
    {
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }
}
