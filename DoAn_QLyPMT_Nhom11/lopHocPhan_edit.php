<?php
header('Content-Type: application/json');

include 'database.php';

$data = json_decode(file_get_contents('php://input'), true);
$maLHP = mysqli_real_escape_string($conn, $data['maLHP']);
$tenLHP = mysqli_real_escape_string($conn, $data['tenLHP']);
$tenHP = mysqli_real_escape_string($conn, $data['tenHP']);

$sql = "UPDATE lophocphan SET tenLHP='$tenLHP', tenHP='$tenHP' WHERE maLHP='$maLHP'";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['status' => 'success', 'message' => 'Cập nhật lớp học phần thành công']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Lỗi khi cập nhật lớp học phần: ' . $conn->error]);
}

$conn->close();
?>
