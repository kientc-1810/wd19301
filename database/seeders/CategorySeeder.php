<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // tạo lần lượt các bản ghi đưa vào bảng
        // DB::table('categories')->insert([
        //     'name' => fake() -> name(), // dùng fake để tạo dữ liệu ngẫu nhiên
        //     //'name' => 'kientc', // chỉ định dữ liệu theo mong muốn
        //     'status' => fake() -> numberBetween(0,1),
        // ]);

        // cách 2: tạo nhiều bản ghi cùng lúc
        // tạo mảng rỗng để chứa các bản ghi fake
        $cateSeed = [];
        for($i=0;$i<10;$i++){
            $cateSeed[] = [
                'name' =>fake() ->name(),
                'status' =>fake() ->numberBetween(0,1),
            ];
        }
        DB::table('categories')->insert($cateSeed);
    }
}
