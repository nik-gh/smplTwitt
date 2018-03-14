    <footer class="footer">
      <div class="container">
        <p class="text-muted">&copy; 2018 SmplTwttr</p>
      </div>
    </footer>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="loginModalTitle">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="alert alert-danger" id="loginAlert"></div>
          <form>
            <input type="hidden" id="loginActive" name="loginActive" value="1">
            <div class="form-group">
              <label for="inputEmail">Email address</label>
              <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="inputPassword">Password</label>
              <input type="password" class="form-control" id="inputPassword" placeholder="Password">
            </div>
          </form>
          </div>
          <div class="modal-footer">
            <a id="toggleLogin">Sign Up</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="loginSignUpBtn">Login</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      $("#toggleLogin").click(function() {
        if ($("#loginActive").val() === "1") {
          $("#loginActive").val("0");
          $("#loginModalTitle").html("Sign Up");
          $("#loginSignUpBtn").html("Sign Up");
          $("#toggleLogin").html("Login");
        } else {
          $("#loginActive").val("1");
          $("#loginModalTitle").html("Login");
          $("#loginSignUpBtn").html("Login");
          $("#toggleLogin").html("Sign Up");
        }
      });

      $("#loginSignUpBtn").click(function() {
        let data = "email=" + $("#inputEmail").val() +
          "&password=" + $("#inputPassword").val() +
          "&loginActive=" + $("#loginActive").val();
        let url = "./helpers/actions.php?action=loginSignUp";
        $.ajax({
          type: "POST",
          url: url,
          data: data,
          success: function(result) {
            if (result == "") {
              window.location.assign("http://localhost/smplTwitt/");
            } else {
              $("#loginAlert").html(result).show();
            }
          }
        })
      });
    </script>

  </body>
</html>