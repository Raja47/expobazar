<div class="col-md-3 page-sidebar depth-1">
                    <aside>
                        <div class="inner-box">
                            <div class="user-panel-sidebar">
                                <div class="collapse-box">
                                	<a href="#home"  aria-expanded="true"  data-toggle="collapse" >
                                    <h5 class="collapse-title no-border"> Home
                                            
                                      <i class="fa fa-angle-down pull-right"></i>
                                            
                                    </h5>
                                    </a>

                                    <div class="panel-collapse collapse show" id="home">
                                        <ul class="acc-list">
                                            <li><a class="active" href="<?php echo base_url();?>user/accountHome"><i class="icon-home"></i>
                                                My Account </a></li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="collapse-box">
                                	<a href="#orders"  aria-expanded="true"  data-toggle="collapse" >
                                    <h5 class="collapse-title no-border"> Orders
                                            
                                      <i class="fa fa-angle-down pull-right"></i>
                                            
                                    </h5>
                                    </a>

                                    <div class="panel-collapse collapse" id="orders">
                                        <ul class="acc-list">
                                            <li><a  href="<?php echo base_url();?>user/orders">
                                                Orders History </a></li>
                                            <li><a href="<?php echo base_url();?>user/mycart">My Cart<span
                                                        class="badge purple-bg cart_count pull-right"></span></a></li> 
                                            <li><a href="<?php echo base_url();?>user/userWishList">My WishList<span
                                                        class="badge purple-bg pull-right">0</span></a></li> </a></li>


                                        </ul>
                                    </div>
                                </div>
                               	
                               <div class="collapse-box">
                                	<a href="<?php echo base_url();?>user/billing"   >
                                    <h5 class="collapse-title no-border"> Billing & Shipping
                                             
                                 
                                            
                                    </h5>
                                    </a>
                                </div>

                                <div class="collapse-box">
                                    <a href="<?php echo base_url(); ?>user/logout"><h5 class="collapse-title"> Logout </h5></a> 

        
                                </div>
                                <!-- /.collapse-box  -->
                            </div>
                        </div>
                        <!-- /.inner-box  -->

                    </aside>
                </div>
                <!--/.page-sidebar-->