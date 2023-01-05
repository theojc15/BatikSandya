<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Admin',
            'username'=>'admin@123',
            'email'=>'admin123@gmail.com',
            'password'=> Hash::make('Admin123'),
            'phone'=>'+62 00000000',
            'DOB'=>'2002-12-13',
            'gender'=>'Male',
            'address'=> "2, Jl. Raya Kb. Jeruk No.27, RT.1/RW.9, Kb. Jeruk, Kec. Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11530",
            'role'=>'Admin'
        ]);
    }
}
