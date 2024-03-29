<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role_id === 1) {
            return $next($request);
        }

        // หากไม่ใช่ Admin ให้เปลี่ยนเส้นทางไปหน้าอื่นหรือแสดงข้อความข้อผิดพลาด
        return redirect('/admin'); 
    }

}
