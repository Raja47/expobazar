

<?php  include('header.php');?>
    

    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner" style="width:100%">
            <div class="logo text-uppercase"><span>EXPO</span><strong class="text-primary">BAZAR</strong></div>
            
            <form  action="<?php echo base_url();?>admin/adminLoginAttempt" method="post" class="text-left">
              <div class="form-group-material">
                <input id="login-email" type="text" name="loginEmail" required data-msg="Please enter your email" class="input-material">
                <label for="login-username" class="label-material">Username</label>
              </div>
              <div class="form-group-material">
                <input id="login-password" type="password" name="loginPassword" required data-msg="Please enter your password" class="input-material">
                <label for="login-password" class="label-material">Password</label>
              </div>
              <div class="form-group-material text-center">
                <input type='submit' id="loginadmin" name='loginadmin' value='login' class='btn btn-primary' />
                <!-- This should be submit button but I replaced it with <a> for demo purposes-->
              </div>
            </form><a href="" class="forgot-pass">Forgot Password?</a><small>Do not have an account? </small><a href="<?php echo base_url();?>admin/register" class="signup">Signup</a>
          </div>
          <div class="copyrights text-center">
            <p>Design by <a href="#" class="external">Ashok Kumar</a></p>
            
          </div>
        </div>
      </div>
    </div>
 
<?php include('footer.php');  ?>
</body>
</html>
