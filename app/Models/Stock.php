<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Stock extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'product_id',
        'available_product_amount',
        'product_in_shopping_cart',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
