<?php

namespace Database\Seeders;

use App\Models\Product_Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'fname' => 'Test',
            'lname' => 'Ttt',
            'username' => 'ricin1',
            'email' => 'admin@itec.com',
            'password' => Hash::make('123456789'),
            'address' => 'djfhgdjuiosf',
            'tel' => '0211588888',
            'status' => '1',
            'role' => 'ADMIN',
            'product_interest' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
