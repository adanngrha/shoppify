<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => 'BCA',
                'account_number' => '170819452021',
            ],
            [
                'name' => 'BNI',
                'account_number' => '7675170819452021',
            ],
            [
                'name' => 'Mandiri',
                'account_number' => '103000170819452021',
            ],
            [
                'name' => 'DANA',
                'account_number' => '170819452021',
            ],
            [
                'name' => 'GOPAY',
                'account_number' => '170819452021',
            ],
            [
                'name' => 'OVO',
                'account_number' => '170819452021',
            ],
        ])->each(function($payment_methods){
            PaymentMethod::create($payment_methods);
        });
    }
}
