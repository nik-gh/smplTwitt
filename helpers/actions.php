<?php
  include('./functions.php');

  if ($_GET['action'] == 'loginSignUp') {

    $error = '';

    if(!$_POST['email']) {
      $error = 'An email is required.';
    } else if(!$_POST['password']) {
      $error = 'A password is required.';
    } else if(filter_var($_POST['email'],
    FILTER_VALIDATE_EMAIL) === false) {
      $error = 'Enter a valid email';
    }

    if ($error !== '') {
      echo $error;
      exit();
    }

    if($_POST['loginActive'] == '0') {
      $escEmail = mysqli_real_escape_string($conn, $_POST['email']);
      $query = "SELECT * FROM users WHERE email = '$escEmail' LIMIT 1";
      $result = mysqli_query($conn, $query);
      if(mysqli_num_rows($result) > 0) {
        $error = 'That email is already taken';
      } else {
        $escPassword = mysqli_real_escape_string($conn, $_POST['password']);
        $query = "INSERT INTO users (`email`, `password`) VALUES ('$escEmail', '$escPassword')";
        if (mysqli_query($conn, $query)) {
          $_SESSION['id'] = mysqli_insert_id($conn);
          $id = $_SESSION['id'];
          $hashPass = md5(md5($_SESSION['id']).$_POST['password']);
          $query = "UPDATE users SET password = '$hashPass' WHERE id ='$id' LIMIT 1";
          mysqli_query($conn, $query);
        } else {
          $error = 'Couldn\'t create user';
        }
      }
    } else {
      $escEmail = mysqli_real_escape_string($conn, $_POST['email']);
      $query = "SELECT * FROM users WHERE email = '$escEmail' LIMIT 1";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_assoc($result);
      if ($row['password'] == md5(md5($row['id']).$_POST['password'])) {
        $_SESSION['id'] = $row['id'];
      } else {
        $error = 'Could not find that username or password';
      }
    }
    if ($error !== '') {
      echo $error;
      exit();
    }
  }

  if($_GET['action'] == 'toggleFollow') {
    $escId = mysqli_real_escape_string($conn, $_SESSION['id']);
    $escFId = mysqli_real_escape_string($conn, $_POST['userId']);
    $query = "SELECT * FROM isFollowing WHERE follower = '$escId' AND isFollowing = '$escFId' LIMIT 1";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $escRowId = mysqli_real_escape_string($conn, $row['id']);
      $query = "DELETE FROM isFollowing WHERE id = '$escRowId' LIMIT 1";
      mysqli_query($conn, $query);
      echo '1';
    } else {
      $escId = mysqli_real_escape_string($conn, $_SESSION['id']);
      $escFId = mysqli_real_escape_string($conn, $_POST['userId']);
      $query = "INSERT INTO isFollowing (follower, isFollowing) VALUES ('$escId', '$escFId')";
      mysqli_query($conn, $query);
      echo '2';
    }
  }

  if($_GET['action'] == 'postTweet') {
    if(!$_POST['tweetContent']) {
      echo 'Your tweet is empty';
    } else if(strlen($_POST['tweetContent']) > 300) {
      echo 'Your tweet is too long';
    } else {
      $escId = mysqli_real_escape_string($conn, $_SESSION['id']);
      $escTweet = mysqli_real_escape_string($conn, $_POST['tweetContent']);
      $query = "INSERT INTO tweets (`tweet`, `user_id`, `datetime`) VALUES ('$escTweet', '$escId', NOW())";
      mysqli_query($conn, $query);
      echo '1';
    }
  }
?>