<?php
require_once __DIR__ . "/../vendor/autoload.php"; 
use Firebase\JWT\JWT;
session_start();
require_once("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_name = $_POST['user_name'];
  $password = $_POST['password'];
  $stmt = $conn->prepare("SELECT user_type, user_name, full_name FROM users WHERE user_name=? AND password=?");
  $stmt->bind_param("ss", $user_name, $password);
  $stmt->execute();
  $result = $stmt->get_result();
  // Kiểm tra thông tin đăng nhập
  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $user_type = $user['user_type'];
    $full_name = $user['full_name'];
    // Đăng nhập thành công, tạo jwt
    if ($user_type == 'Admin') {
      $key = 'anhquan';
      $payload = [
        'user_name' => $user_name,
        'full_name' => $full_name,
        'exp' => time() + 36000
      ];
      $jwt = JWT::encode($payload, $key, 'HS256');
      setcookie("jwt", $jwt, time() + 36000, "/");
      header("Location: ../frontend/index.php");
      exit;
    } else {
    // Đăng nhập thất bại, hiển thị thông báo lỗi
      $_SESSION['error'] = 'Tài khoản không có quyền thực hiện tác vụ này';
      header('Location: ../frontend/auth/login.php');
    }
  } else {
    // Đăng nhập thất bại, hiển thị thông báo lỗi
    $_SESSION['error'] = 'Vui lòng kiểm tra lại thông tin';
    header('Location: ../frontend/auth/login.php');
  }
}
