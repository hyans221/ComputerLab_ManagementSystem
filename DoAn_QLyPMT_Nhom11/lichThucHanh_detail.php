
<?php
include 'database.php';

$sql_gv = "SELECT maGV, hotenGV FROM giaovien";
$result_gv = $conn->query($sql_gv);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết Lịch Thực Hành</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Chi tiết Lịch Thực Hành</h2>
        <div class="card">
            <div class="card-body">
<?php

// Kiểm tra xem tham số maLTH có tồn tại trong URL không
if(isset($_GET['maLTH'])) {
    // Lấy mã lịch thực hành từ tham số maLTH
    $maLTH = $_GET['maLTH'];

    // Thực hiện truy vấn cơ sở dữ liệu để lấy thông tin chi tiết của lịch thực hành với mã lịch thực hành cụ thể
    $sql = "SELECT * FROM ct_thuchanh WHERE maLTH = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $maLTH);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Tạo mảng để lưu dữ liệu từ cơ sở dữ liệu
        $data = array();
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Hiển thị dữ liệu từ CSDL trong bảng
        echo "<table class='table table-bordered'>";
        echo "<thead><tr><th>Mã Lịch</th><th>Mã GV</th><th>Ngày TH</th><th>Họ Tên GV</th><th>Ca</th><th>Giờ Bắt Đầu</th><th>Giờ Kết Thúc</th></tr></thead>";
        echo "<tbody>";

        // Lặp qua từng dòng dữ liệu
        // Lặp qua từng dòng dữ liệu
foreach($data as $row) {
    echo "<tr>";
    echo "<td>" . $row['maLTH'] . "</td>";
    echo "<td>" . $row['maGV'] . "</td>";
    echo "<td>" . $row['ngayTH'] . "</td>";
   
    
    // Thêm truy vấn SQL để lấy họ tên giáo viên từ maGV
    $sql_gv_info = "SELECT hotenGV FROM giaovien WHERE maGV = ?";
    $stmt_gv_info = $conn->prepare($sql_gv_info);
    $stmt_gv_info->bind_param("s", $row['maGV']);
    $stmt_gv_info->execute();
    $result_gv_info = $stmt_gv_info->get_result();
    if ($result_gv_info->num_rows > 0) {
        $gv_info = $result_gv_info->fetch_assoc();
        echo "<td>" . $gv_info['hotenGV'] . "</td>";
    } else {
        echo "<td>Không tìm thấy thông tin giáo viên</td>";
    }
    
    echo "<td>" . $row['ca'] . "</td>";
    echo "<td>" . $row['gioBD'] . "</td>";
    echo "<td>" . $row['gioKT'] . "</td>";
    echo "</tr>";

    // Đóng kết nối và câu lệnh truy vấn
    $stmt_gv_info->close();
} 
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>Không có dữ liệu cho mã lịch thực hành này.</p>";
    }

    // Đóng kết nối cơ sở dữ liệu
    $stmt->close();
} else {
    echo "<p>Không tìm thấy mã lịch thực hành.</p>";
}
// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
     <a href="lichThucHanh_index.php" class="btn btn-primary">Trở về</a>

            </div>
        </div>
    </div>

 <script>
  
    </script>


</body>
</html>
