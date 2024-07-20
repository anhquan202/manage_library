<?php
$file_to_include = __DIR__ . '/../../../backend/member/get_member.php';
$real_path = realpath($file_to_include);

include $real_path;
?>

<div class="container">
  <h2>Update Member</h2>
  <form action="/manage_library/backend/member/edit_member.php" method="POST">
    <input type="hidden" id="userid" name="userid" value="<?php echo htmlspecialchars($member_data['user_id']) ?>">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" required value="<?php echo htmlspecialchars($member_data['user_name']) ?>">
    </div>
    <div class="form-group">
      <label for="fullname">Fullname</label>
      <input type="text" id="fullname" name="fullname" required value="<?php echo htmlspecialchars($member_data['full_name']) ?>">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($member_data['email']) ?>">
    </div>
    <div class="form-group">
      <label for="phone">Phone Number</label>
      <input type="tel" id="phone" name="phone" required value="<?php echo htmlspecialchars($member_data['phone_number']) ?>">
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" id="address" name="address" required value="<?php echo htmlspecialchars($member_data['address']) ?>">
    </div>
    <div class="form-group">
      <label for="usertype">User Type</label>
      <select id="usertype" name="usertype" required>
        <option value="admin" <?php echo $member_data['user_type'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
        <option value="member" <?php echo $member_data['user_type'] == 'member' ? 'selected' : ''; ?>>Member</option>
      </select>
    </div>
    <div class="form-group">
      <button type="submit">Submit</button>
    </div>
  </form>
</div>