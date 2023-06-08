<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'qty',
        'discount',
        'subtotal',
        'grandtotal',
        'ship_date',
        'title',
        'rating',
        'content',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
