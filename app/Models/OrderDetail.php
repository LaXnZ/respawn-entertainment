<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'image', 'product_name', 'product_price', 'quantity', 'total',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}