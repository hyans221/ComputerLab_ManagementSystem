<?php
include 'auth.php';
include 'database.php';
session_start(); 
$conn->set_charset("utf8");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM maytinh";
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

    <title>Quản lý máy tính</title>
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
        /* Add some space between search and pagination */
    }

    .dataTables_paginate {
        float: right;
    }

    .dataTables_length {
        margin-bottom: 10px;
    }

    .dataTables_wrapper .dataTables_paginate {
        text-align: center !important;
        /* Ensure center alignment */
        visibility: visible !important;
        /* Ensure visibility */
        position: relative;
        /* Adjust positioning */
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
            <h2 class="mb-4">Quản Lý Máy Tính</h2>
            <a href="maytinh_add.php?path=maytinh/add" class="btn btn-primary mb-2">Thêm Máy Tính</a>
            <table id="mayTinhTable" class="mb-2">
                <thead>
                    <tr>
                        <th>Mã Máy Tính</th>
                        <th>Tên Máy Tính</th>
                        <th>Ngày Nhập</th>
                        <th>Tình Trạng</th>
                        <th>Mã Phòng Máy</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?= $row['maMT'] ?></td>
                        <td><?= $row['tenMT'] ?></td>
                        <td><?= isset($row['ngaynhap']) ? $row['ngaynhap'] : '' ?></td>
                        <td><?= isset($row['tinhtrang']) ? $row['tinhtrang'] : '' ?></td>
                        <td><?= $row['maPM'] ?></td>
                        <td>
                            <a href="maytinh_edit.php?path=maytinh/edit&id=<?= $row['maMT'] ?>" class="btn btn-warning">Sửa</a>
                            <a href="maytinh_delete.php?path=maytinh/delete&id=<?= $row['maMT'] ?>" class="btn btn-danger">Xóa</a>
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
                $('#mayTinhTable').DataTable();
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