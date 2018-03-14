<?php
  session_start();

  $conn = mysqli_connect('localhost', 'root', 'root', 'smpltwttr');
  if (mysqli_connect_errno()) {
    print_r(mysqli_connect_errno());
    exit();
  }

  if (isset($_GET['function']) && $_GET['function'] == 'logout') {
    session_unset();
  }
?>