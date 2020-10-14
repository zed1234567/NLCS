<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    //
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function group()
    {
        return $this->beLongsTo(Group::class);
    }

    public function brand()
    {
        return $this->beLongsTo(Brand::class);
    }
}
