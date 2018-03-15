<?php
  include("./helpers/functions.php");
  include("./views/includes/header.php");
  include("./views/includes/navbar.php");
  if(isset($_GET['page']) && $_GET['page'] == 'timeline') {
    include("./views/timeline.php");
  } else if(isset($_GET['page']) && $_GET['page'] == 'tweets') {
    include("./views/mytweets.php");
  } else if(isset($_GET['page']) && $_GET['page'] == 'search') {
    include("./views/search.php");
  } else if(isset($_GET['page']) && $_GET['page'] == 'publicProfiles') {
    include("./views/publicprofiles.php");
  } else {
    include("./views/home.php");
  }
  
  include("./views/includes/footer.php");
?>