<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Size extends Model
{
    use HasFactory;
    protected $table = 'product_sizes';
    protected $fillable = [
        'prosize_id',
        'prosize_name'
    ];
    public $timestamps = false;
}
