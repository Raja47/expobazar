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
                        <h2 class="title-2"><span class="fa fa-shopping-cart"></span> My Cart </h2>

                        <div style="clear:both"></div>

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