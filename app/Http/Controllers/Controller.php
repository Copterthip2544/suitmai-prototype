<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard()
    {
        if (auth()->user()->role === 'admin') {
            // ดำเนินการสำหรับ admin
        } elseif (auth()->user()->role === 'user') {
            // ดำเนินการสำหรับ user
        }
    }

}
