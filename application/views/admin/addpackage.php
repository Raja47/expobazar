  <?php 
  include('header.php');
  include('navbar.php');
  ?>
  
    <div class="page">
      <!--- navbar -->
      <?php include('dashboard_header.php'); ?>
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Add Packages</li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <?php
        if(isset($error)){
      ?>    
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Hello Sir/Ma'm!</strong> <?php echo $error;?>
          </div>
     <?php   }
      ?>
      <?php
        if(isset($success)){
    ?>    
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Hello Sir/Ma'm!</strong> <?php echo $success;?>
          </div>
     <?php   }
      ?>


        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Package </h1>
          </header>
          <div class="row">

            <div class="col-lg-8 mx-10 ">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Package Form</h4>
                </div>
                <div class="card-body">
                  <p>Add the Packages .</p>
                  <form action="<?php echo base_url()?>admin/addpackageintodb" method="POST" enctype='multipart/form-data' >
                    
                    <div class="form-group">
                      <label>Package Title</label>
                      <input type="text" required name='pkgName' placeholder="Package Name/Title" class="form-control">
                    </div>
                    
                    <div class="form-group">
                      <label>Priority Ranking</label>
                      <input type="number" min='1' max='10' required name='pkgPriorityRanking' placeholder="Priority" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>No of Posts allowed</label>
                      <input type="Number" required name='pkgNoOfPosts' placeholder="Number Of Posts" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>No of Product Showcases</label>
                      <input type="Number" required name='pkgNoOfShowcases' placeholder="pkgNoOfShowcases" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Grading Tag</label>
                      <input type="Number" required name='pkgGradingTag' placeholder="Grading Tag" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Photos per Product</label>
                      <input type="Number" required name='pkgNoOfPhotos' placeholder="Number Product Photos" class="form-control">
                    </div>
                    <div class='form-group'>
                    	<label class="checkbox-inline">
                          <input id="pkgInqueryReply" name="pkgInquiryReply" type="checkbox" value="1"><strong> Inquiry Reply</strong>
                        </label><br/>
                        <label class="checkbox-inline">
                          <input id="pkgCustomiseAccount" name="pkgCustomiseAccount"  type="checkbox" value="1"><strong>  Cutomised Account</strong>
                        </label><br/>
                        <label class="checkbox-inline">
                          <input id="pkgCustomisedBumperOffer" name="pkgCustomisedBumperOffer" type="checkbox" value="1"><strong> Customised Bumper Offer</strong>
                        </label><br/>
                        <label class="checkbox-inline">
                          <input id="pkgProfileSlider" name="pkgProfileSlider" type="checkbox" value="1"><strong> Profile Slider</strong>
                        </label>
                    </div>  
                    <div class="form-group">
                      <label>Package Image</label>
                      <input type="file" required id='pkgImage' name='pkgImage' class="form-control"  accept="image/*" />
                    </div> 
                    <div class="form-group">
                      <label>Package Charges</label>
                      <input type="Number" required name='pkgCharges' placeholder="Charges" class="form-control">
                    </div> 
                    <div class="form-group">
                      <label>Discount Percentage</label>
                      <input type="Number" required name='pkgDiscountPercentage' placeholder="Discount in Percentage" class="form-control">
                    </div>
                    <div class="form-group">       
                      <input type="submit" value="Add Package"  name="addPkgSubmit" class="btn btn-primary">
                    </div>

                  </form>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
        </div>
        
  
       <div> 
      </section>
      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Your company &copy; 2017-2019</p>
            </div>
            <div class="col-sm-6 text-right">
              <p><a href="https://bootstrapious.com" class="external"></a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>
    </div>

 <?php include('footer.php');?>
 <script src="<?php echo base_url();?>assets/js/custom/category_ajax.js"></script> 
 </body>
</html>