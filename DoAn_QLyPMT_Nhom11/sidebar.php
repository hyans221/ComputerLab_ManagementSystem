<?php
include 'database.php';
@session_start();
?>

<aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="index.php">
                    <i class="bi bi-grid"></i>
                    <span>Trang chủ</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="phongmay_index.php">
                    <i class="bi bi-person"></i>
                    <span>Quản lý phòng máy</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="maytinh_index.php">
                    <i class="bi bi-person"></i>
                    <span>Quản lý máy tính</span>
                </a>
            </li>
            <?php 
                if (isset($_SESSION['username']) && $_SESSION['user_type'] == 'admin')
                {
                  ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="giaovien_index.php">
                    <i class="bi bi-person"></i>
                    <span>Quản lý giáo viên</span>
                </a>
            </li>
                <?php
                }
            ?>


            <li class="nav-item">
                <a class="nav-link collapsed" href="lichThucHanh_index.php">
                    <i class="bi bi-person"></i>
                    <span>Quản lý lịch thực hành</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="lopHocPhan_index.php">
                    <i class="bi bi-person"></i>
                    <span>Quản lý lớp học phần</span>
                </a>
            </li>

            

          

            <li class="nav-item">
                <a class="nav-link collapsed" href="users-profile.php">
                    <i class="bi bi-person"></i>
                    <span>Thông tin cá nhân</span>
                </a>
            </li><!-- End Profile Page Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" href="chat.php">
                    <i class="bi bi-envelope"></i>
                    <span>Góp ý</span>
                </a>
            </li><!-- End Contact Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->