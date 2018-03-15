<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/smplTwitt/">Twitter</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <?php if(isset($_SESSION['id'])/*  && $_SESSION['id'] */) { ?>
      <li class="nav-item">
        <a class="nav-link" href="?page=timeline">Your timeline</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=tweets">Your tweets</a>
      </li>
    <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="?page=publicProfiles">Public Profiles</a>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
      <?php if(isset($_SESSION['id'])/*  && $_SESSION['id'] */) { 
        /* echo $_SESSION['id']; */?>
        <a class="btn btn-outline-success my-2 my-sm-0" href="?function=logout">Logout</a>
      <?php } else { ?>
        <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal">Login/SignUp</button>
      <?php } ?>
    </div>
  </div>
</nav>
