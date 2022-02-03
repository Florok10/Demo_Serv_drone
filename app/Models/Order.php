<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'first_name',
        'country',
        'address',
        'postal_code',
        'apartment_number',
        'building',
        'status',
        'total_price',
        'done_at',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getProductsInCart()
    {
        $products = [];
        $product = ['id', 'qty'];

        foreach(Cart::content() as $item)
        {
            $product['id'] = $item->id;
            $product['qty'] = $item->qty;
            $products[] = $product;
        }

        return $products;

        /**
         * @return 2D array with id key and quantity key for each product
         */
    }
}
