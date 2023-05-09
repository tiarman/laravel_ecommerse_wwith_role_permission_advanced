<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
    use HasFactory;
    protected $table = 'child_categories';
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'childcategory_name',
        'childcategory_slug',
        'status',

    ];

    public static $statusArrays = ['active', 'inactive'];

    public function category()
    {
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }

    public function subcategory()
    {
        return $this->hasOne(SubCategory::class, 'id', 'subcategory_id');
    }
}
