<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'product_name',
        'color',
        'size',
        'price',
        'description',
        'stock',
        'sold_count',
        'weight',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
