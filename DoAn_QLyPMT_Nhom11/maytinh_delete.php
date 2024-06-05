<?php
session_start();
include 'database.php';
$conn->set_charset("utf8");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Xử lý xoá máy tính
$maMT = $_GET['id'];
$sql = "DELETE FROM maytinh WHERE maMT='$maMT'";

if ($conn->query($sql) === TRUE) {
    header('Location: maytinh_index.php?path=maytinh/list');
} else {
    echo "Error deleting record: " . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
