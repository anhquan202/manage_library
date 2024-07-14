<?php
// $list_member = include __DIR__ . '../../backend';
$file_to_include = __DIR__ . '/../../backend/member/get_members.php';
$real_path = realpath($file_to_include);

if ($real_path && file_exists($real_path)) {
  $list_member = include $real_path;
} else {
  echo 'File not found: ' . $real_path . '<br>';
}
?>
<button class="btn btn-create" onclick="loadContent('member/crud/create/create')">
  Create new account
</button>
<div class="table-wrapper">
  <table class="list-member">
    <thead>
      <tr>
        <th>Index</th>
        <th>Username</th>
        <th>Fullname</th>
        <th>Email</th>
        <th>Phone number</th>
        <th>Address</th>
        <th>User Type</th>
        <th>Registration date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($list_member as $index => $member) : ?>
        <tr>
          <td><?php echo htmlspecialchars($index + 1); ?></td>
          <td><?php echo htmlspecialchars($member['user_name']); ?></td>
          <td><?php echo htmlspecialchars($member['full_name']); ?></td>
          <td><?php echo htmlspecialchars($member['email']); ?></td>
          <td><?php echo htmlspecialchars($member['phone_number']); ?></td>
          <td><?php echo htmlspecialchars($member['address']); ?></td>
          <td><?php echo htmlspecialchars($member['user_type']); ?></td>
          <td><?php echo htmlspecialchars($member['registration_date']); ?></td>
          <td>
            <button class="btn btn-edit"><a href="#">Edit</a></button>
            <button class="btn btn-del"><a href="#">Delete</a></button>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>