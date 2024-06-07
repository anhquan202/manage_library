<?php
// Thông tin kết nối đến cơ sở dữ liệu
$servername = "localhost"; // Tên máy chủ MySQL
$username = "root"; // Tên người dùng MySQL
$password="";
$database = "manage_library"; // Tên cơ sở dữ liệu MySQL

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connect unsuccessfully: " . $conn->connect_error);
}
// Đóng kết nối
?>
