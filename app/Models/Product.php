<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable
                       = [
            'title', 'sku', 'description',
        ];
    protected $appends = ['time'];

    public function getTimeAttribute()
    {
        return $this->created_at->diffForHumans();
    }


    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function productVariants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function productVariantPrices(): HasMany
    {
        return $this->hasMany(ProductVariantPrice::class)->with(['variantOne:id,variant', 'variantTwo:id,variant', 'variantThree:id,variant']);
    }


}
