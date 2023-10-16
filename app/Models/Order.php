<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'order_id';
    public const STATUS = ['in progress', 'approve', 'reject', 'cancel'];
    protected $table = 'orders';
    protected $fillable = [
        'user_id', 'order_no', 'address', 'tel', 'delivery_fee', 'status', 'slip'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'order_id');
    }
    private function generateOrderNo() {
        $lastOrder = Order::whereYear('created_at', date('Y'))->orderBy('order_no', 'DESC')->first();
        if ($lastOrder) {
            $last_no = intval(explode('-', $lastOrder->order_no)[1]) + 1;
            $orderNo = date('Ymd')."-".str_pad($last_no,5,0,STR_PAD_LEFT);
        } else {
            $orderNo = date('Ymd')."-".str_pad('1',5,0,STR_PAD_LEFT);
        }
        return $orderNo;
    }

    public static function boot() {
        parent::boot();
        static::creating(function($model) {
            $model->order_no = $model->generateOrderNo();
        });
    }

    // public function update(Request $request, Product $product)
    // {
    //     if ($request->file('product_image')) {
    //         $destinationPath = 'images';
    //         $file = $request->file('product_image');
    //         $typeFile = $file->getClientOriginalExtension();
    //         $filename =  $product->product_id . '-00.' . $typeFile;
    //         $file->move($destinationPath, $filename);

    //     }
    //     return redirect()->route('product.index');
    // }
}
