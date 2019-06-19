<?php
  include 'core/init.php';

  session_destroy();
  $cookie_name = 'hio_session_id';

  $sql_update = mysqli_query($con,"UPDATE `tbl_session` SET `session_status` = 'inactive' WHERE `session_id` = $_COOKIE[$cookie_name]");
  unset($_COOKIE[$cookie_name]);
  // empty value and expiration one hour before
  $res = setcookie($cookie_name, '', time() - 2592000,'/');
  echo "<script>window.location.href = 'login.php'</script>";
?>
