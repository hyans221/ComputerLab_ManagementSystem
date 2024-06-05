<?php
// Kết nối đến cơ sở dữ liệu
include 'database.php';


if (isset($_GET['maLTH'])) {
    $maLTH = mysqli_real_escape_string($conn, $_GET['maLTH']);

    // Câu lệnh SQL để xóa dữ liệu
    $sql = "DELETE FROM lichthuchanh WHERE maLTH = '$maLTH'";

    // Thực thi câu lệnh SQL
    if ($conn->query($sql) === TRUE) {
        // Xóa thành công
        $success = true;
    } else {
        // Xóa thất bại
        $error = "Lỗi khi xóa: " . $conn->error;
    }
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kết quả xóa lịch thực hành</title>
    <script type="text/javascript">
        <?php if (isset($success) && $success === true): ?>
            alert('Xóa thành công.');
        <?php elseif (isset($error)): ?>
            alert('<?php echo $error; ?>');
        <?php else: ?>
            alert('Không có lịch được xóa.');
        <?php endif; ?>
        window.location.href = 'lichThucHanh_index.php';
    </script>
</head>
<body>
</body>
</html>