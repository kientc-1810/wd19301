<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // tạo 10 bản ghi
        // tạo ra 1 mảng chứa tất cả id của bảng categories
        $categoryID = DB::table('categories')->pluck('id')->toArray();

        $proSeed = [];
        for($i=0;$i<10;$i++){
            $proSeed[]=[
                'name'=>fake()->name(),
                'price'=>fake()->randomNumber(),
                'quantity'=>fake()->randomNumber(),
                'image'=>fake()->image(),
                'category_id'=>fake()->randomElement($categoryID),
                'status'=>fake()->numberBetween(0,1),
            ];
        }
        DB::table('products')->insert($proSeed);
    }
}
