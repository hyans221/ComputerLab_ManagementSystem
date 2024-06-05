<?php
include 'database.php';

if (isset($_GET['maLHP'])) {
    $maLHP = mysqli_real_escape_string($conn, $_GET['maLHP']);
    
    // Fetch class information
    $sql_lhp = "SELECT * FROM lophocphan WHERE maLHP = '$maLHP'";
    $result_lhp = $conn->query($sql_lhp);
    $lhp = $result_lhp->fetch_assoc();

    // Fetch teacher information
    $sql_gv = "SELECT * FROM giaovien WHERE maGV IN (SELECT maGV FROM ct_hocphan WHERE maLHP = '$maLHP')";
    $result_gv = $conn->query($sql_gv);
    $gv = $result_gv->fetch_assoc();

    // Fetch student information
    $sql_sv = "SELECT * FROM sinhvien WHERE maSV IN (SELECT maSV FROM ct_hocphan WHERE maLHP = '$maLHP')";
    $result_sv = $conn->query($sql_sv);
    // Đếm số lượng sinh viên
    $num_students = $result_sv->num_rows;
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chi Tiết Lớp Học Phần</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Chi Tiết Lớp Học Phần</h2>

        <table class="table table-bordered">
           
            <tr>
                <th>Mã LHP</th>
                <td><?php echo htmlspecialchars($lhp['maLHP']); ?></td>
            </tr>
            <tr>
                <th>Tên LHP</th>
                <td><?php echo htmlspecialchars($lhp['tenLHP']); ?></td>
            </tr>
            <tr>
                <th>Tên Học Phần</th>
                <td><?php echo htmlspecialchars($lhp['tenHP']); ?></td>
            </tr>
            
            
        </table>


        <a href="lopHocPhan_index.php" class="btn btn-primary">Trở về</a>
                
          
    </div>

        

    <script>
       function openAddModal() {
            var modal = document.getElementById('addModal');
            modal.style.display = 'block';
        }

        function closeAddModal() {
            var modal = document.getElementById('addModal');
            modal.style.display = 'none';
        }
        
        function addRecord() {
            var maLHP =  document.getElementById('maLHP').value;
            var maSV = document.getElementById('maSV').value;
            var maGV =  document.getElementById('maGV').value;

            fetch('lopHP_add_student_to_class.php', {
                method: 'POST',
                body: JSON.stringify({ maLHP: maLHP, maGV: maGV,  maSV: maSV }),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    closeAddModal(); 
                    alert(data.message); 
                    location.reload();
                } else {
                    alert(data.message); 
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>
