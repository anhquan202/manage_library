<!-- Show message after handling tasks successfully -->
<?php
session_start();
$message = '';
if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
  unset($_SESSION['message']);
}
?>
<div style="color: red; width:auto">
  <?php if ($message) : ?>
    <?php echo $message ?>;
  <?php endif; ?>
</div>