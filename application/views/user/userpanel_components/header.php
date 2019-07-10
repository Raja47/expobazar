
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- seo links to be set here -->

    <?php 
        if(isset($seo)){    
            foreach($seo as $pageseo){
                if($pageseo != null){
                    echo "<title> $pageseo->controller_and_method </title>";
                }
            }  
        }
        else{

            // put bey default tags for those pages which dont require dynamic seo , simply general for rest of pages  to be put here
        }  
    ?>    


    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>assets/userpanel/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>assets/userpanel/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/userpanel/ico/favicon.png">
   

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">


    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

    <!-- styles needed for carousel slider -->
    <link href="<?php echo base_url();?>assets/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/owl.theme.css" rel="stylesheet">
    <title>Expobazar</title>

   

    <!-- bxSlider CSS file -->
    <link href="<?php echo base_url();?>assets/css/jquery.bxslider.css" rel="stylesheet"/>

    <link href="<?php echo base_url();?>assets/css/sweetalert.css" rel="stylesheet"/>

    <script>
      //  paceOptions = {
      //      elements: true
      //  }
      var BASE_URL="<?php echo base_url(); ?>";
    </script>
    <script src="<?php echo base_url();?>assets/js/pace.min.js"></script>
    
</head>