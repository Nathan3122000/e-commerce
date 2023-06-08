<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'birthdate',
        'gender',
        'phone_number',
        'address',
        'province',
        'city',
        'postalcode',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
