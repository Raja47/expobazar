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
                        <h2 class="title-2"><i class="icon-money"></i> View Transactions </h2>

                        <div style="clear:both"></div>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th><span> ID</span></th>
                                    
                                    <th><strong>Transaction ID</strong></th>
                                    <th> Payment Method</th>
                                    <th> Payment Date & Time</th>
                                    <th> Payment Status</th>
                                    <th> Detail </th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                
                             	<?php 
                             	foreach($orders as $order):  
                             	echo 
                             		
                                "<tr>
                                    <td>".$order->id."</td>
                                    <td> 
                                        <strong>".$order->transaction_id."</strong>
                                    </td>
                                    <td> 
                                        <strong>".$order->payment_method."</strong>
                                    </td>
                                    <td>".$order->created_at."</td>
                                    <td>
                                    ";
                                    if($order->status == '0')
                                    {
                                        echo "<span class='badge badge-danger'>Pending</span>
                                    </td>";

                                    }
                                    if($order->status == '1')
                                    {
                                         echo "<span class='badge badge-success'>Approved</span>
                                    </td>";
                                    }
                                    if($order->status == '2')
                                    {
                                         echo "<span class='label badge-warning'>Canceled</span>
                                    </td>";
                                    }
                                    if($order->id == '3')
                                    {
                                         echo "<span class='badge badge-info'>Refund Label</span>
                                    </td>";
                                    }
                                    
                                    echo "
                                    <td>
                                    	<a class='btn btn-success' href='".base_url()."user/order/".$order->order_id."'>
                                    	View Order
                                    </a>
                                    </td>
                                </tr>";
                                endforeach;
                                ?>
                                </tbody>
                            </table>
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