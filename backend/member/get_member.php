<?php
require('config.php');
$user_id = isset($_GET['id']);
try {
  //code...
  if ($user_id) {
    $member_stmt = $conn->prepare("SELECT * FROM users WHERE user_id= ?");
    $member_stmt->bind_param('i', $user_id);
    $member_stmt->execute();
    $result = $member_stmt->get_result();

    if ($result->num_rows > 0) {
      $member_data = $result->fetch_assoc();
    } else {
      echo "No user found with the given ID.";
    }
  } else {
    $_SERVER['message'] = 'Not find User Id';
  }
} catch (\Throwable $th) {
  //throw $th;
  echo $th->getMessage();
}
