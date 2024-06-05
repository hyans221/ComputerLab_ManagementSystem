<?php
session_start();
include 'database.php';
$conn->set_charset("utf8");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $maGV = $_POST['maGV'];
    $hotenGV = $_POST['hotenGV'];
    $chuyennganh = $_POST['chuyennganh'];
    $ngaysinhGV = $_POST['ngaysinhGV'];
    $gioitinhGV = $_POST['gioitinhGV'];
    $sdtGV = $_POST['sdtGV'];
    $diachiGV = $_POST['diachiGV'];
    $tendangnhap = $_POST['tendangnhap'];
    $matkhau = $_POST['matkhau'];

    $avatar = $_FILES['avatar']['name'];
    if ($avatar) {
        $target_dir = "assets/avt_img/";
        $target_file = $target_dir . basename($avatar);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["avatar"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["avatar"]["size"] > 2000000) { // 2MB
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (!move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $avatar = $_POST['existing_avatar'];
    }

    $sql = "UPDATE giaovien SET hotenGV='$hotenGV', chuyennganh='$chuyennganh', ngaysinhGV='$ngaysinhGV', gioitinhGV='$gioitinhGV', sdtGV='$sdtGV', diachiGV='$diachiGV', avatar='$avatar', tendangnhap='$tendangnhap', matkhau='$matkhau' WHERE maGV='$maGV'";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: giaovien_index.php?path=giaovien/list');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$maGV = $_GET['id'];
$sql = "SELECT * FROM giaovien WHERE maGV='$maGV'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Sửa giáo viên</title>
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

    .btn-primary,
    .btn-dark {
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

    .btn-dark {
        background-color: #6c757d;
    }

    .btn-dark:hover {
        background-color: #5a6268;
    }
    </style>
</head>
<?php include 'header.php'; 
include 'sidebar.php'; 
?>

<body>
    <main id="main" class="main">
        <div class="container mt-5">
            <h2 class="mb-4">Sửa Giáo Viên</h2>
            <form method="POST" action="" enctype="multipart/form-data">
                <input type="hidden" name="maGV" value="<?= $row['maGV'] ?>">
                <input type="hidden" name="existing_avatar" value="<?= $row['avatar'] ?>">
                <div class="form-group">
                    <label for="hotenGV">Họ Tên Giáo Viên</label>
                    <input type="text" class="form-control" id="hotenGV" name="hotenGV" value="<?= $row['hotenGV'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="chuyennganh">Chuyên Ngành</label>
                    <input type="text" class="form-control" id="chuyennganh" name="chuyennganh" value="<?= $row['chuyennganh'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="ngaysinhGV">Ngày Sinh</label>
                    <input type="date" class="form-control" id="ngaysinhGV" name="ngaysinhGV" value="<?= $row['ngaysinhGV'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="gioitinhGV">Giới Tính</label>
                    <select class="form-control" id="gioitinhGV" name="gioitinhGV" required>
                        <option value="">Chọn giới tính</option>
                        <option value="Nam" <?= ($row['gioitinhGV'] == 'Nam') ? 'selected' : '' ?>>Nam</option>
                        <option value="Nữ" <?= ($row['gioitinhGV'] == 'Nữ') ? 'selected' : '' ?>>Nữ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sdtGV">Số Điện Thoại</label>
                    <input type="text" class="form-control" id="sdtGV" name="sdtGV" value="<?= $row['sdtGV'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="diachiGV">Địa Chỉ</label>
                    <input type="text" class="form-control" id="diachiGV" name="diachiGV" value="<?= $row['diachiGV'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="avatar">Ảnh Đại Diện</label>
                    <input type="file" class="form-control" id="avatar" name="avatar">
                    <?php if ($row['avatar']): ?>
                        <img src="assets/avt_img/<?= $row['avatar'] ?>" alt="Avatar" width="100">
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="tendangnhap">Tên Đăng Nhập</label>
                    <input type="text" class="form-control" id="tendangnhap" name="tendangnhap" value="<?= $row['tendangnhap'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="matkhau">Mật Khẩu</label>
                    <input type="password" class="form-control" id="matkhau" name="matkhau" value="<?= $row['matkhau'] ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                <button type="button" onclick="window.location.href='giaovien_index.php'" class="btn btn-dark">Quay lại</button>
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
