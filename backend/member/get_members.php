<?php
require('config.php');
$list_member = array();
$query = 'SELECT * FROM users';
$result = $conn->query($query);
if ($result->num_rows){
  while($row = $result->fetch_assoc()){
    $list_member[] = $row; 
  }
}
return $list_member;

