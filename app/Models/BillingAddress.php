<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class BillingAddress extends Model
{
    use HasFactory;

    protected $table = 'billing_addresses';

    protected $primaryKey = 'billing_address_id';

    protected $fillable = [
        'country',
        'address',
        'postal_code',
        'apartment_number',
        'building',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
