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
               <div class="inner-box">
               
                  <div style="clear:both"></div>
                  <div class="col-md-12">
                     <div class="user-content">
                        <form action="" method="post">
                                                  
                           <div class="row">
                              <div class="col-md-6">
                                 <h3>Update Billing Address</h3>
                                 <hr>
                                 <div class="form-group  row required">
                                            <label class="col-md-4 control-label">House No. </label>

                                            <div class="col-md-6">
                                                <input name="hno" placeholder="House No" class="form-control input-md"
                                                        type="text">
                                            </div>
                                        </div>
                                        <div class="form-group  row required">
                                            <label class="col-md-4 control-label">Street </label>

                                            <div class="col-md-6">
                                                <input name="street" placeholder="Street" class="form-control input-md"
                                                     type="text">
                                            </div>
                                        </div>
                                    <div class="form-group  row required">
                                            <label class="col-md-4 control-label">City</label>
                                            <div class="col-md-6">
                                                <select name="city_id" class="form-control input-md ">
                                                    <?php foreach($pakCities as $city):?>
                                                    
                                                    <option value="<?php echo $city->id; ?>">
                                                        <?php echo $city->city_name?>
                                                    </option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group  row required">
                                            <label class="col-md-4 control-label">Zip Code </label>

                                            <div class="col-md-6">
                                                <input name="zipcode" placeholder="Zip Code" class="form-control input-md"
                                                     type="text">
                                            </div>
                                        </div>
                              </div>
                            <div class="col-md-6">
                                 <h3>Update Shipping Address</h3>
                                 <hr>
                                 <div class="form-group  row required">
                                            <label class="col-md-4 control-label">House No. </label>

                                            <div class="col-md-6">
                                                <input name="hno" placeholder="House No" class="form-control input-md"
                                                        type="text">
                                            </div>
                                        </div>
                                        <div class="form-group  row required">
                                            <label class="col-md-4 control-label">Street </label>

                                            <div class="col-md-6">
                                                <input name="street" placeholder="Street" class="form-control input-md"
                                                     type="text">
                                            </div>
                                        </div>
                                    <div class="form-group  row required">
                                            <label class="col-md-4 control-label">City</label>
                                            <div class="col-md-6">
                                                <select name="city_id" class="form-control input-md ">
                                                    <?php foreach($pakCities as $city):?>
                                                    
                                                    <option value="<?php echo $city->id; ?>">
                                                        <?php echo $city->city_name?>
                                                    </option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group  row required">
                                            <label class="col-md-4 control-label">Zip Code </label>

                                            <div class="col-md-6">
                                                <input name="zipcode" placeholder="Zip Code" class="form-control input-md"
                                                     type="text">
                                            </div>
                                        </div>
                              </div>
                           </div>
                           <input type="submit" class="btn btn-primary" value="Update" name="form1">
                        </form>
                     </div>
                  </div>
                  <div style="clear:both"></div>
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
<!-- Le javascript
   ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/vendors.min.js"></script>
<!-- include custom script for site  -->
<script src="assets/js/script.js"></script>
<?php
   include('userpanel_components/footer.php');
   
   
   ?>