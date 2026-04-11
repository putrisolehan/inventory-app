<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockOut extends Model
{
    protected $fillable = ['product_size_id', 'qty', 'date'];

    public function productSize() {
        return $this->belongsTo(ProductSize::class);
    }
}
