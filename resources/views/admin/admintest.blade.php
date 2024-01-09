<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        .sidebar {
            /* background-color: #333; /* สีพื้นหลังของ sidebar */
            /* padding: 2px; */
        }

        .list-group-item {
            /* background-color: #333; /* สีพื้นหลังของรายการเมนู */
            /* border: none; /* ลบเส้นขอบรายการเมนู */
            /* margin: 2px 0; /* ระยะห่างระหว่างรายการเมนู */
        }

        .list-group-item a {
            /* color: #808080; /* เปลี่ยนสีข้อความในรายการเมนูเป็นสีเขียว (#00ff00) */
            /* font-weight: bold; /* ทำให้ข้อความเป็นตัวหนา */
            /* text-decoration: none; /* ลบขีดเส้นใต้ข้อความลิงก์ */
            /* transition: background-color 1s; /* เพิ่มการเปลี่ยนสีพื้นหลังอย่างนุ่มๆ */
            /* transition: color 0.3s; /* เพิ่มการเปลี่ยนสีพื้นหลังอย่างนุ่มๆ */
        }

        .list-group-item a:hover {
            /* background-color: #808080; สีพื้นหลังเมื่อเมาส์ชี้ไปยังรายการเมนู */
            /* color: #000000; /* สีข้อความเมื่อเมาส์ชี้ไปยังรายการเมนู */
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
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <b>DASHBOARD ADMIN</b>
                </div>
            </div>
        </div>
    </div>

    @yield('ingredients_content')
</div>
@endsection

@section('ingredients_content')
    <div class="container">
        <h1>Ingredients</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Amount</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ingredients as $ingredient)
                    <tr>
                        <td>{{ $ingredient->name }}</td>
                        <td>
                            <img src="{{ $ingredient->photo_url }}" alt="{{ $ingredient->name }}" class="profile-image">
                        </td>
                        <td>{{ $ingredient->amount }}</td>
                        <td>{{ $ingredient->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

</body>
</html>