<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Style extends Model
{
    use HasFactory;
    protected $table = 'product_styles';
    protected $fillable = [
        'prostyle_id',
        'prostyle_name'
    ];
    public $timestamps = false;
}
