<?php
include 'auth.php';
include 'database.php';
session_start(); 
$conn->set_charset("utf8");

// Bắt đầu output buffering
ob_start();

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy và kiểm tra dữ liệu đầu vào
    $maGV = mysqli_real_escape_string($conn, $_POST['maGV']);
    $hotenGV = mysqli_real_escape_string($conn, $_POST['hotenGV']);
    $chuyennganh = mysqli_real_escape_string($conn, $_POST['chuyennganh']);
    $ngaysinhGV = mysqli_real_escape_string($conn, $_POST['ngaysinhGV']);
    $gioitinhGV = mysqli_real_escape_string($conn, $_POST['gioitinhGV']);
    $sdtGV = mysqli_real_escape_string($conn, $_POST['sdtGV']);
    $diachiGV = mysqli_real_escape_string($conn, $_POST['diachiGV']);
    $tendangnhap = mysqli_real_escape_string($conn, $_POST['tendangnhap']);
    $matkhau = mysqli_real_escape_string($conn, $_POST['matkhau']);

    // Xử lý upload file
    $target_dir = "assets/avt_img/";
    $file_name = basename($_FILES["avatar"]["name"]);
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $target_file = $target_dir . uniqid() . '.' . $file_ext; // Tạo tên tệp duy nhất

    $uploadOk = 1;

    // Kiểm tra xem tệp có phải là ảnh hay không
    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Kiểm tra kích thước tệp
    if ($_FILES["avatar"]["size"] > 20000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Chỉ cho phép các định dạng tệp nhất định
    if ($file_ext != "jpg" && $file_ext != "png" && $file_ext != "jpeg" && $file_ext != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Kiểm tra xem $uploadOk có bị đặt lại thành 0 bởi lỗi không
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
            $avatar = basename($target_file);
            // Chuẩn bị câu lệnh SQL
            $sql = "INSERT INTO giaovien (maGV, hotenGV, chuyennganh, ngaysinhGV, gioitinhGV, sdtGV, diachiGV, avatar, tendangnhap, matkhau) 
                    VALUES ('$maGV', '$hotenGV', '$chuyennganh', '$ngaysinhGV', '$gioitinhGV', '$sdtGV', '$diachiGV', '$avatar', '$tendangnhap', '$matkhau')";
            
            if ($conn->query($sql) === TRUE) {
                echo "Thêm giáo viên thành công";
                header('Location: giaovien_index.php?path=giaovien/list');
                exit();
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Kết thúc output buffering và gửi đầu ra
ob_end_flush();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Thêm giáo viên</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="libs/img/huitlogo.jpg" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
    /* Common CSS styles */

    .container {
        max-width: 600px;
        margin: 0 auto;
    }

    h2 {
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: 600;
    }

    input[type="text"],
    input[type="date"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    select {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        color: #fff;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
    </style>

</head>

<body>
    <?php
 include "header.php";
 include 'sidebar.php';
?>
    <main id="main" class="main">
        <div class="container mt-5">
            <h2 class="mb-4">Thêm Giáo Viên</h2>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="maGV">Mã Giáo Viên</label>
                    <input type="text" class="form-control" id="maGV" name="maGV" required>
                </div>
                <div class="form-group">
                    <label for="hotenGV">Họ Tên Giáo Viên</label>
                    <input type="text" class="form-control" id="hotenGV" name="hotenGV" required>
                </div>
                <div class="form-group">
                    <label for="chuyennganh">Chuyên Ngành</label>
                    <input type="text" class="form-control" id="chuyennganh" name="chuyennganh" required>
                </div>
                <div class="form-group">
                    <label for="ngaysinhGV">Ngày Sinh</label>
                    <input type="date" class="form-control" id="ngaysinhGV" name="ngaysinhGV" required>
                </div>
                <div class="form-group">
                    <label for="gioitinhGV">Giới Tính</label>
                    <select class="form-control" id="gioitinhGV" name="gioitinhGV" required>
                        <option value="">Chọn giới tính</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sdtGV">Số Điện Thoại</label>
                    <input type="text" class="form-control" id="sdtGV" name="sdtGV" required>
                </div>
                <div class="form-group">
                    <label for="diachiGV">Địa Chỉ</label>
                    <input type="text" class="form-control" id="diachiGV" name="diachiGV" required>
                </div>
                <div class="form-group">
                    <label for="avatar">Ảnh Đại Diện</label>
                    <input type="file" class="form-control" id="avatar" name="avatar" required>
                </div>
                <div class="form-group">
                    <label for="tendangnhap">Tên Đăng Nhập</label>
                    <input type="text" class="form-control" id="tendangnhap" name="tendangnhap" required>
                </div>
                <div class="form-group">
                    <label for="matkhau">Mật Khẩu</label>
                    <input type="password" class="form-control" id="matkhau" name="matkhau" required>
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
                <button onclick="window.location.href='giaovien_index.php'" class="btn btn-dark">Quay lại</button>
            </form>
        </div>
    </main>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <br>
    <?php include 'footer.php'; ?>
</body>

</html>
