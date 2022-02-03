<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ShippingAddress extends Model
{
    use HasFactory;

    protected $table = 'shipping_addresses';

    protected $primaryKey = 'id';

    protected $fillable = [
        'country',
        'address',
        'postal_code',
        'apartment_number',
        'building',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
