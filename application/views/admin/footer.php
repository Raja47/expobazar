  <!-- JavaScript files--> 
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/js/popper.min.js"> </script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.cookie.js"> </script>

    <script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    
    <!-- Main File-->
    <script src="<?php echo base_url();?>assets/js/front.js"></script>
   <script type="text/javascript" charset="utf8" src="<?php echo base_url();?>assets/js/jquery-datatable.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                stateSave:true
            });

            $('#mysubTable').DataTable();

        } );
    </script>
