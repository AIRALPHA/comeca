<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [

    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function images() {
        return $this->belongsToMany(Image::class, 'product_image');
    }

    public function raitings() {
        return $this->hasMany(Raiting::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
