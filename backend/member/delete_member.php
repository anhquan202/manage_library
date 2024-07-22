<?php
session_start();
require('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
  $user_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
  if ($user_id) {
    try {
      $stmt = $conn->prepare("DELETE FROM users WHERE user_id = ?");
      $stmt->bind_param('i', $user_id);

      if ($stmt->execute()) {
        http_response_code(200);
        echo json_encode(['message' => 'Member deleted successfully']);
      } else {
        http_response_code(500);
        echo json_encode(['message' => 'Failed to delete member']);
      }
      $stmt->close();
    } catch (Exception $e) {
      http_response_code(500);
      echo json_encode(['message' => $e->getMessage()]);
    }
  } else {
    http_response_code(400);
    echo json_encode(['message' => 'Invalid member ID']);
  }
} else {
  http_response_code(405);
  echo json_encode(['message' => 'Method not allowed']);
}
