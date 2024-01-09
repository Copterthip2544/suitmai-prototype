<!DOCTYPE html>
<html lang="en">
<head>
    <!-- เรียกใช้ CSS อื่น ๆ ที่คุณใช้ -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- เรียกใช้ jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- เรียกใช้ Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- เพิ่ม CSRF token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                    <b>เพิ่มข้อมูลภายในระบบ</b>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-body">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addRecommendModal">เพิ่มเมนูแนะนำ</button>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-body">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addIngredientModal">เพิ่มวัตถุดิบ</button>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-body">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addEquipmentModal">เพิ่มอุปกรณ์</button>
                </div>
            </div>

            
        </div>
    </div>
</div>
@endsection

<div class="modal fade" id="addIngredientModal" tabindex="-1" role="dialog" aria-labelledby="addIngredientModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addIngredientModalLabel">เพิ่มวัตถุดิบ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addIngredientForm" enctype="multipart/form-data"> <!-- เพิ่ม enctype="multipart/form-data" เพื่อรองรับอัปโหลดไฟล์ -->
                    <div class="form-group">
                        <label for="ingredientName">ชื่อวัตถุดิบ</label>
                        <input type="text" class="form-control" id="ingredientName" name="ingredientName">
                    </div>
                    <div class="form-group">
                        <label for="price">ราคาต่อมิลลิลิตร</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                    <div class="form-group">
                        <label for="image">รูปภาพ</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    
                    <button type="submit" class="btn btn-primary" id="addIngredientBtn">ยืนยัน</button>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addRecommendModal" tabindex="-1" role="dialog" aria-labelledby="addRecommendModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRecommendModalLabel">เพิ่มเมนูแนะนำ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addRecommendForm" enctype="multipart/form-data"> <!-- เพิ่ม enctype="multipart/form-data" เพื่อรองรับอัปโหลดไฟล์ -->
                    <div class="form-group">
                        <label for="recommendName">รสชาติ</label>
                        <input type="text" class="form-control" id="recommendName" name="recommendName">
                    </div>
                    <div class="form-group">
                        <label for="image">รูปภาพ</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    
                    <button type="submit" class="btn btn-primary" id="addRecommendBtn">ยืนยัน</button>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addEquipmentModal" tabindex="-1" role="dialog" aria-labelledby="addEquipmentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEquipmentModalLabel">เพิ่มอุปกรณ์</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addEquipmentForm" enctype="multipart/form-data"> <!-- เพิ่ม enctype="multipart/form-data" เพื่อรองรับอัปโหลดไฟล์ -->
                    <div class="form-group">
                        <label for="equipmentName">ชื่ออุปกรณ์</label>
                        <input type="text" class="form-control" id="equipmentName" name="equipmentName">
                    </div>
                    <div class="form-group">
                        <label for="image">รูปภาพ</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    
                    <button type="submit" class="btn btn-primary" id="addEquipmentBtn">ยืนยัน</button>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
    $('#addIngredientBtn').click(function() {
        var ingredientName = $('#ingredientName').val();
        var price = $('#price').val();
        var image = $('#image')[0].files[0];
        
        var formData = new FormData();
        formData.append('ingredientName', ingredientName);
        formData.append('price', price);
        formData.append('image', image);

        var token = $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            type: 'POST',
            url: '/add-ingredient',
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': token
            },
            success: function(response) {
                $('#addIngredientModal').modal('hide');
                // สามารถเพิ่มการจัดการหลังจากบันทึกข้อมูลได้ที่นี่
                
                // เพิ่มโค้ดสำหรับแสดงข้อมูลใหม่ทันที
                var card = `
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="${response.photo}" class="card-img-top" alt="${response.name}">
                            <div class="card-body">
                                <h5 class="card-title">${response.name}</h5>
                                <p class="card-text">ราคาต่อมิลลิลิตร: ${response.price}</p>
                            </div>
                        </div>
                    </div>
                `;

                $('.card-body').append(card);
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                // จัดการข้อผิดพลาดที่เกิดขึ้นในการส่งข้อมูล
            }
        });
    });
});
</script>


</body>
</html>
