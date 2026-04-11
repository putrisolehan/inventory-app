<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockIn extends Model
{
    protected $fillable = [
        'product_id',
        'product_size_id',
        'supplier_id',
        'qty',
        'date'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function productSize() {
        return $this->belongsTo(ProductSize::class);
    }

    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }
}
