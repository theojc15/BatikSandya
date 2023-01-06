<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Lanyard', 'Kemeja'];
        for ($i = 0; $i < 2;$i++) {
            DB::table('categories')->insert([
                'name'=>$categories[$i]
            ]);
        }

    }
}
