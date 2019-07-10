<?php

 include('userpanel_components/header.php');
 include('userpanel_components/navbar.php');

?>

<div id="wrapper">
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-8 page-content depth-1">
                    <div class="inner-box category-content">
                            <h2 class="logo-title">
                                <i class="icon-user-add"></i> 
                                <!-- Original Logo will be placed here  -->
                                <span class="logo-icon"></span> Register<span> </span>
                            </h2> 
                            <hr>

                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form-horizontal" action="<?php echo base_url();?>user/signupbackend" onsubmit="return emptyVendor();" method='post' enctype="multipart/form-data">
                                    <fieldset>

                                         <h4 style="border-bottom: 1px solid #ddd;margin-bottom: 20px;">Personal Information</h4>
                                       
                                        <!-- Text input-->
                                        <div class="form-group  row required">
                                            <label class="col-md-4 control-label">First Name <sup>*</sup></label>

                                            <div class="col-md-6">
                                                <input name="fname" placeholder="First Name" class="form-control input-md"
                                                       required="" type="text">
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group  row required">
                                            <label class="col-md-4 control-label">Last Name <sup>*</sup></label>

                                            <div class="col-md-6">
                                                <input name="lname" placeholder="Last Name"
                                                       class="form-control input-md" type="text">
                                            </div>
                                        </div>

                                           <div class="form-group  row required">
                                            <label class="col-md-4 control-label">Date Of Birth <sup>*</sup></label>

                                            <div class="col-md-6">
                                                <input name="dob" 
                                                       class="form-control input-md" type="date">
                                            </div>
                                        </div>
                                        <div class="form-group  row required">
                                            <label for="inputEmail3" class="col-md-4 control-label">Email
                                                <sup>*</sup></label>

                                            <div class="col-md-6">
                                                <input type="email" class="form-control" id="inputEmail3"
                                                name="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group  row required">
                                            <label for="inputPassword3" class="col-md-4 control-label">Password</label>

                                            <div class="col-md-6">
                                                <input type="password" class="form-control" name="password" id="inputPassword3" required placeholder="Password">

                                                <p class="help-block">At least 5 characters
                                                    <!--Example block-level help text here.--></p>
                                            </div>
                                        </div>


                                        <!-- Text input-->
                                        <div class="form-group  row required">
                                            <label class="col-md-4 control-label">Phone Number <sup>*</sup></label>

                                            <div class="col-md-6">
                                                <input name="contact_num" placeholder= Phone Number"
                                                       required class="form-control input-md" type="number">

                                            </div>
                                        </div>

                                       <h4 style="border-bottom: 1px solid #ddd;margin-bottom: 20px;">Billing Information</h4>
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
                                                           
                                        <div class="form-group row">
                                            <label class="col-md-4 control-label"></label>

                                            <div class="col-md-8">
                                                <div class="termbox mb10">
                                                    <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                                        <input type="checkbox" class=" custom-control-input" required>
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description"> I have read and agree to the <a href="terms-conditions.html">Terms
                                                        & Conditions</a> </span>
                                                    </label>
                                                </div>
                                                <div style="clear:both"></div>
                                                <input type="submit"class="btn btn-primary" value='Register'></div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- page-content -->

                <div class="col-md-4 reg-sidebar">
                    <div class="reg-sidebar-inner text-center">
                        <div class="promo-text-box">
                            <img src="<?php echo base_url()?>/Uploads/images/icons/meet.svg" style="width:60px;">

                            <h3><strong>Free Memmbership</strong></h3>

                            <p> Post your free online classified ads with us. Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. </p>
                        </div>
                        <div class="promo-text-box"><img src="<?php echo base_url()?>/Uploads/images/icons/shopnow.svg" style="width:60px;">


                            <h3><strong>Shop & Manage Items</strong></h3>

                            <p> Nam sit amet dui vel orci venenatis ullamcorper eget in lacus.
                                Praesent tristique elit pharetra magna efficitur laoreet.</p>
                        </div>
                        <div class="promo-text-box"><img src="<?php echo base_url()?>/Uploads/images/icons/pay.svg" style="width:60px;">


                            <h3><strong>Secure Payment</strong></h3>

                            <p> PostNullam quis orci ut ipsum mollis malesuada varius eget metus.
                                Nulla aliquet dui sed quam iaculis, ut finibus massa tincidunt.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.main-container -->

  <?php 
     include('userpanel_components/footer-navigation.php');
    ?>

</div>
<!-- /.wrapper -->

