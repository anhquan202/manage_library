<?php
session_start();
require('config.php');

try {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = intval($_POST['user_id']); // Lấy ID người dùng từ form
    $user_name = htmlspecialchars($_POST['username']);
    $full_name = htmlspecialchars($_POST['fullname']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone_number = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $password = '1234';
    $user_type = htmlspecialchars($_POST['usertype']);

    // Lấy email hiện tại của người dùng
    $current_email_stmt = $conn->prepare("SELECT email FROM users WHERE user_id = ?");
    $current_email_stmt->bind_param("i", $user_id);
    $current_email_stmt->execute();
    $current_email_stmt->bind_result($current_email);
    $current_email_stmt->fetch();
    $current_email_stmt->close();

    // Kiểm tra sự tồn tại của email mới nếu khác với email hiện tại
    if ($email !== $current_email) {
      $check_email_stmt = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
      $check_email_stmt->bind_param("s", $email);
      $check_email_stmt->execute();
      $check_email_stmt->store_result();

      if ($check_email_stmt->num_rows > 0) {
        $_SESSION['message'] = 'Email already exists. Please use a different email.';
        header("Location: /manage_library/frontend/index.php?page=member/update/update&id={$user_id}");
        exit();
      }
      $check_email_stmt->close();
    }

    // Cập nhật thông tin người dùng
    $stmt = $conn->prepare("UPDATE users SET user_name = ?, full_name = ?, email = ?, phone_number = ?, address = ?, password = ?, user_type = ? WHERE user_id = ?");
    $stmt->bind_param("sssssssi", $user_name, $full_name, $email, $phone_number, $address, $password, $user_type, $user_id);

    if ($stmt->execute()) {
      $_SESSION['message'] = 'Update successfully';
      header("Location: /manage_library/frontend/index.php?page=member/member");
      exit();
    } else {
      $_SESSION['message'] = 'There was an error submitting the form';
      header("Location: /manage_library/frontend/index.php?page=member/update/update&id={$user_id}");
      exit();
    }
  }
} catch (Throwable $th) {
  $_SESSION['message'] = "Error: " . $th->getMessage();
  header("Location: /manage_library/frontend/index.php?page=member/update/update&id={$user_id}");
  exit();
}
