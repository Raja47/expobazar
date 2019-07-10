
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
            <li class="breadcrumb-item active">Packages       </li>
          </ul>
        </div>
      </div>
      <section>
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Table Packages        </h1>
          </header>
          <div class="row">
          <!--  <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Basic Table</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>packagename</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Larry</td>
                          <td>the Bird</td>
                          <td>@twitter</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>     
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Striped Table</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>packagename</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Larry</td>
                          <td>the Bird</td>
                          <td>@twitter                            </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>   
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Striped table with hover effect</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>packagename</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Larry</td>
                          <td>the Bird</td>
                          <td>@twitter                            </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>  -->
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>packages Table</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="myTable" >
                    <!-- class="table table-striped table-sm" -->
                      <thead>
                        <tr>
                          <th>Id</th> 
                          <th>Name</th>
                          <th>Image</th> 
                          <th>Priority Ranking</th>
                          <th>Product Posts</th>
                          <th>Grading Tag</th>
                          <th>Product Showcases</th>
                          <th>Customized Account</th>
                          <th>Photos Per Product</th>
                          <th>Customize Bumber offer</th>
                          <th>Slider Pictures</th>
                          <th>Inquiry Reply</th>
                          <th>Charges</th>
                          <th>Discount%</th>
                          <th>Status</th>
                          <th>Action</th> 
                        </tr>
                      </thead>
                      <tbody>
                      <?php  foreach($allPackages as $package){ ?>
                          
                        <tr>
                          <th scope="row"><?php echo $package->id; ?></th>
                          <td><?php echo $package->package_name; ?></td>
                          <td><img src="<?php echo base_url().$package->pic_location; ?>" width='60' height='60'></td>
                          <td><?php echo $package->priority_ranking; ?></td>
                          <td><?php echo $package->product_posting; ?></td>
                          <td><?php echo $package->grading_tag; ?></td>
                          <td><?php echo $package->product_showcases; ?></td>
                          <td><?php echo $package->customized_account; ?></td>
                          <td><?php echo $package->photos_per_product; ?></td>
                          <td><?php echo $package->customize_bumber_offer; ?></td>
                          <td><?php echo $package->profile_slider_pictures; ?></td>
                          <td><?php echo $package->inquiry_reply; ?></td>
                          <td><?php echo $package->charges; ?></td>
                          <td><?php echo $package->discount_in_percentage; ?></td>
                          <td><?php if($package->status == 0)
                                    {
                                        echo "Inactive";
                                    }elseif($package->status == 1)
                                    {
                                        echo "Active";
                                    }

                              ?>
                          </td>

                          <td>
                            <?php
                                if($package->status == 0)
                                    {
                                         echo "<button type='button' class='btn btn-success packagebtn' value='approve_".$package->id."'>Active</button>";
                                    }
                                    elseif($package->status == 1)
                                    {
                                         echo "<button type='button' class='btn btn-danger packagebtn' value='block_".$package->id."'>Inactive</button>";
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
        </div>
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
 
   <?php 
   include('footer.php');

   ?>
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom/packages_ajax.js"></script>
</body>
</html>   