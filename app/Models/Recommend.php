<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    use HasFactory;

    protected $table = 'recommends'; // ชื่อตารางในฐานข้อมูล

    protected $fillable = ['taste', 'photo']; // ฟิลด์ที่สามารถใส่ค่าได้
}
