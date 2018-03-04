<?php
  require_once('authentification.php');
  checkSessionOnLogin ();
?>
<form method="POST">
Login <input name="admin_user" type="text" required><br>
Password <input name="password" type="password" required><br>
<input name="submit" type="submit" value="Enter">
</form>