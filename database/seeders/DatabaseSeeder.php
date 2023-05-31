<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DeliveryType;
use App\Models\Product;
use App\Models\User;
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

        // \App\Models\User::factory()->create([
        //     'nama' => 'Admin',
        //     'email' => 'admin@mail.com',
        //     'role' => 1,
        //     'password' => Hash::make('admin123'),
        // ]);
        User::create([
            'nama' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@mail.com',
            'role' => '1',
            'password' => Hash::make('admin123'),
        ]);

        User::create([
            'nama' => 'alifa',
            'username' => 'alifa1',
            'email' => 'alifa@mail.com',
            'password' => Hash::make('alifa123'),
            'no_telp' => '081806178888'
        ]);
        Product::create([
            'productName' => 'Cup 12oz Flat 6,5 gram',
            'price' => '340'
        ]);
        Product::create([
            'productName' => 'Cup 12oz Flat 7 gram',
            'price' => '350'
        ]);
        Product::create([
            'productName' => 'Cup 14oz Flat',
            'price' => '350'
        ]);
        Product::create([
            'productName' => 'Cup 14oz Oval',
            'price' => '405'
        ]);
        Product::create([
            'productName' => 'Cup 16oz Flat',
            'price' => '350'
        ]);
        Product::create([
            'productName' => 'Cup 16oz Oval',
            'price' => '405'
        ]);
        Product::create([
            'productName' => 'Cup 22oz Flat',
            'price' => '475'
        ]);
        Product::create([
            'productName' => 'Cup 22oz Oval',
            'price' => '475'
        ]);
        Product::create([
            'productName' => 'Tutup Flat',
            'price' => '230'
        ]);
        Product::create([
            'productName' => 'Tutup Dome',
            'price' => '230'
        ]);
        DeliveryType::create([
            'type' => 'Pickup'
        ]);
        DeliveryType::create([
            'type' => 'Diantar'
        ]);
    }
}
