<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $guarded = ['id'];

    public function product_images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function carts()
    {
        return $this->belongsTo(Cart::class, 'product_id');
    }

}
