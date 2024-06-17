<?php
$list_member = include('../../backend/member/get_members.php');

?>
<button class="btn btn-create">Create new member</button>
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
            <button class="btn btn-edit">Edit</button>
            <button class="btn btn-del">Delete</button>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>