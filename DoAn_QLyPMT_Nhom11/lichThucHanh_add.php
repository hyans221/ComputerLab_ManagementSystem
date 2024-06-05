<?php
// Kết nối đến cơ sở dữ liệu

include 'database.php';

// Lấy dữ liệu từ yêu cầu AJAX
$data = json_decode(file_get_contents('php://input'), true);

// Kiểm tra dữ liệu có hợp lệ không
if (!empty($data['maLTH']) && !empty($data['ngayTH']) && !empty($data['noidungTH'])&& !empty($data['maPM']) && !empty($data['maGV']) && !empty($data['ca'])&&!empty($data['gioKT'])&&!empty($data['gioKT'])) {
    $maLTH = mysqli_real_escape_string($conn, $data['maLTH']);
    $ngayTH = mysqli_real_escape_string($conn, $data['ngayTH']);
    $noidungTH = mysqli_real_escape_string($conn, $data['noidungTH']);
    $maPM= mysqli_real_escape_string($conn, $data['maPM']);
    $maGV_full = mysqli_real_escape_string($conn, $data['maGV']);
    $maGV = explode(' -', $maGV_full)[0];
   
    $ca = mysqli_real_escape_string($conn, $data['ca']);
    $gioBD = mysqli_real_escape_string($conn, $data['gioBD']);
    $gioKT = mysqli_real_escape_string($conn, $data['gioKT']);


    // Câu lệnh SQL để thêm dữ liệu vào bảng lichthuchanh
    $sql1 = "INSERT INTO lichthuchanh (maLTH, ngayTH, noidungTH,maPM) VALUES ('$maLTH', '$ngayTH', '$noidungTH','$maPM')";

    // Thực thi câu lệnh SQL thứ nhất
    if ($conn->query($sql1) === TRUE) {
        // Câu lệnh SQL để thêm dữ liệu vào bảng ct_thuchanh
        $sql2 = "INSERT INTO ct_thuchanh (maLTH, ngayTH, maGV, ca, gioBD, gioKT) VALUES ('$maLTH', '$ngayTH', '$maGV', '$ca', '$gioBD', '$gioKT')";

        // Thực thi câu lệnh SQL thứ hai
        if ($conn->query($sql2) === TRUE) {
            // Trả về phản hồi thành công
            echo json_encode(['status' => 'success', 'message' => 'Thêm thành công']);
        } else {
            // Trả về phản hồi lỗi cho câu lệnh thứ hai
            echo json_encode(['status' => 'error', 'message' => 'Lỗi khi thêm vào ct_thuchanh: ' . $conn->error]);
        }
    } else {
        // Trả về phản hồi lỗi cho câu lệnh thứ nhất
        echo json_encode(['status' => 'error', 'message' => 'Lỗi khi thêm vào lichthuchanh: ' . $conn->error]);
    }
} else {
    // Trả về phản hồi lỗi khi dữ liệu không hợp lệ
    echo json_encode(['status' => 'error', 'message' => 'Dữ liệu không hợp lệ']);
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
