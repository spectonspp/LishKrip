<?php

namespace Database\Seeders;

use App\Models\Product_Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Product_Type::create([
            'protype_name' => 'อาหาร'
        ]);
        Product_Type::create([
            'protype_name' => 'สิ่งของเครื่องใช้'
        ]);
        Product_Type::create([
              'protype_name' => 'ของหวานและขนม'
        ]);
        Product_Type::create([
            'protype_name' => 'อาหารแห้ง'
        ]);
        Product_Type::create([
            'protype_name' => 'เครื่องดื่ม'
        ]);
    }
}
