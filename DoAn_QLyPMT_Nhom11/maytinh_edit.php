<?php
session_start(); 
include 'database.php';
$conn->set_charset("utf8");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $maMT = $_POST['maMT'];
    $tenMT = $_POST['tenMT'];
    $ngaynhap = $_POST['ngaynhap'];
    $tinhtrang = $_POST['tinhtrang'];
    $maPM = $_POST['maPM'];

    $sql = "UPDATE maytinh SET tenMT='$tenMT', ngaynhap='$ngaynhap', tinhtrang='$tinhtrang', maPM='$maPM' WHERE maMT='$maMT'";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: maytinh_index.php?path=maytinh/list');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$maMT = $_GET['id'];
$sql = "SELECT * FROM maytinh WHERE maMT='$maMT'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Sửa máy tính</title>
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
    input[type="date"] {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .btn-primary .btn-dark{
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
            <h2 class="mb-4">Sửa Máy Tính</h2>
            <form method="POST" action="">
                <input type="hidden" name="maMT" value="<?= $row['maMT'] ?>">
                <div class="form-group">
                    <label for="tenMT">Tên Máy Tính</label>
                    <input type="text" class="form-control" id="tenMT" name="tenMT" value="<?= $row['tenMT'] ?>"
                        required>
                </div>
                <div class="form-group">
                    <label for="ngaynhap">Ngày Nhập</label>
                    <input type="date" class="form-control" id="ngaynhap" name="ngaynhap"
                        value="<?= $row['ngaynhap'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="tinhtrang">Tình Trạng</label>
                    <select class="form-control" id="tinhtrang" name="tinhtrang" required>
                        <option value="">Chọn tình trạng</option>
                        <option value="Hư" <?= ($row['tinhtrang'] == 'Hư') ? 'selected' : '' ?>>Hư</option>
                        <option value="Tốt" <?= ($row['tinhtrang'] == 'Tốt') ? 'selected' : '' ?>>Tốt</option>
                        <option value="Bình thường" <?= ($row['tinhtrang'] == 'Bình thường') ? 'selected' : '' ?>>Bình
                            thường</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="maPM">Mã Phòng Máy</label>
                    <select class="form-control" id="maPM" name="maPM" required>
                        <option value="">Chọn Mã Phòng Máy</option>
                        <?php
                        $sql = "SELECT maPM FROM phongmay";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $selected = ($row['maPM'] == $maPM) ? "selected" : ""; // Kiểm tra nếu mã phòng máy trùng khớp với giá trị đã chọn trước đó
                                echo "<option value='" . $row['maPM'] . "' $selected>" . $row['maPM'] . "</option>";
                            }
                        } else {
                            echo "<option value=''>Không có dữ liệu</option>";
                        }
                        ?>
                    </select>
                </div>


                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                <button onclick="window.location.href='maytinh_index.php'" class="btn btn-dark">Quay lại</button>
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