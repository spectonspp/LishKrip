<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';
    protected $table = 'products';
    protected $fillable = [
        'product_id',
        'product_name',
        'product_productiondate',
        'product_expirationdate',
        'product_costprice',
        'product_quantity',
        'product_image',
        'product_desc',
        'prosize_id',
        'prostyle_id',
        'protype_id'
    ];
    public $timestamps = false;
}
