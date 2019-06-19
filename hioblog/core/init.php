<?php

  session_start();
  $con = mysqli_connect('localhost','','','master_db');

  if (!$con) {
    die('There was some issue connecting to the database we are trying to fix this ASAP');
  }


 ?>
