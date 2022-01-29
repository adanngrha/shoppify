<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'username' => 'admin',
                'email' => 'admin@test.test',
                'password' => Hash::make('admin123'),
            ],
        ])->each(function ($users) {
            $user = User::create($users);
            $user->id === 1 ? $user->assignRole('admin') : '';
        });
    }
}
