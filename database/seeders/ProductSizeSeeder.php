<?php

namespace Database\Seeders;

use App\Models\Product_Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product_Size::create([
            'prosize_name' => 'เล็ก'
        ]);
        Product_Size::create([
            'prosize_name' => 'กลาง'
        ]);
        Product_Size::create([
            'prosize_name' => 'ใหญ่'
        ]);
    }
}
