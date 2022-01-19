<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
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
                'id' => 1,
                'courier_id' => 1,
                'name' => 'JNE Cepat',
                'fee' => 20000,
            ],
            [
                'id' => 2,
                'courier_id' => 2,
                'name' => 'J&T Fast',
                'fee' => 15000,
            ],
        ])->each(function($service){
            Service::create($service);
        });
    }
}
