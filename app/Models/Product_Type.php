<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Type extends Model
{
    use HasFactory;
    protected $table = 'product_types';
    protected $fillable = [
        'protype_id',
        'protype_name'
    ];
    public $timestamps = false;
}
