<?php

namespace App\Models;

use App\Models\Order;
use App\Models\ProductDescription;
use App\Models\ProductFunction;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'title',
        'price',
        'picture_path',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function productDescription()
    {
        return $this->hasOne(ProductDescription::class);
    }

    public function productFunction()
    {
        return $this->hasOne(ProductFunction::class);
    }

    public function stock()
    {
        return $this->hasOne(Stock::class);
    }

}
