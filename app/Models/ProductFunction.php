<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFunction extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'product_id',
        'first_title',
        'first_function',
        'second_title',
        'second_function',
        'third_title',
        'third_function',
        'characteristics',
    ];

}
