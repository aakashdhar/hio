<?php

  include 'core/init.php';


  if(isset($_COOKIE['hio_session_id'])) {
    $hio_session_id = $_COOKIE['hio_session_id'];
    $check_active = mysqli_query($con,"SELECT * FROM `tbl_session` WHERE `hio_session_id` = '$hio_session_id' AND `session_status` = 'active'");
    $row = mysqli_fetch_object($check_active);

    if (mysqli_num_rows($check_active) > 0) {
      echo "<script>alert('Welcome to hio blog')</script>";
      echo "<script>window.location.href = 'index.php'</script>";
    }
  }else {
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

          $today = date('Y-m-d');
          $sql_session = mysqli_query($con,"INSERT INTO `tbl_session`(`session_user_id`,`session_start_on`, `session_status`)
          VALUES ('$row->id','$today','active')");

          $_SESSION['username'] = $row->user_name;
          $_SESSION['userid'] = $row->id;
          $_SESSION['hio_session_id'] = $con->insert_id;
          $cookie_name = "hio_session_id";
          $cookie_value = $con->insert_id;
          setcookie($cookie_name, $cookie_value, time() + 2592000, "/");

          echo "<script>alert('Welcome to hio blog')</script>";
          echo "<script>window.location.href = 'index.php'</script>";
        }else{
          echo "<script>alert('The Username or password entered is incorrect')</script>";
        }

    }
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/signin/">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../hioadmin/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="dist/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- <script src="../../assets/js/ie-emulation-modes-warning.js"></script> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form action="" method="post" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="user_email" required autofocus autocomplete="off">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="user_password" required autocomplete="new-password">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
        <a href="../hioadmin/register.php" class="text-center">Register Membership</a>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
