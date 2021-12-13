<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


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
        DB::table('users')->insert([
            'role' => '1',
            'first_name' => 'Hanife',
            'last_name' => 'Waller',
            'street' => '108 M. Almeda Street',
            'city' => 'Pateros',
            'province' => 'Metro Manila',
            'zip_code' => '1620',
            'phone_no' => '(632) 848-5062',
            'email' => 'ccsi153prodigysale@gmail.com',
            'password' => Hash::make('admin'),
        ]);
        DB::table('users')->insert([
            'role' => '2',
            'first_name' => 'Kouta',
            'last_name' => 'Yūto',
            'street' => 'Citibank Tower, 8741 Paseo de Roxas',
            'city' => 'Ncr',
            'province' => 'Makati City',
            'zip_code' => '1224',
            'phone_no' => '09614368923',
            'email' => 'coc1andrey@gmail.com',
            'password' => Hash::make('cashier'),
        ]);
        DB::table('users')->insert([
            'role' => '3',
            'first_name' => 'Youta',
            'last_name' => 'Soo-Jin',
            'street' => '600 Boni Avenue',
            'city' => 'Mandaluyong City',
            'province' => 'Metro Manila',
            'zip_code' => '1550',
            'phone_no' => '+63(2)5334824',
            'email' => 'coc4andrey@gmail.com',
            'password' => Hash::make('inventory'),
        ]);
        DB::table('users')->insert([
            'role' => '3',
            'first_name' => 'Juan',
            'last_name' => 'Cruz',
            'street' => 'Magsaysay, Villena Street',
            'city' => 'Cadiz',
            'province' => 'Negros Occidental',
            'zip_code' => '11001',
            'phone_no' => '(034) 493-0311',
            'email' => 'coc6andrey@gmail.com',
            'password' => Hash::make('inventory'),
        ]);
        DB::table('users')->insert([
            'role' => '2',
            'first_name' => 'Youko',
            'last_name' => 'Riku',
            'street' => 'J. Catolico Avenue',
            'city' => 'General Santos',
            'province' => ' South Cotabato',
            'zip_code' => '9500',
            'phone_no' => '(083) 813-7015',
            'email' => 'coc5andrey@gmail.com',
            'password' => Hash::make('cashier'),
        ]);
        DB::table('users')->insert([
            'role' => '2',
            'first_name' => 'Ji-Hun',
            'last_name' => 'Kiku',
            'street' => 'National Highway, Gurdiel Building',
            'city' => 'Barangay Uno',
            'province' => 'Katipunan',
            'zip_code' => '1300',
            'phone_no' => '(065) 416-6145',
            'email' => 'coc7andrey@gmail.com',
            'password' => Hash::make('inventory'),
        ]);


        // ==============================================================================
        //  Product sample data

        DB::table('products')->insert([
            'code' => '112231',
            'product_name' =>'Realme 8 Pro',
            'price' => '7500',
            'quantity' => '25',
            'vat' => '1',
            'product_description' => 'Realme 8 Pro is the successor to the Realme 7 Pro and gets a bold design. It is slimmer than its predecessor and comes in flashy colours.',
            'photo' => 'images/realme-8-Pro.jpg'
        ]);
        DB::table('products')->insert([
            'code' => '112232',
            'product_name' =>'Oppo A54',
            'price' => '9000',
            'quantity' => '25',
            'vat' => '1',
            'product_description' => 'Oppo A54 mobile was launched on 26th March 2021. The phone comes with a 6.51-inch touchscreen display with a resolution of 720x1600 pixels at a pixel density of 268 pixels per inch (ppi). It comes with 4GB of RAM.',
            'photo' => 'images/oppo-a54-.jpg'
        ]);
        DB::table('products')->insert([
            'code' => '112233',
            'product_name' =>'Samsung Galaxy A12',
            'price' => '7500',
            'quantity' => '30',
            'vat' => '1',
            'product_description' => 'Samsung Galaxy A12 mobile was launched on 24th November 2020. The phone comes with a 6.50-inch touchscreen display with a resolution of 720x1600 pixels and an aspect ratio of 20:9.',
            'photo' => 'images/GALAXY-A12.png'
        ]);
        DB::table('products')->insert([
            'code' => '112234',
            'product_name' =>'HP Pavilion 15-eh',
            'price' => '50000',
            'quantity' => '16',
            'vat' => '1',
            'product_description' => 'HP Pavilion 15-eg0103TX is a Windows 10 Home laptop with a 15.60-inch display that has a resolution of 1920x1080 pixels. It is powered by a Core i5 processor and it comes with 16GB of RAM. The HP Pavilion 15-eg0103TX packs 512GB of SSD storage.',
            'photo' => 'images/hp-pavilion-eh.jpg'
        ]);
        DB::table('products')->insert([
            'code' => '112235',
            'product_name' =>'Acer Aspire 5',
            'price' => '30000',
            'quantity' => '10',
            'vat' => '1',
            'product_description' => 'Acer Aspire 5 A514-54G is a Windows 10 Home laptop with a 14.00-inch display that has a resolution of 1920x1080 pixels. It is powered by a Core i7 processor and it comes with 16GB of RAM.',
            'photo' => 'images/Acer-Aspire-5.jpg'
        ]);
    }
}
