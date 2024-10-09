<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $user_admin = User::factory()->create([
            'email' => 'allan.bernier1@gmail.com',
            'password' => Hash::make('00000000')
        ]);
        $user_admin->role = "admin";
        $user_admin->save();

        $user = User::factory()->create([
            'email' => 'allan.bernier@gmail.com',
            'password' => Hash::make('00000000')
        ]);



        Product::factory(200)->create();
        Order::factory(10)->create();

    }
}
