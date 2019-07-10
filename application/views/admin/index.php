<?php include('header.php');?>
    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner" style="width:100%">
            <div class="logo text-uppercase"><span>EXPO</span><strong class="text-primary">BAZAR</strong></div>
            
            <form method="get" class="text-left form-validate">
              <div class="form-group-material">
                <input id="login-username" type="text" name="loginUsername" required data-msg="Please enter your username" class="input-material">
                <label for="login-username" class="label-material">Username</label>
              </div>
              <div class="form-group-material">
                <input id="login-password" type="password" name="loginPassword" required data-msg="Please enter your password" class="input-material">
                <label for="login-password" class="label-material">Password</label>
              </div>
              <div class="form-group text-center"><a id="login" href="dashboard.php" class="btn btn-primary">Login</a>
                <!-- This should be submit button but I replaced it with <a> for demo purposes-->
              </div>
            </form><a href="#" class="forgot-pass">Forgot Password?</a><small>Do not have an account? </small><a href="register.php" class="signup">Signup</a>
          </div>
          <div class="copyrights text-center">
            <p>Design by <a href="" class="external">Ashok Kumar</a></p>
            
          </div>
        </div>
      </div>
    </div>
 
<?php include('footer.php');?>
</body>
</html>