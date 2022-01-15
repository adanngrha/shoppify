<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
                'name' => 'Laptops',
            ],
            [
                'name' => 'Accessories',
            ],
            [
                'name' => 'Cosmetics',
            ],
        ])->each(function ($category) {
            Category::create($category);
        });
    }
}
