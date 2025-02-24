<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function subCategory() {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }

    public function childCategory() {
        return $this->belongsTo(ChildCategory::class, 'childcategory_id');
    }
}
