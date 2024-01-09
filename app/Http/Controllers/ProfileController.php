<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Profile');
    }

    public function uploadAvatar(Request $request)
    {
        // ตรวจสอบและบันทึกรูปภาพโปรไฟล์
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $path = $avatar->store('avatars', 'public');

            // บันทึกรูปภาพในฐานข้อมูลหรือในตาราง User
            $user = Auth::user();
            $user->avatar = $path;
            $user->save();

            return redirect()->back()->with('success', 'อัปโหลดรูปภาพโปรไฟล์สำเร็จ');
        }

        return redirect()->back()->with('error', 'ไม่พบรูปภาพที่อัปโหลด');
    }


}
