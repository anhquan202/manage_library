<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../head.php') ?>
    <link rel="stylesheet" href="login.css">

    <title>Login Form</title>
</head>

<body>

    <div class="login-container">
        <div class="msg-err">
            <?php if (isset($_SESSION['error'])) : ?>
                <?php echo $_SESSION['error']; ?>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

        </div>
        <h2>Đăng nhập</h2>
        <form action="../../backend/login.php" method="post">
            <div class="input-group">
                <label for="user_name">Username:</label>
                <input type="user_name" id="user_name" name="user_name" required placeholder="qcom">
            </div>
            <div class="input-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required placeholder="1234">
            </div>
            <button type="submit" class="btn-login">Đăng Nhập</button>
        </form>
    </div>
</body>

</html>