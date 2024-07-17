<div class="container">
  <?php
  $file_path =  realpath('message.php');
  require($file_path);
  ?>

  <h2>Registration Form</h2>
  <form action="/manage_library/backend/member/create_member.php" method="POST">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" required>
    </div>
    <div class="form-group">
      <label for="fullname">Fullname</label>
      <input type="text" id="fullname" name="fullname" required>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
      <label for="phone">Phone Number</label>
      <input type="tel" id="phone" name="phone" required>
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" id="address" name="address" required>
    </div>
    <div class="form-group">
      <label for="usertype">User Type</label>
      <select id="usertype" name="usertype" required>
        <option value="">Select User Type</option>
        <option value="admin">Admin</option>
        <option value="member">Member</option>
      </select>
    </div>
    <div class="form-group">
      <button type="submit">Submit</button>
    </div>
  </form>
</div>