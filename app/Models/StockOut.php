<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockOut extends Model
{
    protected $fillable = ['product_size_id', 'qty', 'date'];

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
