<!DOCTYPE html>
<html lang="en">
<head>
    <!-- เรียกใช้ CSS อื่น ๆ ที่คุณใช้ -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- เรียกใช้ jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- เรียกใช้ Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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

        .btn-delete {
            background-color: #dc3545; /* สีพื้นหลังของปุ่มลบ */
            color: #fff; /* สีข้อความของปุ่มลบ */
        }

        .btn-delete:hover {
            background-color: #c82333; /* สีพื้นหลังเมื่อเมาส์ชี้ไปยังปุ่มลบ */
            color: #fff; /* สีข้อความเมื่อเมาส์ชี้ไปยังปุ่มลบ */
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
                    <b>USER MANAGEMENT</b>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <!-- Add a confirmation dialog before deleting -->
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger btn-delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

</body>
</html>
