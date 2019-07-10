
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="<?php echo base_url();?>assets/images/profile.png" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5"> <?php echo $this->session->userdata('adminname'); ?> </h2><span>Admin</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="<?php echo base_url();?>admin/index" class="brand-small text-center"> <img src="<?php echo base_url();?>assets/images/profile.png" alt="person" class="img-fluid rounded-circle"></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="<?php echo base_url();?>admin/index"> <i class="icon-home"></i>Home</a></li>
               
            <li><a href="#productDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Products</a>
              <ul id="productDropdown" class="collapse list-unstyled ">
                <li><a href="<?php echo base_url();?>admin/addProduct">Add Products</a></li>
                <li><a href="<?php echo base_url();?>admin/manageProduct">Manage Products</a></li>
                 <li><a href="<?php echo base_url();?>admin/pendingProducts">Pending Products</a></li>
                <li><a href="<?php echo base_url();?>admin/approvedProducts">Approved Products</a></li>
              </ul>
            </li>

            <li><a href="#orderDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Orders</a>
              <ul id="orderDropdown" class="collapse list-unstyled ">

                <li><a href="<?php echo base_url();?>admin/pendingOrders">Pending Orders</a></li>
                <li><a href="<?php echo base_url();?>admin/deliveredOrders">Delievered Orders</a></li>
                <li><a href="<?php echo base_url();?>admin/cancelledOrders">Cancelled Orders</a></li>
                <li><a href="<?php echo base_url();?>admin/refundOrders">Refund Orders</a></li>
              
              </ul>
            </li>



            <li><a href="#categoryDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Product Category</a>
              <ul id="categoryDropdown" class="collapse list-unstyled ">
                <li><a href="<?php echo base_url();?>admin/addCategory">Add Category/SubCategory</a></li>
                <li><a href="<?php echo base_url();?>admin/manageCategory">Manage Category</a></li>
                <li><a href="<?php echo base_url();?>admin/manageSubCategory">Manage Subcategory</a></li>
              </ul>
            </li>

            <li><a href="#usersDropDown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Users</a>
              <ul id="usersDropDown" class="collapse list-unstyled ">
                <li><a href="<?php echo base_url();?>admin/users">Buyers</a></li>
                <li><a href="<?php echo base_url();?>admin/siteusers">Site Users</a></li>
                <li><a href="#">All user</a></li>
              </ul>
            </li>

           <!--  <li><a href="#packageDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Packages</a>
              <ul id="packageDropdown" class="collapse list-unstyled ">
                <li><a href="<?php echo base_url();?>admin/add-package">Add package</a></li>
                <li><a href="<?php echo base_url();?>admin/packages">Packages data</a></li>
                <li><a href="<?php echo base_url();?>admin/packagerequests" >Package Requests</a></li>
              </ul>
            </li> -->
            
           <li><a href="#seoDropdown" aria-expanded="false" data-toggle="collapse"><i class="icon-interface-windows"></i>SEO</a>
              <ul id="seoDropdown" class="collapse list-unstyled ">
                      <li><a href="<?php echo base_url();?>admin/seoAdmin">SEO Admin</a></li>
                      <li><a href="<?php echo base_url();?>admin/viewAllProducts">SEO Producs</a></li>
              </ul>
            </li>     
            <li><a href="<?php echo base_url();?>admin/bannersettings"> <i class="icon-home"></i>Banner setting</a></li>       
            <!-- <li><a href="<?php echo base_url();?>admin/form"> <i class="icon-form"></i>Forms</a></li> -->
            <!-- <li><a href="<?php echo base_url();?>admin/users"> <i class="icon-grid"></i>New vendors</a></li> -->
            
            
          </ul>
        </div>
    
      </div>
    </nav>