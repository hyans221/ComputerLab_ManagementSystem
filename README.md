# QLPMT_Project_Nhom11

## Thành Viên Đóng Góp
| Thành Viên           | Tỉ Lệ Đóng Góp | Công Việc                                                  |
|----------------------|----------------|------------------------------------------------------------|
| Huỳnh Huy Hùng       | 33%            | Giao diện trang chủ, đăng nhập, phân quyền, tổng hợp, word |
| Nguyễn Thị Thu Thảo  | 33%            | Quản lý lịch thực hành, lớp học phần, word                 |
| Hà Văn Thy           | 33%            | Quản lý người dùng, phòng máy, máy tính, tổng hợp, word    |


## Link Đăng Nhập
- [Đăng nhập](https://nhom11php.000webhostapp.com/DoAn_QLyPMT_Nhom11/login.php)

## Các Tài Khoản Đăng Nhập
- **Admin**: 
  - Tài khoản: `huyhung`
  - Mật khẩu: `123`
- **Giáo viên**: 
  - Tài khoản: `hihun`
  - Mật khẩu: `123`

## Chức Năng Quản Lý
### Quản lý lớp học phần
- **Thêm mới lớp học**: Tạo lập thông tin chi tiết về lớp học, bao gồm tên lớp, giáo viên phụ trách, môn học giảng dạy, niên khóa.
- **Cập nhật thông tin**: Thay đổi thông tin lớp học khi có thay đổi, đảm bảo tính chính xác và cập nhật.
- **Phân loại lớp học**: Lọc theo tiêu chí cụ thể (môn học, khối lớp, giáo viên, v.v.) để phục vụ mục đích quản lý.
- **Xem thông tin lớp học**: Truy cập thông tin chi tiết về từng lớp học một cách nhanh chóng và dễ dàng.

### Quản lý phòng máy
- **Thêm mới phòng máy**: Ghi chép thông tin chi tiết về phòng máy, bao gồm tên phòng, vị trí, số lượng máy tính, cấu hình phần cứng, phần mềm.
- **Cập nhật thông tin**: Thay đổi thông tin phòng máy khi có thay đổi, đảm bảo tính chính xác và cập nhật.
- **Phân loại phòng máy**: Lọc theo tiêu chí cụ thể (vị trí, loại phòng, sức chứa, v.v.) để phục vụ mục đích quản lý.
- **Xem thông tin phòng máy**: Truy cập thông tin chi tiết về từng phòng máy một cách nhanh chóng và dễ dàng.

### Quản lý giảng viên
- **Tạo lập hồ sơ giảng viên**: Ghi chép thông tin cá nhân chi tiết, phân loại theo khoa, bộ môn, chức danh, học hàm học vị.
- **Cập nhật thông tin**: Thay đổi thông tin giảng viên khi cần thiết, đảm bảo tính chính xác và nhất quán.
- **Phân loại giảng viên**: Lọc theo tiêu chí cụ thể (khoa, bộ môn, chức danh, v.v.) để phục vụ mục đích quản lý.
- **Xem thông tin giảng viên**: Truy cập hồ sơ cá nhân của từng giảng viên một cách nhanh chóng và dễ dàng.

### Quản lý lịch thực hành
- **Lên lịch thực hành**: Tạo lịch học chi tiết cho từng lớp học, bao gồm môn học, thời gian, phòng máy, giảng viên phụ trách.
- **Cập nhật lịch thực hành**: Thay đổi lịch học khi có thay đổi, đảm bảo tính chính xác và cập nhật.
- **Phân loại lịch thực hành**: Lọc theo tiêu chí cụ thể (môn học, lớp học, giảng viên, v.v.) để dễ dàng tra cứu.
- **Xem thông tin lịch thực hành**: Truy cập lịch học chi tiết của từng lớp học một cách nhanh chóng và dễ dàng.

### Quản lý máy tính
- **Thêm mới máy tính**: Ghi chép thông tin chi tiết về từng máy tính, bao gồm cấu hình phần cứng, phần mềm, tình trạng hoạt động, vị trí lắp đặt.
- **Cập nhật thông tin**: Thay đổi thông tin máy tính khi có thay đổi, đảm bảo tính chính xác và cập nhật.
- **Phân loại máy tính**: Lọc theo tiêu chí cụ thể (loại máy, cấu hình, hệ điều hành, v.v.) để phục vụ mục đích quản lý.
- **Xem thông tin máy tính**: Truy cập thông tin chi tiết về từng máy tính một cách nhanh chóng và dễ dàng.

### Thống kê
- **Thống kê số lượng học phần sử dụng phòng máy**: Cho phép thống kê số lượng học phần sử dụng phòng máy theo môn học, lớp học, v.v.
- **Thống kê số lượng máy tính**: Cho phép thống kê số lượng máy tính theo phòng máy, loại máy, v.v.

## Yêu Cầu Chất Lượng
- Giao diện đơn giản, dễ sử dụng.
- Ngôn ngữ tiếng Việt.
- Tốc độ xử lý nhanh chóng, dễ dàng.

## Yêu Cầu Chức Năng
### Tổng quan chức năng
#### Tác nhân

| Tác Nhân  | Miêu Tả                                                                                  |
|-----------|------------------------------------------------------------------------------------------|
| Quản Lý   | Là người nắm tất cả các quyền trong hệ thống. Họ có thể thêm, xóa sửa tất cả thông tin. |
| Nhân viên | Là người nắm quyền quản lý lịch thực hành và lớp học phần. Có thể xem thông tin sinh viên, khu phòng, đăng ký phòng, chuyển phòng, trả phòng. |


### Sơ đồ Use-Case
- ![image](https://github.com/hyans221/QLPMT_Project_Nhom11/assets/89960460/02b6a4e8-58eb-4a23-8dbc-1920c024d207)

### Sơ đồ hoạt động
- ![image](https://github.com/hyans221/QLPMT_Project_Nhom11/assets/89960460/6e79944b-c6e5-4e3d-8e9f-b486923bb2cf)

### Sơ đồ BFD
- ![image](https://github.com/hyans221/QLPMT_Project_Nhom11/assets/89960460/c95207d3-1b26-4b6f-a734-cc885e05f2c0)


## Công Nghệ Sử Dụng
- **Ngôn ngữ lập trình**: PHP, JavaScript
- **Cơ sở dữ liệu**: MySQL
- **Giao diện người dùng**: Bootstrap, jQuery, HTML, CSS
- **Hệ điều hành**: Windows
