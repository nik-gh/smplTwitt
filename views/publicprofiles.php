<div class="container mainContainer">
  <div class="row">
    <div class="col-md-8">

    <?php if(isset($_GET['userId']) && $_GET['userId']) { ?>
      <?php displayTweets($_GET['userId']); ?>
    <?php } else { ?>
      <h2>Active Users</h2>
      <?php displayUsers(); ?>
    <?php } ?>
    </div>
    <div class="col-md-4">
      <?php displaySearch(); ?>
      <?php displayTweetBox(); ?>
    </div>
  </div>
</div>
