<?php include('header.php');?>

    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner" style="width: 100%">
            <div class="logo text-uppercase"><span>EXPO</span><strong class="text-primary">BAZAR</strong></div>
           
            <form class="text-left form-validate">
              <div class="form-group-material">
                <input id="register-username" type="text" name="registerUsername" required data-msg="Please enter your username" class="input-material">
                <label for="register-username" class="label-material">Username</label>
              </div>
              <div class="form-group-material">
                <input id="register-email" type="email" name="registerEmail" required data-msg="Please enter a valid email address" class="input-material">
                <label for="register-email" class="label-material">Email Address      </label>
              </div>
              <div class="form-group-material">
                <input id="register-password" type="password" name="registerPassword" required data-msg="Please enter your password" class="input-material">
                <label for="register-password" class="label-material">Password        </label>
              </div>
              <div class="form-group terms-conditions text-center">
                <input id="register-agree" name="registerAgree" type="checkbox" required value="1" data-msg="Your agreement is required" class="form-control-custom">
                <label for="register-agree">I agree with the terms and policy</label>
              </div>
              <div class="form-group text-center">
                <input id="register" type="submit" value="Register" class="btn btn-primary">
              </div>
            </form><small>Already have an account? </small><a href="<?php echo base_url();?>admin/login" class="signup">Login</a>
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