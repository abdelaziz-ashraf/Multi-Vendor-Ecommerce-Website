<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function variantItems()
    {
        return $this->hasMany(ProductVariantItem::class, 'variant_id');
    }
}
