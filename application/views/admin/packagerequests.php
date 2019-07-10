
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
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Requests       </li>
          </ul>
        </div>
      </div>
      <section>
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Table Package Requests   </h1>
          </header>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Requests</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="myTable" >
                    <!-- class="table table-striped table-sm" -->
                      <thead>
                        <tr>
                          <th>Id</th> 
                          <th>Company name</th> 
                          <th>Current Package</th>
                          <th>Requested Package</th>
                          <th>Requested Time</th>
                          <th>Charges</th>
                          <th>Price A/f Discount</th>
                          <th>Accepted Time</th>
                          <th>Action</th> 
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($allRequests as $request)
                      { 
                      ?>
                        <tr>
                          <th scope="row"><?php echo $request->id; ?></th>
                          <td><a href="#"><?php echo $request->company_name; ?></a></td>
                          <td><?php echo $request->current_package; ?></td>
                          <td><?php echo $request->requested_package; ?></td>
                          <td><?php echo $request->requested_at; ?></td>
                          <td><?php echo $request->charges; ?></td>
                          <td><?php echo $request->package_net_price; ?></td>
                          <td><?php echo $request->accepted_at; ?></td>
                          <td>
                            <?php
                                if($request->accepted_at == null)
                                {
                                    echo "<button type='button' class='btn btn-success pkgRequestBtn' value='approve_".$request->id."'>Accept</button>";
                                }
                                else
                                {
                                    echo "<button type='button' class='btn btn-danger pkgRequestBtn' value='block_".$request->id."'>Reject</button>";
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