<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // เติมข้อมูลลงในตาราง users
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role_id' => 1, // 1 คือ ID ของบทบาท "Admin" จากตาราง roles
        ]);
        
        DB::table('users')->insert([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role_id' => 2, // 2 คือ ID ของบทบาท "User" จากตาราง roles
        ]);

        // เพิ่มข้อมูลอื่น ๆ ตามความต้องการ
    }
}
