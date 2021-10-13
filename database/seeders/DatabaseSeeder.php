<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\TwoD;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Admin::create([
        //     'name' => 'Super Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('admin123'),
        // ]);

        TwoD::create([
            'number' => '30',
            'is_close' => true
        ]);
        TwoD::create([
            'number' => '40',
            'is_close' => true
        ]);
        TwoD::create([
            'number' => '50',
            'limit' => '1000',
        ]);
        TwoD::create([
            'number' => '60',
            'limit' => '1000',
        ]);
    }
}
