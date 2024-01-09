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
                        <b>Admin Dashboard</b>
                    </div>
                </div>

                <div class="card mt-2">
                    <div class="card-body">
                        <button id="addRecommendBtn" class="btn btn-primary">Add Recommend Menu</button>
                    </div>
                </div>

                <!-- Add Recommend Modal -->
                <div class="modal" id="addRecommendModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Recommend Menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form for adding recommend menu -->
                                <form id="addRecommendForm">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="name">Menu Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Menu Description:</label>
                                        <textarea class="form-control" id="description" name="description" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Menu</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Your existing scripts go here

            // Submit form when modal is shown
            $('#addRecommendModal').on('shown.bs.modal', function () {
                $('#addRecommendForm').submit(function (e) {
                    e.preventDefault();

                    // Perform Ajax request to add recommend menu to the database
                    $.ajax({
                        url: '{{ route("addRecommend") }}',
                        type: 'POST',
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            console.log('Recommend menu added successfully:', response);

                            // Add additional actions here if needed

                            // Example: Reload the page after successful addition
                            location.reload();
                        },
                        error: function (error) {
                            console.error('Error adding recommend menu', error);

                            // Add additional error handling here if needed
                        }
                    });
                });
            });

            // Clear form when modal is hidden
            $('#addRecommendModal').on('hidden.bs.modal', function () {
                $('#addRecommendForm')[0].reset();
            });
        });
    </script>
@endsection

</body>
</html>