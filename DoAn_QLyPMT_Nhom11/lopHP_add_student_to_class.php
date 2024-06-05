<?php
// Kết nối đến cơ sở dữ liệu

include 'database.php';


// Lấy dữ liệu từ yêu cầu AJAX
$data = json_decode(file_get_contents('php://input'), true);

// Kiểm tra dữ liệu có hợp lệ không
if (!empty($data['maLHP']) && !empty($data['maGV']) && !empty($data['maSV'])) {
    $maLHP = mysqli_real_escape_string($conn, $data['maLHP']);
    $maGV = mysqli_real_escape_string($conn, $data['maGV']);
    $maSV = mysqli_real_escape_string($conn, $data['maSV']);

    // Câu lệnh SQL để thêm dữ liệu
    $sql = "INSERT INTO ct_hocphan  (maLHP, maGV, maSV) VALUES ('$maLHP', '$maGV', '$maSV')";

    // Thực thi câu lệnh SQL
    if ($conn->query($sql) === TRUE) {
        // Trả về phản hồi thành công
        echo json_encode(['status' => 'success', 'message' => 'Thêm sinh viên thành công']);
    } else {
        // Trả về phản hồi lỗi
        echo json_encode(['status' => 'error', 'message' => 'Lỗi khi thêm sinh viên: ' . $conn->error]);
    }
} else {
    // Trả về phản hồi lỗi khi dữ liệu không hợp lệ
    echo json_encode(['status' => 'error', 'message' => 'Dữ liệu không hợp lệ']);
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>