<?php
header('Content-Type: application/json');

include 'database.php';

$data = json_decode(file_get_contents('php://input'), true);
$maLTH = mysqli_real_escape_string($conn, $data['maLTH']);
$ngayTH = mysqli_real_escape_string($conn, $data['ngayTH']);
$noidungTH = mysqli_real_escape_string($conn, $data['noidungTH']);
$maGV = mysqli_real_escape_string($conn, $data['maGV']);
$ca = mysqli_real_escape_string($conn, $data['ca']);
$gioBD = mysqli_real_escape_string($conn, $data['gioBD']);
$gioKT = mysqli_real_escape_string($conn, $data['gioKT']);
$sql = "UPDATE lichthuchanh SET ngayTH='$ngayTH', noidungTH='$noidungTH' WHERE maLTH='$maLTH'";
$sql1 = "UPDATE ct_thuchanh SET maGV='$maGV', ngayTH='$ngayTH', ca='$ca',gioBD = '$gioBD',gioKT ='$gioKT' WHERE maLTH='$maLTH'";

// Bắt đầu giao dịch
$conn->begin_transaction();

try {
    if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE) {
        // Nếu cả hai câu lệnh thành công, commit giao dịch
        $conn->commit();
        echo json_encode(['status' => 'success', 'message' => 'Cập nhật thành công']);
    } else {
        // Nếu một trong hai câu lệnh thất bại, throw exception
        throw new Exception('Lỗi khi cập nhật: ' . $conn->error);
    }
} catch (Exception $e) {
    // Rollback giao dịch nếu có lỗi
    $conn->rollback();
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}

$conn->close();
?>
