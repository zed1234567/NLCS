<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    protected $guarded = [];
    public function products(){
        return $this->hasMany(Product::class);
    }
}
