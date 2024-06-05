<?php
session_start();
include 'database.php';
$conn->set_charset("utf8");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy mã giáo viên từ URL
$maGV = $_GET['id'];

$sql = "DELETE FROM giaovien WHERE maGV='$maGV'";

if ($conn->query($sql) === TRUE) {
    header('Location: giaovien_index.php?path=giaovien/list');
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
