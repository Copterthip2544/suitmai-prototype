<!DOCTYPE html>
<html lang="en">
<head>
    <!-- เรียกใช้ CSS อื่น ๆ ที่คุณใช้ -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #808080; /* Change this to the shade of gray you want */
        }

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
            font-family: 'Times New Roman', serif;
        }

        .small-card {
            width: 275px !important;
            height: 275px !important;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .row {
            justify-content: center;
        }
    </style>
</head>
<body>
    <!-- เนื้อหาเว็บไซต์ -->

    <!-- เรียกใช้ jQuery และ Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- โค้ดของคุณ -->
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
                        <!-- <div class="card-header">{{ __('Profile') }}</div> -->

                        <div class="card-body">
                            <b>PROFILE</b>
                        </div>
                    </div>

                    <div class="card mt-2">
                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="profile-image" style="margin-top: 20px; margin-bottom: 10px;">
                        <h1 class="profile-name">{{ Auth::user()->name }}</h1>
                        <p>{{ Auth::user()->bio }}</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editAvatarModal" style="margin-bottom: 20px;">แก้ไขโปรไฟล์</a>
                    </div>

                    <div class="card mt-2">
                        <div class="card-body">
                        <div class="row">
                                <div class="col-md-4">
                                    <!-- Card ทางซ้าย -->
                                    <div class="card mb-2 small-card text-center">
                                        <div class="card-body d-flex justify-content-center">
                                            ซ้าย
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <!-- Card กลาง -->
                                    <div class="card mb-2 small-card text-center">
                                        <div class="card-body d-flex justify-content-center">
                                            กลาง
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <!-- Card ทางขวา -->
                                    <div class="card mb-2 small-card text-center">
                                        <div class="card-body d-flex justify-content-center">
                                            ขวา
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    <!-- Modal -->
    <div class="modal fade" id="editAvatarModal" tabindex="-1" role="dialog" aria-labelledby="editAvatarModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAvatarModalLabel">แก้ไขโปรไฟล์ของคุณ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('upload-avatar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for "avatar">เลือกรูปภาพโปรไฟล์ใหม่</label>
                            <input type="file" class="form-control-file" name="avatar" id="avatar">
                        </div>
                        <button type="submit" class="btn btn-primary">บันทึกรูปภาพโปรไฟล์</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript ที่รวมโทเคน CSRF -->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
    </script>
</body>
</html>