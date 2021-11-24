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
            'street' => 'A. Bonifacio Street',
            'city' => 'Baybay City',
            'province' => 'Leyte',
            'zip_code' => '6521',
            'phone_no' => '09614357523',
            'email' => 'ccsi153prodigysale@gmail.com',
            'password' => Hash::make('admin'),
        ]);
        DB::table('users')->insert([
            'role' => '2',
            'first_name' => 'Juan',
            'last_name' => 'Cruz',
            'street' => 'A. Bonifacio Street',
            'city' => 'Baybay City',
            'province' => 'Leyte',
            'zip_code' => '6521',
            'phone_no' => '09614357523',
            'email' => 'coc1andrey@gmail.com',
            'password' => Hash::make('cashier'),
        ]);
        DB::table('users')->insert([
            'role' => '3',
            'first_name' => 'Juan',
            'last_name' => 'Cruz',
            'street' => 'A. Bonifacio Street',
            'city' => 'Baybay City',
            'province' => 'Leyte',
            'zip_code' => '6521',
            'phone_no' => '09614357523',
            'email' => 'coc2andrey@gmail.com',
            'password' => Hash::make('inventory'),
        ]);

    }
}
