<?php
   include('userpanel_components/header.php');
   include('userpanel_components/navbar.php');
   
   ?>
<div id="wrapper">
   <div class="main-container">
      <div class="container">
         <div class="row">
            <?php include('userpanel_components/account-asside.php'); ?>
            <div class="col-md-9 page-content">
               <div class="inner-box depth-1">
                  <div class="row">
                     <div class="col-md-5 col-xs-4 col-xxs-12">
                        <h3 class="no-padding text-center-480 useradmin"><a href=""><img class="userImg"
                           src="<?php echo base_url()?>Uploads/images/icons/profile.svg"
                           alt="user"> <?php echo $this->session->userdata('username');?>
                           </a>
                        </h3>
                     </div>
                  </div>
               </div>
               <div class="inner-box depth-1" >
                  <div id="accordion" class="panel-group">
                     <div class="card card-default">
                        <div class="card-header">
                           <h4 class="card-title"><a href="#collapseB1" aria-expanded="true"  data-toggle="collapse" > Profile </a></h4>
                        </div>
                        <div class="panel-collapse collapse show" id="collapseB1">
                           <?php foreach($userinfo as $user): ?>
                           <div class="card-body">
                              <?php
                                 if(isset($success)){
                                 ?>    
                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                                 <strong>Dear Customer!</strong> <?php echo $success;?>
                              </div>
                              <?php   }
                                 ?><?php
                                 if(isset($error)){ ?>    
                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                                 <strong></strong> <?php echo $error;?>
                              </div>
                              <?php   } ?>
                              <form class="form-horizontal" action="<?php echo base_url();?>user/updateUser" method='post' role="form">
                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">First name</label>
                                    <div class="col-sm-9">
                                       <input type="text" name='fname' class="form-control" value="<?php echo $user->first_name; ?>" >
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">Last name</label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control" name='lname' value="<?php echo $user->last_name; ?>">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                       <input type="email" class="form-control" name='email'
                                          value="<?php echo $user->email; ?>">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="Phone" class="col-sm-3 control-label">Number</label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control" name='num' id="Phone"
                                          value="<?php echo $user->contact_num?>">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9"></div>
                                 </div>
                                 <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                       <input type="submit" name='update' class="btn btn-default" value='Update' >
                                    </div>
                                 </div>
                              </form>
                              <?php endforeach; ?>
                           </div>
                        </div>
                     </div>
                     <div class="card card-default">
                        <div class="card-header">
                           <h4 class="card-title"><a href="#collapseB2" aria-expanded="true"  data-toggle="collapse" > Update Password </a>
                           </h4>
                        </div>
                        <div class="panel-collapse collapse" id="collapseB2">
                           <div class="card-body">
                              <form class="form-horizontal" role="form">
                                 <div class="form-group">
                                    <div class="col-sm-12">
                                       <div class="checkbox">
                                          <label>
                                          <input type="checkbox">
                                          Comments are enabled on my ads </label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">New Password</label>
                                    <div class="col-sm-9">
                                       <input type="password" class="form-control" placeholder="">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">Confirm Password</label>
                                    <div class="col-sm-9">
                                       <input type="password" class="form-control" placeholder="">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                       <button type="submit" class="btn btn-default">Update</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--/.row-box End-->
               </div>
            </div>
            <!--/.page-content-->
         </div>
         <!--/.row-->
      </div>
      <!--/.container-->
   </div>
   <!-- /.main-container -->
   <?php 
      include('userpanel_components/footer-navigation.php');
      ?>
   <!--/.footer-->
</div>
<!-- /.wrapper --> 

<?php
   include('userpanel_components/footer.php');
   ?>