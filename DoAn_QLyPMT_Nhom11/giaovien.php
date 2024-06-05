<?php
@session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa và có phải là giáo viên không
if (isset($_SESSION['username']) && $_SESSION['user_type'] == 'teacher') {
    // Nội dung trang giáo viên ở đây
    header("Location: index.php");
} else {
    // Người dùng chưa đăng nhập hoặc không phải giáo viên, chuyển hướng về trang đăng nhập
    header("Location: login.php");
}
