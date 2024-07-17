<?php
session_start();
require('config.php');
try {
  //code...
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = htmlspecialchars($_POST['username']);
    $full_name = htmlspecialchars($_POST['fullname']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone_number = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $password = '1234';
    $user_type = htmlspecialchars($_POST['usertype']);

    // check email existence
    $check_email_stmt = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
    $check_email_stmt->bind_param("s", $email);
    $check_email_stmt->execute();
    $check_email_stmt->store_result();

    if ($check_email_stmt->num_rows > 0) {
      $_SESSION['message'] = 'Email already exists. Please use a different email.';
      header("Location: /manage_library/frontend/index.php?page=member/crud/create/create");
      exit();
    } else {
      $stmt = $conn->prepare("INSERT INTO users (user_name, full_name, email, phone_number, address, password, user_type) VALUES (?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("sssssss", $user_name, $full_name, $email, $phone_number, $address, $password, $user_type);

      if ($stmt->execute()) {
        $_SESSION['message'] = 'Create successfully';
        header("Location: /manage_library/frontend/index.php?page=member/member");
        exit();
      } else {
        $_SESSION['message'] = 'There was an error submitting the form';
        header("Location: /manage_library/frontend/index.php?page=member/crud/create/create");
        exit();
      }
    }
  }
} catch (\Throwable $th) {
  $_SESSION['message'] = "Error: " . $th->getMessage();
  header("Location: /manage_library/frontend/index.php?page=member/crud/create/create");
  exit();
}
