<!DOCTYPE html>
<html lang="en">
<head>
    <!-- เรียกใช้ CSS อื่น ๆ ที่คุณใช้ -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            /* background-color: #333; /* สีพื้นหลังของ sidebar */
            /* padding: 2px; */ 
        }

        .list-group-item {
            background-color: #333; /* สีพื้นหลังของรายการเมนู */
            border: none; /* ลบเส้นขอบรายการเมนู */
            margin: 2px 0; /* ระยะห่างระหว่างรายการเมนู */
        }

        .list-group-item a {
            color: #808080; /* เปลี่ยนสีข้อความในรายการเมนูเป็นสีเขียว (#00ff00) */
            font-weight: bold; /* ทำให้ข้อความเป็นตัวหนา */
            text-decoration: none; /* ลบขีดเส้นใต้ข้อความลิงก์ */
            transition: background-color 1s; /* เพิ่มการเปลี่ยนสีพื้นหลังอย่างนุ่มๆ */
            transition: color 0.3s; /* เพิ่มการเปลี่ยนสีพื้นหลังอย่างนุ่มๆ */
        }

        .list-group-item a:hover {
            /* background-color: #808080; สีพื้นหลังเมื่อเมาส์ชี้ไปยังรายการเมนู */
            color: #000000; /* สีข้อความเมื่อเมาส์ชี้ไปยังรายการเมนู */
        }

        .card {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .card-header {
            flex: 1; /* ให้ card-header ยืดเต็มความสูง */
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .profile-image {
            border-radius: 60%;
            width: 200px; /* ปรับขนาดตามที่คุณต้องการ */
            height: 200px; /* ปรับขนาดตามที่คุณต้องการ */
            overflow: hidden;
            margin: 0 auto; /* จัดให้อยู่ตรงกลาง */
        }

        .profile-name {
            text-align: center; /* จัดให้อยู่ตรงกลาง */
        }

        .row {
            justify-content: center;
        }
    </style>
</head>
<body>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- sidebar menu -->
        <!-- <div class="col-md-2">
            <div class="sidebar">
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ route('Home') }}">Dashboard</a></li>
                    <li class="list-group-item"><a href="{{ route('Profile') }}">Profile</a></li>
                    <li class="list-group-item"><a href="{{ route('Mix') }}">Mix</a></li>
                    <li class="list-group-item"><a href="{{ route('Review') }}">Review</a></li>
                </ul>
            </div>
        </div> -->
        <div class="col-md-9">
            <div class="card">
                <!-- <div class="card-header">{{ __('Dashboard') }}</div> -->

                <div class="card-body">
                    <b>HOMEPAGE</b>
                </div>

            </div>

            <div class="card mt-2">
                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="profile-image" style="margin-top: 20px; margin-bottom: 20px;">
            </div>
        </div>
    </div>
</div>
@endsection
