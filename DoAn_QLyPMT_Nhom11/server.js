const express = require('express');
const mysql = require('mysql');
const app = express();
const port = 3000;

// Cấu hình kết nối tới MySQL
const connection = mysql.createConnection({
    host: 'localhost', // Thay thế bằng địa chỉ máy chủ MySQL của bạn nếu khác
    user: 'root', // Thay thế bằng tên người dùng MySQL của bạn
    password: '', // Thay thế bằng mật khẩu MySQL của bạn
    database: 'qlpmt' // Thay thế bằng tên cơ sở dữ liệu của bạn
});

// Kết nối tới MySQL
connection.connect(err => {
    if (err) {
        console.error('Kết nối tới MySQL thất bại:', err.stack);
        return;
    }
    console.log('Đã kết nối tới MySQL với id ' + connection.threadId);
});

// Tạo route để lấy danh sách phòng máy
app.get('/api/phongmay', (req, res) => {
    connection.query('SELECT * FROM phongmay', (error, results) => {
        if (error) {
            return res.status(500).json({ error: error });
        }
        res.json(results);
    });
});

// Khởi động server
app.listen(port, () => {
    console.log(`Server đang chạy tại http://localhost:${port}`);
});
