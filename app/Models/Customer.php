<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\BillingAddress;
use App\Models\ShippingAddress;
use App\Models\OrderHistory;
use App\Models\CustomerPayment;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'mobile_phone',
        'home_phone',
        'ip',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function billingAddress()
    {
        return $this->hasOne(BillingAddress::class);
    }

    public function shippingAddress()
    {
        return $this->hasOne(ShippingAddress::class);
    }

    public function orderHistory()
    {
        return $this->hasOne(orderHistory::class);
    }

    public function customerPayment()
    {
        return $this->hasMany(CustomerPayment::class);
    }

}
