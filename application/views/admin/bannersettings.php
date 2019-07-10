  <?php 
  include('header.php');
  include('navbar.php');
  ?>
  
    <div class="page">
      <!-- navbar-->
        <?php include('dashboard_header.php'); ?>
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Form </li>
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
            <strong>Holy guacamole!</strong> <?php echo $error;?>
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
            <strong>Holy guacamole!</strong> <?php echo $success;?>
          </div>
     <?php   }
      ?>


        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Forms </h1>
          </header>
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Add New Banner</h4>
                </div>
                <div class="card-body">
                  <p>Add Banners to renew Slider view.</p>
               



                  <form action="<?php echo base_url()?>admin/addBannerintoDb" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Description</label>
                      <input type="text" required name="title" placeholder="Short Description" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Banner Image</label>
                      <input type="file" required id='bannerImage' name='bannerImage' class="form-control"  accept="image/*" />
                    </div>
                    <div class="form-group">
                      <label>Placement In Slider</label>
                      <input type="Number" min='1' max='10'required name="orderNo" placeholder="Order Number" class="form-control">
                    </div>
                    <div class="form-group">       
                      <input type="submit" name="addBannerSubmit" value="Add Banner" class="btn btn-primary">
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
          <header> 
            <h1 class="h3 display">Table Banners   </h1>
          </header>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Banners</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="myTable" >
                    <!-- class="table table-striped table-sm" -->
                      <thead>
                        <tr>
                          <th>Id</th> 
                          <th>Title</th> 
                          <th>Image</th>
                          <th>Order No</th>
                          <th>status</th> 
                          <th>Action</th> 
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($allBanners as $banner)
                      { 
                      ?>
                        <tr>
                          <th scope="row"><?php echo $banner->id; ?></th>
                          <td><?php echo $banner->title; ?></td>
                          <td><img src="<?php echo base_url().$banner->pic_location ?>" width='60'  height='60'></td>
                          <td><?php echo $banner->order_no; ?></td>
                          <td>
                              <?php 
                                if($banner->status==0){
                                    echo 'disabled';
                                }else if($banner->status==1){
                                    echo 'enabled';
                                } 
                              ?>
                          </td>
                          <td>
                            <?php
                                if ($banner->status == 0)
                                {
                                    echo "
                                    <button type='button' class='btn btn-success bannerBtn' value='approve_".$banner->id."'>Accept</button>
                                    <button type='button' class='btn btn-primary bannerBtn' value='delete_".$banner->id."'>Delete</button> ";
                                }
                                elseif($banner->status=1)
                                {
                                    echo "<button type='button' class='btn btn-danger bannerBtn' value='block_".$banner->id."'>Reject</button>
                                    <button type='button' class='btn btn-primary bannerBtn' value='delete_".$banner->id."'>Delete</button>";
                                }       
                               ?>
                          </td>   
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
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
              <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>
    </div>

 <?php include('footer.php');?>
 <script src="<?php echo base_url();?>assets/js/custom/banner_ajax.js"></script> 
 </body>
</html>