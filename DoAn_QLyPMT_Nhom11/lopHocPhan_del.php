<?php
// Kết nối đến cơ sở dữ liệu
include 'database.php';

// Kiểm tra xem maLHP có được truyền vào không
if (isset($_GET['maLHP'])) {
    $maLHP = mysqli_real_escape_string($conn, $_GET['maLHP']);

    // Câu lệnh SQL để xóa dữ liệu
    $sql = "DELETE FROM lophocphan WHERE maLHP = '$maLHP'";

    // Thực thi câu lệnh SQL
    if ($conn->query($sql) === TRUE) {
        // Xóa thành công
        $success = true;
    } else {
        // Xóa thất bại
        $error = "Lỗi khi xóa lớp học phần: " . $conn->error;
    }
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kết quả xóa lớp học phần</title>
    <script type="text/javascript">
        <?php if (isset($success) && $success === true): ?>
            alert('Xóa lớp học phần thành công.');
        <?php elseif (isset($error)): ?>
            alert('<?php echo $error; ?>');
        <?php else: ?>
            alert('Không có lớp học phần được xóa.');
        <?php endif; ?>
        window.location.href = 'lopHocPhan_index.php';
    </script>
</head>
<body>
</body>
</html>