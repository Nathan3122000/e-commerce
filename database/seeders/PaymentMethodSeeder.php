<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['payment_method'=>'OVO'],
            ['payment_method'=>'VIRTUAL ACCOUNT BCA'],
            ['payment_method'=>'DEBIT BCA'],
            ['payment_method'=>'ALFAMART'],
            ['payment_method'=>'INDOMARET'],
            ['payment_method'=>'CREDIT CARD MANDIRI'],
            ['payment_method'=>'VIRTUAL ACCOUNT MANDIRI'],
            ['payment_method'=>'GOPAY'],
            ['payment_method'=>'DEBIT MANDIRI'],
            ['payment_method'=>'CREDIT CARD BCA'],
        ];

        PaymentMethod::insert($data);
    }
}
