<?php
  include 'core/init.php';
  if (isset($_SESSION['username'])) {
    echo "<script>window.location.href = 'index.php'</script>";
  }
  if (isset($_POST['submit'])) {
      $user_email = $_POST['user_email'];
      $user_password = $_POST['user_password'];
      $user_password = md5($user_password);

      $sql = "SELECT * FROM `tbl_user` WHERE `user_email` = '$user_email' AND `user_password` = '$user_password'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_object($result);

      if (mysqli_num_rows($result) > 0 ) {
        $sql_session = "SELECT * FROM `tbl_session` WHERE `session_user_id` = '$row->id' AND `session_status` = 'inactive'";
        $result_session = mysqli_query($con,$sql_session);

        if (mysqli_num_rows($result_session) > 0 ) {
          $today = date('Y-m-d');
          $sql_session = mysqli_query($con,"INSERT INTO `tbl_session`(`session_user_id`,`session_start_on`,
          `session_status`)VALUES ('$row->id','$today','active')");
          $cookie_name = "hio_session_id";
          $cookie_value = $con->insert_id;
          setcookie($cookie_name, $cookie_value, time() + 2592000, "/");
        }
        $_SESSION['username'] = $row->user_name;
        echo "<script>alert('Welcome to hio Admin Panel')</script>";
        echo "<script>window.location.href = 'index.php'</script>";
      }else{
        echo "<script>alert('The Username or password entered is incorrect')</script>";
      }

  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>hiO ! | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>hiO ! </b>Admin</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Enter email" name="user_email" required autofocus autocomplete="off">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Enter Password" name="user_password" required autocomplete="new-password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">

          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="register.php" class="text-center">Register Membership</a>
  </div>
  <!-- /.login-box-body -->

</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
