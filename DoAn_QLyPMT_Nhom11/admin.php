<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa và có phải là admin không
if (isset($_SESSION['username']) && $_SESSION['user_type'] == 'admin') {
    // Nội dung trang admin ở đây
    header("Location: index.php");
} else {
    // Người dùng chưa đăng nhập hoặc không phải admin, chuyển hướng về trang đăng nhập
    header("Location: login.php");
}
?>