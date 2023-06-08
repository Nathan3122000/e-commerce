<?php

namespace Database\Seeders;

use App\Models\Shipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['company_name'=>'JNE', 'shipper_phone_number'=>'81234567890'],
            ['company_name'=>'Paxel', 'shipper_phone_number'=>'81345678912'],
            ['company_name'=>'Gojek', 'shipper_phone_number'=>'81456789023'],
            ['company_name'=>'Grab', 'shipper_phone_number'=>'81567890134'],
            ['company_name'=>'Tiki', 'shipper_phone_number'=>'81678901245'],
            ['company_name'=>'JNT', 'shipper_phone_number'=>'81789012356'],
            ['company_name'=>'Post Indonesia', 'shipper_phone_number'=>'81890123467'],
            ['company_name'=>'Si Cepat', 'shipper_phone_number'=>'81901234578'],
            ['company_name'=>'Lion parcel', 'shipper_phone_number'=>'81012345689'],
            ['company_name'=>'Wahana', 'shipper_phone_number'=>'81123456790'],
            ['company_name'=>'Anter aja', 'shipper_phone_number'=>'81234567801'],
            ['company_name'=>'Ninja Express', 'shipper_phone_number'=>'81345678912'],
        ];

        Shipment::insert($data);
    }
}
