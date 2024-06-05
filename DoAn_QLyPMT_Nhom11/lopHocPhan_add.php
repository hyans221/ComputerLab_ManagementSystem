<?php
// Kết nối đến cơ sở dữ liệu

include 'database.php';


// Lấy dữ liệu từ yêu cầu AJAX
$data = json_decode(file_get_contents('php://input'), true);

// Kiểm tra dữ liệu có hợp lệ không
if (!empty($data['maLHP']) && !empty($data['tenLHP']) && !empty($data['tenHP'])) {
    $maLHP = mysqli_real_escape_string($conn, $data['maLHP']);
    $tenLHP = mysqli_real_escape_string($conn, $data['tenLHP']);
    $tenHP = mysqli_real_escape_string($conn, $data['tenHP']);

    // Câu lệnh SQL để thêm dữ liệu
    $sql = "INSERT INTO lophocphan (maLHP, tenLHP, tenHP) VALUES ('$maLHP', '$tenLHP', '$tenHP')";

    // Thực thi câu lệnh SQL
    if ($conn->query($sql) === TRUE) {
        // Trả về phản hồi thành công
        echo json_encode(['status' => 'success', 'message' => 'Thêm lớp học phần thành công']);
    } else {
        // Trả về phản hồi lỗi
        echo json_encode(['status' => 'error', 'message' => 'Lỗi khi thêm lớp học phần: ' . $conn->error]);
    }
} else {
    // Trả về phản hồi lỗi khi dữ liệu không hợp lệ
    echo json_encode(['status' => 'error', 'message' => 'Dữ liệu không hợp lệ']);
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>