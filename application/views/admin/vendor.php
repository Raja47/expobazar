
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
            <li class="breadcrumb-item active">vendor's Table       </li>
          </ul>
        </div>
      </div>
      <section>
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Vendor's Table </h1>
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
                          <th>Role</th>
                          <th>Email</th>
                          <th>City</th>
                          <th>Vendor Info</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php  foreach($allUsers as $user){ ?>
                          
                        <tr>
                          <th scope="row"><?php echo $user->id; ?></th>
                          <td><?php echo $user->first_name." ".$user->last_name ?></td>
                          <td><?php echo $user->role_name; ?></td>
                          <td><?php echo $user->email; ?></td>
                          <td><?php echo $user->city_name; ?></td>
                          <td><a href="<?php echo base_url();?>admin/user/<?php echo $user->company_name ?>_<?php echo $user->id;?>"><?php echo $user->company_name; ?> </a></td>
                          <td><?php if($user->status == 0)
                                    {
                                         echo "Disabled";
                                    }
                                    elseif($user->status == 1)
                                    {
                                        echo "Approved";
                                    }
                                    

                              ?>
                          </td>
                          
                          <td>
                            <?php
                                if($user->status == 0)
                                    {
                                      echo "<button type='button' class='btn btn-success userbtn' value='approve_".$user->id."_vendor'>Approve</button>
                                           ";
                                    }
                                    elseif($user->status == 1)
                                    {
                                         echo "<button type='button' class='btn btn-danger userbtn' value='block_".$user->id."_vendor'>Block</button>";
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
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/users_ajax.js"></script>
</body>
</html>   