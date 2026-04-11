<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'supplier_id',
        'price',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }

    public function sizes() {
        return $this->hasMany(ProductSize::class);
    }

    public function stockIns() {
        return $this->hasMany(StockIn::class);
    }
}
