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

  function time_since($since) {
      $chunks = array(
        array(60 * 60 * 24 * 365 , 'year'),
        array(60 * 60 * 24 * 30 , 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24 , 'day'),
        array(60 * 60 , 'hour'),
        array(60 , 'minute'),
        array(1 , 'second')
      );

      for ($i = 0, $j = count($chunks); $i < $j; $i++) {
          $seconds = $chunks[$i][0];
          $name = $chunks[$i][1];
          if (($count = floor($since / $seconds)) != 0) {
              break;
          }
      }

      $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
      return $print;
  }

  function displayTweets($type) {
    global $conn;
    if ($type == 'public') {
      $whereClause = '';
    } else if ($type == 'isFollowing') {
      $escId = mysqli_real_escape_string($conn, $_SESSION['id']);
      $query = "SELECT * FROM isFollowing WHERE follower = '$escId'";
      $result = mysqli_query($conn, $query);
      $whereClause = '';
      while($row = mysqli_fetch_assoc($result)) {
        if ($whereClause == '') {
          $rowId = $row['isFollowing'];
          $whereClause = "WHERE";
        } else {
          $whereClause .= " OR";
        }
        $whereClause .=  " user_id = '$rowId'";
      }
    } else if ($type == 'myTweets') {
      $escId = mysqli_real_escape_string($conn, $_SESSION['id']);
      $whereClause = "WHERE user_id ='$escId'";
    }


    $query = "SELECT * FROM tweets ".$whereClause." ORDER BY `datetime` DESC LIMIT 10";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 0) {
      echo 'No tweets to display';
    } else {
      while ($row = mysqli_fetch_assoc($result)) {
        $userQry = "SELECT `id`, `email` FROM users WHERE id = ".mysqli_real_escape_string($conn, $row['user_id'])." LIMIT 1";
        $userQryResult = mysqli_query($conn, $userQry);
        $user = mysqli_fetch_assoc($userQryResult);

        echo '<div class=\'tweet\'>';
        echo '<p>'.$user['email'].' <span class=\'time\'>'
        .time_since(time() - strtotime($row['datetime']))
        .' ago</span></p>';
        echo '<p>'.$row['tweet'].'</p>';
        echo '<p><a id=\'toggleFollow\' class=\'togFlw\' data-userId='.$row['user_id'].'>';

        $escId = mysqli_real_escape_string($conn, $_SESSION['id']);
        $escFId = mysqli_real_escape_string($conn, $row['user_id']);
        $isFollowingQuery = "SELECT * FROM isFollowing WHERE follower = '$escId' AND isFollowing = '$escFId' LIMIT 1";
        $isFollowingResult = mysqli_query($conn, $isFollowingQuery);
        if(mysqli_num_rows($isFollowingResult) > 0) {
          echo 'UnFollow';
        } else {
          echo 'Follow';
        }

        echo '</a></p>';
        echo '</div>';
      }
    }
  }

  function displaySearch() {
    echo '<div class="form-inline">
    <div class="form-group">
      <input type="text" class="form-control" id="search" placeholder="Search">
    </div>
    <button class="btn btn-primary">Search Tweets</button></div><hr>';
  }

  function displayTweetBox() {
    if (isset($_SESSION['id']) && $_SESSION['id'] > 0) {
      echo '<div id="tweetSuccess" class="alert alert-success">Your tweet was posted</div>
        <div id="tweetFail" class="alert alert-warning"></div>
        <div class="form-group">
          <textarea class="form-control" id="tweetContent"></textarea>
        </div>
        <button id="postTweetBtn" class="btn btn-primary">Post Tweet</button>';
    }
  }
?>