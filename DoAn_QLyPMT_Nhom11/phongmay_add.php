<?php
include 'auth.php';
include 'database.php';
session_start(); 
$conn->set_charset("utf8");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $maPM = $_POST['maPM'];
    $tenPM = $_POST['tenPM'];
    $diadiemPM = $_POST['diadiemPM'];

    $maPM = mysqli_real_escape_string($conn, $maPM);
    $tenPM = mysqli_real_escape_string($conn, $tenPM);
    $diadiemPM = mysqli_real_escape_string($conn, $diadiemPM);

    $sql = "INSERT INTO phongmay (maPM, tenPM, diadiemPM) VALUES ('$maPM', '$tenPM', '$diadiemPM')";

    if ($conn->query($sql) === TRUE) {
        header('Location:phongmay_index.php?path=phongmay/list');
        exit();
    } else {
        $error = "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sửa phòng máy</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="libs/img/huitlogo.jpg" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
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
    input[type="date"] {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .btn-primary .btn-dark {
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
<?php include 'header.php'; 
include 'sidebar.php'; 
?>

<body>
    <main id="main" class="main">
        <div class="container mt-5">
            <h2 class="mb-4">Thêm Phòng Máy</h2>
            <?php if(isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="maPM">Mã Phòng Máy</label>
                    <input type="text" class="form-control" id="maPM" name="maPM" required>
                </div>
                <div class="form-group">
                    <label for="tenPM">Tên Phòng Máy</label>
                    <input type="text" class="form-control" id="tenPM" name="tenPM" required>
                </div>
                <div class="form-group">
                    <label for="diadiemPM">Địa Điểm</label>
                    <input type="text" class="form-control" id="diadiemPM" name="diadiemPM" required>
                </div>

                <button type="submit" class="btn btn-primary">Thêm</button>
                <button onclick="window.location.href='phongmay_index.php'" class="btn btn-dark">Quay lại</button>
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
