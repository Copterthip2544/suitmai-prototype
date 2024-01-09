<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // ต้องแนะนำโมเดล User ของคุณ

class UserManageController extends Controller
{
    public function index()
    {
        $users = User::all(); // ดึงข้อมูลผู้ใช้ทั้งหมดจากฐานข้อมูล

        return view('admin.usermanage', compact('users'));
    }
}
