<?php
include 'database.php';
@session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Quản lý lớp học phần</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/huitlogo.jpg" rel="icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
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

<body>
<?php
    include 'header.php';
    include 'sidebar.php';
?>

<main id="main" class="main">

        <div class="container mt-5">
            <h2 class="mb-4">Quản lý lớp học phần</h2>
            <button class="btn btn-success" onclick="openAddModal()">Thêm Mới</button>
            
            <table id="mayTinhTable" class="mb-2">
                <thead>
                    <tr>
                        <th>Mã LHP</th>
                        <th>Tên LHP</th>
                        <th>Tên Học Phần</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                            
                            $keyword = "";
                            if (isset($_GET['keyword'])) {
                                $keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
                            }

                            $sql = "SELECT * FROM lophocphan";
                            if (!empty($keyword)) {
                                $sql .= " WHERE maLHP LIKE '%$keyword%' OR tenLHP LIKE '%$keyword%' OR tenHP LIKE '%$keyword%'";
                            }

                            $result = $conn->query($sql);
                            $rowCount = 0;

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['maLHP']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['tenLHP']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['tenHP']) . "</td>";
                                    echo "<td>
                                            <a href='lopHocPhan_detail.php?maLHP=" . urlencode($row['maLHP']) . "' class='btn btn-sm btn-info'>Xem</a> 
                                            <a href='#' class='btn btn-sm btn-warning' onclick=\"openEditModal('" . htmlspecialchars($row['maLHP']) . "', '" . htmlspecialchars($row['tenLHP']) . "', '" . htmlspecialchars($row['tenHP']) . "')\">Sửa</a>
                                            <a href='lopHocPhan_del.php?maLHP=" . urlencode($row['maLHP']) . "' onclick=\"return confirm('Bạn có chắc chắn muốn xóa lớp học phần này?')\" class='btn btn-sm btn-danger'>Xóa</a>
                                        </td>";
                                    echo "</tr>";
                               
                                }
                            } else {
                                echo "<tr><td colspan='4'>Không có dữ liệu</td></tr>";
                            }
                            $conn->close();
                            ?>
                </tbody>
            </table>
        
        </div>
        <div class="modal" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm Mới Lớp Học Phần</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="closeAddModal()"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Add New Record Form -->
                    <form id="addForm">
                        <div class="mb-3">
                            <label for="maLHP" class="form-label">Mã LHP</label>
                            <input type="text" class="form-control" id="maLHP" name="maLHP">
                        </div>
                        <div class="mb-3">
                            <label for="tenLHP" class="form-label">Tên LHP</label>
                            <input type="text" class="form-control" id="tenLHP" name="tenLHP">
                        </div>
                        <div class="mb-3">
                            <label for="tenHP" class="form-label">Tên Học Phần</label>
                            <input type="text" class="form-control" id="tenHP" name="tenHP">
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeAddModal()">Đóng</button>
                    <button type="button" class="btn btn-primary" onclick="addRecord()">Thêm</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Sửa Lớp Học Phần</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="closeEditModal()"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Edit Record Form -->
                    <form id="editForm">
                        <div class="mb-3">
                            <label for="editMaLHP" class="form-label">Mã LHP</label>
                            <input type="text" class="form-control" id="editMaLHP" name="maLHP" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="editTenLHP" class="form-label">Tên LHP</label>
                            <input type="text" class="form-control" id="editTenLHP" name="tenLHP">
                        </div>
                        <div class="mb-3">
                            <label for="editTenHP" class="form-label">Tên Học Phần</label>
                            <input type="text" class="form-control" id="editTenHP" name="tenHP">
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeEditModal()">Đóng</button>
                    <button type="button" class="btn btn-primary" onclick="editRecord()">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script>
        function openAddModal() {
            var modal = document.getElementById('addModal');
            modal.style.display = 'block';
        }

        function closeAddModal() {
            var modal = document.getElementById('addModal');
            modal.style.display = 'none';
        }

        function addRecord() {
            var maLHP = document.getElementById('maLHP').value;
            var tenLHP = document.getElementById('tenLHP').value;
            var tenHP = document.getElementById('tenHP').value;

            fetch('lopHocPhan_add.php', {
                method: 'POST',
                body: JSON.stringify({ maLHP: maLHP, tenLHP: tenLHP, tenHP: tenHP }),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    closeAddModal(); 
                    alert(data.message); 
                    location.reload();
                } else {
                    alert(data.message); 
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function openEditModal(maLHP, tenLHP, tenHP) {
            var modal = document.getElementById('editModal');
            document.getElementById('editMaLHP').value = maLHP;
            document.getElementById('editTenLHP').value = tenLHP;
            document.getElementById('editTenHP').value = tenHP;
            modal.style.display = 'block';
        }

        function closeEditModal() {
            var modal = document.getElementById('editModal');
            modal.style.display = 'none';
        }

        function editRecord() {
            var maLHP = document.getElementById('editMaLHP').value;
            var tenLHP = document.getElementById('editTenLHP').value;
            var tenHP = document.getElementById('editTenHP').value;

            fetch('lopHocPhan_edit.php', {
                method: 'POST',
                body: JSON.stringify({ maLHP: maLHP, tenLHP: tenLHP, tenHP: tenHP }),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    closeEditModal();
                    alert(data.message);
                    location.reload();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>                 
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

</body>
  
</html>
