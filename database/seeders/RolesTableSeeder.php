<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // เติมข้อมูลลงในตาราง roles
        DB::table('roles')->insert([
            'name' => 'Admin',
            'description' => 'Administrator role',
        ]);

        DB::table('roles')->insert([
            'name' => 'User',
            'description' => 'Regular user role',
        ]);

        // เพิ่มข้อมูลอื่น ๆ ตามความต้องการ
    }
}
