<?php

namespace Database\Seeders;

use App\Models\Product_Style;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductStyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product_Style::create([
            'prostyle_name' => 'ถุง'
        ]);
        Product_Style::create([
            'prostyle_name' => 'ถ้วย'
        ]);
        Product_Style::create([
            'prostyle_name' => 'กล่อง'
        ]);
        Product_Style::create([
            'prostyle_name' => 'ขวด'
        ]);
        Product_Style::create([
            'prostyle_name' => 'ชิ้น'
        ]);
    }
}
