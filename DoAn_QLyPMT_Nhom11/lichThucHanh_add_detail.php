<?php
include 'database.php';

// Lấy dữ liệu từ yêu cầu AJAX
$data = json_decode(file_get_contents('php://input'), true);

// Kiểm tra dữ liệu có hợp lệ không
if (!empty($data['maLTH']) && !empty($data['ngayTH']) && !empty($data['maGV']) && !empty($data['ca'])&&!empty($data['gioKT'])&&!empty($data['gioKT'])) {
    $maLTH = mysqli_real_escape_string($conn, $data['maLTH']);
    $ngayTH = mysqli_real_escape_string($conn, $data['ngayTH']);
    $maGV = mysqli_real_escape_string($conn, $data['maGV']);
    $ca = mysqli_real_escape_string($conn, $data['ca']);
    $gioBD = mysqli_real_escape_string($conn, $data['gioBD']);
    $gioKT = mysqli_real_escape_string($conn, $data['gioKT']);
    

    // Câu lệnh SQL để thêm dữ liệu
    $sql = "INSERT INTO ct_thuchanh (maLTH, ngayTH, maGV, ca, gioBD, gioKT) VALUES ('$maLTH', '$ngayTH', '$maGV', '$ca', '$gioBD', '$gioKT')";

    // Thực thi câu lệnh SQL
    if ($conn->query($sql) === TRUE) {
        // Trả về phản hồi thành công
        echo json_encode(['status' => 'success', 'message' => 'Thêm thành công']);
    } else {
        // Trả về phản hồi lỗi
        echo json_encode(['status' => 'error', 'message' => 'Lỗi khi thêm: ' . $conn->error]);
    }
} else {
    // Trả về phản hồi lỗi khi dữ liệu không hợp lệ
    echo json_encode(['status' => 'error', 'message' => 'Dữ liệu không hợp lệ']);
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
