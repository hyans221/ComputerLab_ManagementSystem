<?php
include 'auth.php';
include 'database.php';
session_start(); 
$sql_gv_add = "SELECT maGV, hotenGV FROM giaovien";
$result_gv_add = $conn->query($sql_gv_add);
$sql_pm_add = "SELECT * FROM phongmay";
$result_pm_add = $conn->query($sql_pm_add);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Quản lý lịch thực hành</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/huitlogo.jpg" rel="icon">
  

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

<body>
<?php
    include 'header.php';
    include 'sidebar.php';
?>
<main id="main" class="main">
    <div class="container mt-5">
            <h2 class="mb-4">Quản lý lịch thực hành</h2>
            <button class="btn btn-success" onclick="openAddModal()">Thêm Mới</button>
            <br>
            <label for="searchInput" class="form-label mt-1">Tìm kiếm theo ngày:</label>
             <input type="date" class="form-control" id="searchInput" name="searchInput">
            <button type="submit" class="btn btn-primary mt-2" onclick="searchByDate()">Tìm kiếm</button>
            <table id="lichthuchanhTable" class="mb-2">
                <thead>
                      <tr>
                        <th>Mã LTH</th>
                        <th>Ngày Thực Hành</th>
                        <th>Nội dung Thực Hành</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $keyword = "";

                    $sql = "SELECT * FROM lichthuchanh,ct_thuchanh WHERE lichthuchanh.maLTH = ct_thuchanh.maLTH";
                    if (!empty($_GET['searchInput'])) {
                        // Lấy giá trị ngày từ URL nếu có
                        $keyword = $_GET['searchInput'];
                        // Thêm điều kiện vào truy vấn SQL để tìm kiếm theo ngày
                        $sql .= " AND lichthuchanh.ngayTH = '$keyword'";
                    }

                    $result = $conn->query($sql);
                    $rowCount = 0;

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) { ?>
                            <tr>
                            <td><?= htmlspecialchars($row['maLTH'])?> </td>
                            <td><?= htmlspecialchars($row['ngayTH'])?></td>
                            <td><?= htmlspecialchars($row['noidungTH'])?></td>
                            <td>
                                    <a href="lichThucHanh_detail.php?maLTH=<?= urlencode($row['maLTH']) ?>" class="btn btn-sm btn-info">Xem</a>
                                    <a href="#" class="btn btn-sm btn-warning" onclick="openEditModal('<?= htmlspecialchars($row['maLTH']) ?>', '<?= htmlspecialchars($row['ngayTH']) ?>', '<?= htmlspecialchars($row['noidungTH']) ?>', '<?= htmlspecialchars($row['maGV']) ?>', '<?= htmlspecialchars($row['ca']) ?>')">Sửa</a>
                                    <a href="lichThucHanh_del.php?maLTH=<?= urlencode($row['maLTH']) ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-sm btn-danger">Xóa</a>
                            </tr>
                            <?php
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
                    <h4 class="modal-title">Thêm Mới Lịch Thực Hành</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="closeAddModal()"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Add New Record Form -->
                    <form id="addForm">
                        <div class="mb-3">
                            <label for="maLTH" class="form-label">Mã LTH</label>
                            <input type="text" class="form-control" id="maLTH" name="maLTH">
                        </div>
                        <div class="mb-3">
                            <label for="ngayTH" class="form-label">Ngày Thực Hành</label>
                            <input type="date" class="form-control" id="ngayTH" name="ngayTH">
                        </div>
                        <div class="mb-3">
                            <label for="maGV" class="form-label">Chọn Phòng Máy</label>
                            <select class="form-select" id="maPM" name="maPM">
                                <?php
                               

                                if ($result_gv_add->num_rows > 0) {
                                    while ($row_pm_add = $result_pm_add->fetch_assoc()) {
                                        echo "<option value='" . $row_pm_add['maPM'] . "'>" . $row_pm_add['maPM'] . " - " . $row_pm_add['tenPM'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="maGV" class="form-label">Chọn Giáo Viên</label>
                            <select class="form-select" id="maGV" name="maGV">
                                <?php
                               

                                if ($result_gv_add->num_rows > 0) {
                                    while ($row_gv_add = $result_gv_add->fetch_assoc()) {
                                        echo "<option value='" . $row_gv_add['maGV'] . "'>" . $row_gv_add['maGV'] . " - " . $row_gv_add['hotenGV'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                         <div class="mb-3">
                        <label for="ca" class="form-label">Ca</label>
                        <select class="form-select" id="ca" name="ca">
                            <option value="Ca Sáng">Ca Sáng</option>
                            <option value="Ca Chiều">Ca Chiều</option>
                        </select>
                        <div class="mb-3">
                            <label for="editGioBD" class="form-label">Giờ BD</label>
                             <input type="time" class="form-control" id="editGioBD" name="gioBD">
                        </div>
                        <div class="mb-3">
                        <label for="editGioKT" class="form-label">Giờ KT</label>
                             <input type="time" class="form-control" id="editGioKT" name="gioKT">
                        </div>  
                    </div>                       
                        <div class="mb-3">
                            <label for="noidungTH" class="form-label">Nội Dung</label>
                            <input type="text" class="form-control" id="noidungTH" name="noidungTH">
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
                    <h4 class="modal-title">Sửa Lịch Thực Hành</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="closeEditModal()"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Edit Record Form -->
                    <form id="editForm">
                        <div class="mb-3">
                            <label for="editMaLTH" class="form-label">Mã LHP</label>
                            <input type="text" class="form-control" id="editMaLTH" name="maLTH" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="editNgayTH" class="form-label">Ngày Thực Hành</label>
                             <input type="date" class="form-control" id="editNgayTH" name="ngayTH">
                        </div>

                     <div class="mb-3">
                            <label for="editMaGV" class="form-label">Chọn Giáo Viên</label>
                           
                             <input type="text" class="form-control" id="editMaGV" name="MaGV" readonly>  
                          
                        </div>

                         <div class="mb-3">
                        <label for="editCa" class="form-label">Ca</label>
                        <select class="form-select" id="editCa" name="ca">
                            <option value="Ca Sáng">Ca Sáng</option>
                            <option value="Ca Chiều">Ca Chiều</option>
                        </select>
                    </div>        
                    <div class="mb-3">
                            <label for="editGioBD" class="form-label">Giờ BD</label>
                             <input type="time" class="form-control" id="editGioBD" name="gioBD">
                        </div>
                        <div class="mb-3">
                        <label for="editGioKT" class="form-label">Giờ KT</label>
                             <input type="time" class="form-control" id="editGioKT" name="gioKT">
                        </div>  
                        <div class="mb-3">
                            <label for="editNoiDungTH" class="form-label">Nội Dung</label>
                             <input type="text" class="form-control" id="editNoiDungTH" name="noidungTH">
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
        function searchByDate() {
            var searchDate = document.getElementById('searchInput').value;
            window.location.href = 'lichThucHanh_index.php?searchInput=' + searchDate;
        }

         function openAddModal() {
            var modal = document.getElementById('addModal');
            modal.style.display = 'block';
        }

        function closeAddModal() {
            var modal = document.getElementById('addModal');
            modal.style.display = 'none';
        }

        function addRecord() {
            var maLTH = document.getElementById('maLTH').value;
            var ngayTH = document.getElementById('ngayTH').value;
            var noidungTH = document.getElementById('noidungTH').value;
            var maPM = document.getElementById('maPM').value; 
            var maGV = document.getElementById('maGV').value; 
            var ca = document.getElementById('ca').value;
            var gioBD = document.getElementById('editGioBD').value;
            var gioKT = document.getElementById('editGioKT').value;

            fetch('lichThucHanh_add.php', {
                method: 'POST',
                body: JSON.stringify({ maLTH: maLTH, ngayTH: ngayTH, noidungTH: noidungTH, maPM: maPM, maGV: maGV, ca: ca,gioBD:gioBD,gioKT:gioKT }),
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


         function openEditModal(maLTH, ngayTH, noidungTH,maGV, ca,gioBD,gioKT) {
            var modal = document.getElementById('editModal');
            document.getElementById('editMaLTH').value = maLTH;
            document.getElementById('editNgayTH').value = ngayTH;
            document.getElementById('editNoiDungTH').value = noidungTH;
            document.getElementById('editMaGV').value = maGV ;
            document.getElementById('editCa').value = ca;
            document.getElementById('editGioBD').value = gioBD;
            document.getElementById('editGioKT').value = gioKT;
            modal.style.display = 'block';
        }

        function closeEditModal() {
            var modal = document.getElementById('editModal');
            modal.style.display = 'none';
        }

        function editRecord() {
            var maLTH = document.getElementById('editMaLTH').value;
            var ngayTH = document.getElementById('editNgayTH').value;
            var noidungTH = document.getElementById('editNoiDungTH').value;
            var maGVfull = document.getElementById('editMaGV').value;
            var maGV = maGVfull.split(" -")[0]; 
            var ca = document.getElementById('editCa').value;
            var gioBD = document.getElementById('editGioBD').value;
            var gioKT = document.getElementById('editGioKT').value;
            fetch('lichThucHanh_edit.php', {
                method: 'POST',
                body: JSON.stringify({ maLTH: maLTH, ngayTH: ngayTH, noidungTH: noidungTH, maGV: maGV, ca: ca, gioBD: gioBD, gioKT: gioKT}),
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
                $('#lichthuchanhTable').DataTable();
            } catch (error) {
                console.error('Error initializing DataTable:', error);
            }
        });
        </script>

</main>
</body>
</html>
