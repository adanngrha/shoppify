<?php

namespace Database\Seeders;

use App\Models\Courier;
use Illuminate\Database\Seeder;

class CourierSeeder extends Seeder
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
                'name' => 'JNE'
            ],
            [
                'name' => 'J&T'
            ],
            [
                'name' => 'SiCepat'
            ],
        ])->each(function ($courier) {
            Courier::create($courier);
        });
    }
}
