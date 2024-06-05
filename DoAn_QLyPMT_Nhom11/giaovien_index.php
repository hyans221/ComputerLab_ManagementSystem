<?php
session_start();
include 'database.php';
$conn->set_charset("utf8");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM giaovien";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $result->free();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Quản lý giáo viên</title>
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
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="assets/vendor/DataTables/datatables.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
    /* Common CSS styles */
    table {
        border: 1px solid black;
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid black;
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        padding: 8px 10px;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    .btn {
        margin-right: 5px;

    }

    /* Pagination and search styling */
    .dataTables_wrapper {
        margin-top: 20px;
    }

    .dataTables_filter {
        float: right;
        margin-bottom: 10px;
    }

    .dataTables_paginate {
        float: right;
    }

    .dataTables_length {
        margin-bottom: 10px;
    }

    .dataTables_wrapper .dataTables_paginate {
        text-align: center !important;
        visibility: visible !important;
        position: relative;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        display: inline-block;
        padding: 0.5em 1em;
        margin: 0 0.25em;
        background-color: #007bff;
        color: #fff;
        border-radius: 0.25em;
        text-decoration: none;
        cursor: pointer;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background-color: #0056b3;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background-color: #0056b3;
    }
    </style>

</head>
<?php
 include "header.php";
 include 'sidebar.php';
?>

<body>
    <main id="main" class="main">
        <div class="container mt-5">
            <h2 class="mb-4">Quản Lý Giáo Viên</h2>
            <a href="giaovien_add.php?path=giaovien/add" class="btn btn-primary">Thêm Giáo Viên</a>
            <table id="giaovienTable">
                <thead>
                    <tr>
                        <th>Mã Giáo Viên</th>
                        <th>Họ Tên Giáo Viên</th>
                        <th>Chuyên Ngành</th>
                        <th>Ngày Sinh</th>
                        <th>Giới Tính</th>
                        <th>Số Điện Thoại</th>
                        <th>Địa Chỉ</th>
                        <th>Avatar</th>
                        <th>Tên Đăng Nhập</th>
                        <th>Mật Khẩu</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?= $row['maGV'] ?></td>
                        <td><?= $row['hotenGV'] ?></td>
                        <td><?= $row['chuyennganh'] ?></td>
                        <td><?= isset($row['ngaysinhGV']) ? $row['ngaysinhGV'] : '' ?></td>
                        <td><?= isset($row['gioitinhGV']) ? $row['gioitinhGV'] : '' ?></td>
                        <td><?= $row['sdtGV'] ?></td>
                        <td><?= isset($row['diachiGV']) ? $row['diachiGV'] : '' ?></td>
                        <td>
                            <?php if (!empty($row['avatar'])): ?>
                                <img src="assets/avt_img/<?= $row['avatar'] ?>" alt="Avatar" style="width:50px;height:50px;">
                            <?php else: ?>
                                No Avatar
                            <?php endif; ?>
                        </td>
                        <td><?= $row['tendangnhap'] ?></td>
                        <td><?= $row['matkhau'] ?></td>
                        <td>
                            <a href="giaovien_edit.php?path=giaovien/edit&id=<?= $row['maGV'] ?>"
                                class="btn btn-warning mt-1">Sửa</a>
                            <a href="giaovien_delete.php?path=giaovien/delete&id=<?= $row['maGV'] ?>"
                                class="btn btn-danger mt-1">Xóa</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script>
        $(document).ready(function() {
            try {
                $('#giaovienTable').DataTable();
            } catch (error) {
                console.error('Error initializing DataTable:', error);
            }
        });
        </script>
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