<?php /*

<!-- Le javascript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="<?php echo base_url();?>assets/userpanel/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/userpanel/assets/js/vendors.min.js"></script>

<!-- include custom script for site  -->
<script src="<?php echo base_url();?>assets/userpanel/assets/js/script.js"></script>

<!-- Modal Change City -->
<!--
<div class="modal fade modalHasList" id="select-country" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title uppercase font-weight-bold" id="exampleModalLabel"><i class=" icon-map"></i> Select your region </h4>

				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
						class="sr-only">Close</span></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="row" style="padding: 0 20px">
						<ul class="cat-list col-sm-3 col-xs-6 ">
							<li>
								<span  class="flag-icon flag-icon-af"> </span>
								<a href="#AF">
									Afghanistan
								</a>
								<a href="#VN">
									Vietnam
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-ye"> </span>
								<a href="#YE">
									Yemen
								</a>
							</li>
						</ul>
						<ul class="cat-list col-sm-3 col-xs-6 ">
							<li>
								<span  class="flag-icon flag-icon-zm"> </span>
								<a href="#ZM">
									Zambia
								</a>
							</li>
							<li>
								<span  class="flag-icon flag-icon-zw"> </span>
								<a href="#ZW">
									Zimbabwe
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- /.modal -->
<!-- Modal Change City -->

<div class="modal fade modalHasList" id="selectRegion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel"><i class=" icon-map"></i> Select your region </h4>

				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
						class="sr-only">Close</span></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">

						<p>Popular cities in <strong>New York</strong>
						</p>

						<div style="clear:both"></div>
						<div class="col-sm-6 no-padding">
							<select class="form-control selecter  " id="region-state" name="region-state">
								<option value="">All States/Provinces</option>
								<option value="Alabama">Alabama</option>
								<option value="Alaska">Alaska</option>
								<option value="Arizona">Arizona</option>
								<option value="Arkansas">Arkansas</option>
								<option value="California">California</option>
								<option value="Colorado">Colorado</option>
								<option value="Connecticut">Connecticut</option>
								<option value="Delaware">Delaware</option>
								<option value="District of Columbia">District of Columbia</option>
								<option value="Florida">Florida</option>
								<option value="Georgia">Georgia</option>
								<option value="Hawaii">Hawaii</option>
								<option value="Idaho">Idaho</option>
								<option value="Illinois">Illinois</option>
								<option value="Indiana">Indiana</option>
								<option value="Iowa">Iowa</option>
								<option value="Kansas">Kansas</option>
								<option value="Kentucky">Kentucky</option>
								<option value="Louisiana">Louisiana</option>
								<option value="Maine">Maine</option>
								<option value="Maryland">Maryland</option>
								<option value="Massachusetts">Massachusetts</option>
								<option value="Michigan">Michigan</option>
								<option value="Minnesota">Minnesota</option>
								<option value="Mississippi">Mississippi</option>
								<option value="Missouri">Missouri</option>
								<option value="Montana">Montana</option>
								<option value="Nebraska">Nebraska</option>
								<option value="Nevada">Nevada</option>
								<option value="New Hampshire">New Hampshire</option>
								<option value="New Jersey">New Jersey</option>
								<option value="New Mexico">New Mexico</option>
								<option selected value="New York">New York</option>
								<option value="North Carolina">North Carolina</option>
								<option value="North Dakota">North Dakota</option>
								<option value="Ohio">Ohio</option>
								<option value="Oklahoma">Oklahoma</option>
								<option value="Oregon">Oregon</option>
								<option value="Pennsylvania">Pennsylvania</option>
								<option value="Rhode Island">Rhode Island</option>
								<option value="South Carolina">South Carolina</option>
								<option value="South Dakota">South Dakota</option>
								<option value="Tennessee">Tennessee</option>
								<option value="Texas">Texas</option>
								<option value="Utah">Utah</option>
								<option value="Vermont">Vermont</option>
								<option value="Virgin Islands">Virgin Islands</option>
								<option value="Virginia">Virginia</option>
								<option value="Washington">Washington</option>
								<option value="West Virginia">West Virginia</option>
								<option value="Wisconsin">Wisconsin</option>
								<option value="Wyoming">Wyoming</option>
							</select>
						</div>
						<div style="clear:both"></div>

						<hr class="hr-thin">
					</div>
					<div class="col-md-4">
						<ul class="list-link list-unstyled">
							<li><a href="#" title="">All Cities</a></li>
							<li><a href="#" title="Albany">Albany</a></li>
							<li><a href="#" title="Altamont">Altamont</a></li>
							<li><a href="#" title="Amagansett">Amagansett</a></li>
							<li><a href="#" title="Amawalk">Amawalk</a></li>
							<li><a href="#" title="Bellport">Bellport</a></li>
							<li><a href="#" title="Centereach">Centereach</a></li>
							<li><a href="#" title="Chappaqua">Chappaqua</a></li>
							<li><a href="#" title="East Elmhurst">East Elmhurst</a></li>
							<li><a href="#" title="East Greenbush">East Greenbush</a></li>
							<li><a href="#" title="East Meadow">East Meadow</a></li>

						</ul>
					</div>
					<div class="col-md-4">
						<ul class="list-link list-unstyled">
							<li><a href="#" title="Elmont">Elmont</a></li>
							<li><a href="#" title="Elmsford">Elmsford</a></li>
							<li><a href="#" title="Farmingville">Farmingville</a></li>
							<li><a href="#" title="Floral Park">Floral Park</a></li>
							<li><a href="#" title="Flushing">Flushing</a></li>
							<li><a href="#" title="Fonda">Fonda</a></li>
							<li><a href="#" title="Freeport">Freeport</a></li>
							<li><a href="#" title="Fresh Meadows">Fresh Meadows</a></li>
							<li><a href="#" title="Fultonville">Fultonville</a></li>
							<li><a href="#" title="Gansevoort">Gansevoort</a></li>
							<li><a href="#" title="Garden City">Garden City</a></li>


						</ul>
					</div>
					<div class="col-md-4">
						<ul class="list-link list-unstyled">
							<li><a href="#" title="Oceanside">Oceanside</a></li>
							<li><a href="#" title="Orangeburg">Orangeburg</a></li>
							<li><a href="#" title="Orient">Orient</a></li>
							<li><a href="#" title="Ozone Park">Ozone Park</a></li>
							<li><a href="#" title="Palatine Bridge">Palatine Bridge</a></li>
							<li><a href="#" title="Patterson">Patterson</a></li>
							<li><a href="#" title="Pearl River">Pearl River</a></li>
							<li><a href="#" title="Peekskill">Peekskill</a></li>
							<li><a href="#" title="Pelham">Pelham</a></li>
							<li><a href="#" title="Penn Yan">Penn Yan</a></li>
							<li><a href="#" title="Peru">Peru</a></li>

						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>  
<?php
*/
 include('userpanel_components/footer.php');
 

?>
<script src="<?php echo base_url();?>assets/js/custom/usersignup.js" >
    

</script>

</body>
</html>