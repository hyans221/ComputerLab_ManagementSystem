<?php
// Kết nối đến cơ sở dữ liệu
include 'database.php';

// Kiểm tra xem maLHP và maSV có được truyền vào không
if (isset($_GET['maLHP']) && isset($_GET['maSV'])) {
    $maLHP = mysqli_real_escape_string($conn, $_GET['maLHP']);
    $maSV = mysqli_real_escape_string($conn, $_GET['maSV']);

    // Câu lệnh SQL để xóa sinh viên khỏi lớp học phần
    $sql = "DELETE FROM ct_hocphan WHERE maLHP = '$maLHP' AND maSV = '$maSV'";

    // Thực thi câu lệnh SQL
    if ($conn->query($sql) === TRUE) {
        // Xóa thành công
        $success = true;
    } else {
        // Xóa thất bại
        $error = "Lỗi khi xóa sinh viên khỏi lớp học phần: " . $conn->error;
    }
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kết quả xóa sinh viên khỏi lớp học phần</title>
    <script type="text/javascript">
        <?php if (isset($success) && $success === true): ?>
            alert('Xóa sinh viên khỏi lớp học phần thành công.');
        <?php elseif (isset($error)): ?>
            alert('<?php echo $error; ?>');
        <?php else: ?>
            alert('Không có sinh viên nào được xóa khỏi lớp học phần.');
        <?php endif; ?>
        window.location.href = 'lopHocPhan_detail.php?maLHP=<?php echo urlencode($maLHP); ?>';
    </script>
</head>
<body>
</body>
</html>

