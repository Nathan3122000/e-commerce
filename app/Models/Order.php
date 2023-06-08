<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'customer_id',
        'payment_method_id',
        'shipment_id',
        'paid_date',
        'ship_date',
        'status',
        'note',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }

    public function orders()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
