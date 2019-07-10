
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
            <li class="breadcrumb-item"><a href="index.html">Products /Approved Products</a></li>
            <li class="breadcrumb-item active">Approved Products Table       </li>
          </ul>
        </div>
      </div>
      <section>
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Approved Products Table </h1>
          </header>
          <div class="row">
          
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Vendors Request </h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="myTable" >
                    <!-- class="table table-striped table-sm" -->
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>picture</th>
                          <th>Category</th>
                          <th>Vendor</th>
                          <th>City</th>
                          <th>Price</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php  foreach($approvedProducts as $prd ){ ?>
                          
                        <tr>
                          <th scope="row"><?php echo $prd->id; ?></th>
                          <td><?php echo $prd->title?></td>
                           <td><img src="<?php echo base_url().$prd->pic_location; ?>" width='60' height='60'></td>
                          <td><?php echo $prd->cat_name; ?></td>
                          <td><?php echo $prd->vendor_name; ?></td>
                          <td><?php echo $prd->city_name; ?></td>
                          <td><?php echo $prd->sale_price; ?></td>
                          
                          <td><?php if($prd->status == 1)
                                    {
                                         echo "Active";
                                    }
                                    elseif($prd->status == 0)
                                    {
                                        echo "Blocked";
                                    }
                              ?>
                          </td>
                          
                          <td>
                            <?php   if($prd->status == 1)
                                    {
                                         echo "<button type='button' class='btn btn-danger prdbtn' value='block_".$prd->id."_buyer'>Block</button>";
                                    }
                                    elseif($prd->status == 0)
                                    {     
                                          echo "<button type='button' class='btn btn-success prdbtn' value='approve_".$prd->id."_buyer'>Approve</button>";
                                          
                                         
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
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom/product_ajax.js"></script>
</body>
</html>   