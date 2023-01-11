<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'category_id'=>1,
            'name'=>'Lanyard misc',
            'detail'=>'Lanyard bermotif misc',
            'price'=>20000,
            'photo'=>'Lanyard - Misc.png',
            'stok'=>10,
            'tokopedia_link'=>'https://www.tokopedia.com/',
            'shopee_link'=>'https://shopee.co.id/'
        ]);

        DB::table('products')->insert([
            'category_id'=>1,
            'name'=>'Lanyard Yogyakarta - Kawung',
            'detail'=>'Lanyard bermotif Yogyakarta - Kawung',
            'price'=>20000,
            'photo'=>'Lanyard - Yogyakarta - Kawung.png',
            'stok'=>10,
            'tokopedia_link'=>'https://www.tokopedia.com/',
            'shopee_link'=>'https://shopee.co.id/'
        ]);

        DB::table('products')->insert([
            'category_id'=>1,
            'name'=>'Lanyard - Pekalongan - Terang Bulan',
            'detail'=>'Lanyard bermotif Pekalongan - Terang Bulan',
            'price'=>20000,
            'photo'=>'Lanyard - Pekalongan - Terang Bulan.png',
            'stok'=>10,
            'tokopedia_link'=>'https://www.tokopedia.com/',
            'shopee_link'=>'https://shopee.co.id/'
        ]);
    }
}
