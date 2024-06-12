<?php
require_once("../vendor/autoload.php");

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

session_start();

$key = 'anhquan';

// Kiểm tra xem cookie 'jwt' có tồn tại hay không
if (isset($_COOKIE['jwt'])) {
  $jwt = $_COOKIE['jwt'];
  try {
    // Giải mã JWT
    $decoded = JWT::decode($jwt, new Key($key, 'HS256'));

    // Truy cập thông tin từ payload của JWT
    $user_name = $decoded->user_name;
    $full_name = $decoded->full_name;
    $exp = $decoded->exp;

    // Kiểm tra xem token có hết hạn không
    if (time() > $exp) {
      echo "JWT đã hết hạn. Vui lòng đăng nhập lại.";
      // Xóa cookie JWT
      setcookie("jwt", "", time() - 3600, "/");
      // Có thể chuyển hướng người dùng đến trang đăng nhập
      header("Location: ../frontend/auth/login.php");
      exit;
    }
  } catch (Exception $e) {
    // Xử lý lỗi nếu JWT không hợp lệ hoặc giải mã thất bại
    echo "Lỗi: " . $e->getMessage();
    header("Location: ../frontend/auth/login.php");
    exit;
  }
} else {
  echo "Không tìm thấy JWT trong cookie. Vui lòng đăng nhập.";
  // Có thể chuyển hướng người dùng đến trang đăng nhập
  header("Location: ../frontend/auth/login.php");
  exit;
}
?>
<div class="header">
  <div class="logo">
    <a href="">
      <img src="../assets/logo512.png" alt="">
    </a>
  </div>
  <div class="user-info">
    <div class="dropdown">
      <div class="dropdown-group">
        <img src="../assets/avatar.png" alt="Avatar" class="avatar">
        <button class="dropdown-button">Tùy chọn</button>
      </div>
      <div class="dropdown-content">
        <span class="username"><?php echo htmlspecialchars($full_name); ?></span>
        <a href="change_password.php">Đổi mật khẩu</a>
        <a href="logout.php">Logout</a>
      </div>
    </div>
  </div>
</div>
<script>
  const dropdown_button = document.querySelector('.dropdown-button');
  const dropdown_content = document.querySelector('.dropdown-content');
  dropdown_button.addEventListener('click', () => {
    dropdown_content.classList.toggle('isOpen');
    event.stopPropagation();
  })
  document.addEventListener('click', (event) => {
    if (dropdown_content.classList.contains('isOpen') && !dropdown_content.contains(event.target) && !dropdown_button.contains(event.target)) {
      dropdown_content.classList.remove('isOpen');
    }
  });
</script>