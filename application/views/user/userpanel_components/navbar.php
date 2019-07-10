<div class="header">
        <nav class="navbar fixed-top navbar-site navbar-light bg-light navbar-expand-md"
             role="navigation"  style="background-image: url('<?php echo base_url();?>Uploads/images/bg-two.jpg')">
            <div class="container ">

            <div class="navbar-identity">


                <a href="<?php echo base_url();?>user/" class="navbar-brand logo logo-title" style="color:#fff">
                 
      <img src="<?php echo base_url();?>Uploads/images/logo/logo.png" style="width:180px">
                </a>


                  <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggler pull-right"
                        type="button">

                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 30" width="30" height="30" focusable="false"><title>Menu</title><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"/></svg>


                </button>


                

            </div>



                <div class="navbar-collapse collapse">
                    
                    <ul class="nav navbar-nav ml-auto navbar-right">
                        <li class="nav-item"><a href="<?php echo base_url(); ?>user/index" class="nav-link">Home</a>
                        <li class="nav-item"><a href="<?php echo base_url(); ?>cat" class="nav-link"> All Categories</a>
                        <li class="nav-item"><a href="<?php echo base_url(); ?>user/aboutus" class="nav-link"> About Us</a>
                        <li class="nav-item"><a href="<?php echo base_url(); ?>user/contactus" class="nav-link"> Contact Us</a>
                      
        

                      <li class="nav-item">
                            <a href="#" id="cd-cart-trigger" class="btn btn-block black-bg nav-link"> <span class="fa fa-shopping-cart"></span> Cart <span class="badge badge-secondary cart_count">0</span></a>
                         
                        </li>
                        
                        <?php if($this->session->userdata('userlogin')): ?> 
                         <li class="dropdown no-arrow nav-item"><a href="<?php echo base_url(); ?>#" class="dropdown-toggle nav-link" data-toggle="dropdown">

                            <span><?php echo $this->session->userdata('username'); ?></span> <i class="fa fa-user"></i></a>
                            <ul  class="dropdown-menu user-menu dropdown-menu-right">
                                <li class="active dropdown-item"><a href="<?php echo base_url(); ?>user/accountHome"><i class="icon-home"></i> Profile

                                </a>
                                </li>
                                <?php if($this->session->userdata('role')=='vendor'):?>
                                <li class="dropdown-item"><a href="<?php echo base_url(); ?>user/accountMyPrds"><i class="icon-th-thumb"></i> My Orders </a>
                                </li>
                               <!--  <li class="dropdown-item">
                                    <a href="<?php echo base_url(); ?>user/accountPendingApprovalAds"><i class="icon-hourglass"></i> Pending approval </a>
                                </li> -->
                                <?php elseif($this->session->userdata('role')=='buyer'):?>
                                <li class="dropdown-item"><a href="<?php echo base_url(); ?>user/userWishList"><i class="icon-th-thumb"></i> Wishlist </a>
                                </li>
                                <?php endif; ?>
                                <li class="dropdown-item">
                                    <a href="<?php echo base_url(); ?>user/orders"><i class=" icon-money "></i> Orders  
                                    </a>
                                </li>
                                
                                <li class="dropdown-item">
                                    <a href="<?php echo base_url(); ?>user/logout"><i class=" icon-logout "></i> Log out </a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if($this->session->userdata('role')=='vendor'):?>

                        <!-- <li class="px-1 nav-item"><a class="btn btn-block btn-border black-bg nav-link btn-sm" href="<?php echo base_url();?>user/postAds">Post Your Product</a>
                        </li> -->
                    <?php endif; ?>
                        <?php 
                            if(!$this->session->userdata('userlogin')): 
                        ?>    
                        
                        <li class="px-1 nav-item"><a href="<?php echo base_url();?>user/login" class="btn btn-block  purple-bg nav-link"><i class="icon-user fa"></i> Login</a>
                        </li>
                        
                        <li class="px-1 nav-item"><a href="<?php echo base_url();?>user/signup" class="btn btn-block purple-bg nav-link"><i class="icon-user fa"></i> SignUp</a>
                        </li>

                       
                         
                        <?php endif; ?>

                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
  
</div>


<div id="cd-shadow-layer"></div>

    <div id="cd-cart">
       <!--  <div class="row pri-bg">
            <div class="col-md-12">
                <h2 style="color:#fff">Cart</h2>
            </div>
        </div>
        
        <div id="detail_cart">
            

        </div>
           
        <div class="row pri-bg">
            <div class="col-md-12">
                <a href="#" class="btn btn-block pri-bg btn-success">Checkout</a>
            </div>
        </div>  -->
        
         <div class="card shopping-cart" style="padding:0px;">
            <div class="card-header pri-bg text-light black-color" style="padding-top: 20px;">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                Shipping cart
                <a href="<?php echo base_url()?>cat" class="btn   pull-right purple-bg">Continiu shopping</a>
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                    <!-- PRODUCT -->
            
               <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Items</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="detail_cart">
                    <tr>
                        <td colspan="6" class="text-center">
                            <i class="fa fa-refresh fa-spin" style="font-size:24px"></i>
                        </td>
                    </tr>
                </tbody>
                
            </table>
                 
               
            </div>
            
        </div>
        

    </div> <!-- cd-cart -->