<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\PaymentMethod;
use App\Models\Shipment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $paid_date = $this->faker->date;
        $date = new Carbon($paid_date);
        $ship_date = $date->addDays(2);
        $status = ['IN PROCESS','ON DELIVERY','ARRIVED'];
        return [
            'customer_id' => rand(1,Customer::count()),
            'payment_method_id' => rand(1,PaymentMethod::count()),
            'shipment_id' => rand(1,Shipment::count()),
            'paid_date' => $paid_date,
            'ship_date' => $ship_date,
            'status' => $status[rand(0,2)],
        ];
    }
}
