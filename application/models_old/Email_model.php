<?php
class Email_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    	$this->load->library('email');
    }

    function sendProductEmail($prdinfo){
       
    // Note: no $config param needed 
      //email configuration   
        
    	 
        //formdata
         $mailername=$this->input->post('mailername');
    		 $maileremail=$this->input->post('maileremail');
    		 $mailermsg=$this->input->post('mailermsg');
         $mailernum=$this->input->post('mailernum');
	   
        //our formatted email message 
        foreach($prdinfo as $prd):
        
        $message = 
        '
          <head>
            <style type="text/css">
              html { background-color:#E1E1E1; margin:0; padding:0; }
              body, #bodyTable, #bodyCell, #bodyCell{height:100% !important; margin:0; padding:0; width:100% !important;font-family:Helvetica, Arial, "Lucida Grande", sans-serif;}
              table{border-collapse:collapse;}
              table[id=bodyTable] {width:100%!important;margin:auto;max-width:500px!important;color:#7A7A7A;font-weight:normal;}
              img, a img{border:0; outline:none; text-decoration:none;height:auto; line-height:100%;}
              a {text-decoration:none !important;border-bottom: 1px solid;}
              h1, h2, h3, h4, h5, h6{color:#5F5F5F; font-weight:normal; font-family:Helvetica; font-size:20px; line-height:125%; text-align:Left; letter-spacing:normal;margin-top:0;margin-right:0;margin-bottom:10px;margin-left:0;padding-top:0;padding-bottom:0;padding-left:0;padding-right:0;}
              .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} 
              .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height:100%;}
              table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;} 
              #outlook a{padding:0;} 
              img{-ms-interpolation-mode: bicubic;display:block;outline:none; text-decoration:none;} resized images. */
              body, table, td, p, a, li, blockquote{-ms-text-size-adjust:100%; -webkit-text-size-adjust:100%; font-weight:normal!important;} 
              .ExternalClass td[class="ecxflexibleContainerBox"] h3 {padding-top: 10px !important;} 
              h1{display:block;font-size:26px;font-style:normal;font-weight:normal;line-height:100%;}
              h2{display:block;font-size:20px;font-style:normal;font-weight:normal;line-height:120%;}
              h3{display:block;font-size:17px;font-style:normal;font-weight:normal;line-height:110%;}
              h4{display:block;font-size:18px;font-style:italic;font-weight:normal;line-height:100%;}
              .flexibleImage{height:auto;}
              .linkRemoveBorder{border-bottom:0 !important;}
              table[class=flexibleContainerCellDivider] {padding-bottom:0 !important;padding-top:0 !important;}
              body, #bodyTable{background-color:#E1E1E1;}
              #emailHeader{background-color:#E1E1E1;}
              #emailBody{background-color:#FFFFFF;}
              #emailFooter{background-color:#E1E1E1;}
              .nestedContainer{background-color:#F8F8F8; border:1px solid #CCCCCC;}
              .emailButton{background-color:#205478; border-collapse:separate;}
              .buttonContent{color:#FFFFFF; font-family:Helvetica; font-size:18px; font-weight:bold; line-height:100%; padding:15px; text-align:center;}
              .buttonContent a{color:#FFFFFF; display:block; text-decoration:none!important; border:0!important;}
              .emailCalendar{background-color:#FFFFFF; border:1px solid #CCCCCC;}
              .emailCalendarMonth{background-color:#205478; color:#FFFFFF; font-family:Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; padding-top:10px; padding-bottom:10px; text-align:center;}
              .emailCalendarDay{color:#205478; font-family:Helvetica, Arial, sans-serif; font-size:60px; font-weight:bold; line-height:100%; padding-top:20px; padding-bottom:20px; text-align:center;}
              .imageContentText {margin-top: 10px;line-height:0;}
              .imageContentText a {line-height:0;}
              #invisibleIntroduction {display:none !important;}
              span[class=ios-color-hack] a {color:#275100!important;text-decoration:none!important;} 
              span[class=ios-color-hack2] a {color:#205478!important;text-decoration:none!important;}
              span[class=ios-color-hack3] a {color:#8B8B8B!important;text-decoration:none!important;}
              .a[href^="tel"], a[href^="sms"] {text-decoration:none!important;color:#606060!important;pointer-events:none!important;cursor:default!important;}
              .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {text-decoration:none!important;color:#606060!important;pointer-events:auto!important;cursor:default!important;}
              @media only screen and (max-width: 480px){
                body{width:100% !important; min-width:100% !important;} 
                table[id="emailHeader"],
                table[id="emailBody"],
                table[id="emailFooter"],
                table[class="flexibleContainer"],
                td[class="flexibleContainerCell"] {width:100% !important;}
                td[class="flexibleContainerBox"], td[class="flexibleContainerBox"] table {display: block;width: 100%;text-align: left;}
                td[class="imageContent"] img {height:auto !important; width:100% !important; max-width:100% !important; }
                img[class="flexibleImage"]{height:auto !important; width:100% !important;max-width:100% !important;}
                img[class="flexibleImageSmall"]{height:auto !important; width:auto !important;}
                table[class="flexibleContainerBoxNext"]{padding-top: 10px !important;}
                table[class="emailButton"]{width:100% !important;}
                td[class="buttonContent"]{padding:0 !important;}
                td[class="buttonContent"] a{padding:15px !important;}

              }
            </style>
          </head>

          <body bgcolor="#E1E1E1" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
            <center style="background-color:#E1E1E1;">
              <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="table-layout: fixed;max-width:100% !important;width: 100% !important;min-width:100% !important;>
                <tr>
                  <td align="center" valign="top" id="bodyCell">

                    <table bgcolor="#FFFFFF"  border="0" cellpadding="0" cellspacing="0" width="500" id="emailBody" style="margin-top:100px">
                      <tr>
                        <td align="center" valign="top">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="color:#FFFFFF;" bgcolor="#3498db">
                            <tr>
                              <td align="center" valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                  <tr>
                                    <td align="center" valign="top" width="500" class="flexibleContainerCell">
                                      <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                        <tr>
                                          <td align="center" valign="top" class="textContent">
                                            <h1 style="color:#FFFFFF;line-height:100%;font-family:Helvetica,Arial,sans-serif;font-size:35px;font-weight:normal;margin-bottom:5px;text-align:center;"></h1>
                                            <h2 style="text-align:center;font-weight:normal;font-family:Helvetica,Arial,sans-serif;font-size:23px;margin-bottom:10px;color:#205478;line-height:135%;">Buyers information</h2>
                                            <div style="text-align:center;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#FFFFFF;line-height:135%;">
                                              Buyer: '.$mailername.'
                                              <br/>
                                              Buyer Email: '.$maileremail.'
                                              <br/>
                                              Number: '.$mailernum.'
                                            .</div>
                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                </table>
                                
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    
                      <tr>
                        <td align="center" valign="top">
                          <!-- CENTERING TABLE // -->
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#F8F8F8">
                            <tr>
                              <td align="center" valign="top">
                                <!-- FLEXIBLE CONTAINER // -->
                                <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                  <tr>
                                    <td align="center" valign="top" width="500" class="flexibleContainerCell">
                                      <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                        <tr>
                                          <td align="center" valign="top">

                                            <!-- CONTENT TABLE // -->
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                              <tr>
                                                <td valign="top" class="textContent">
                                                  <!--
                                                    The "mc:edit" is a feature for MailChimp which allows
                                                    you to edit certain row. It makes it easy for you to quickly edit row sections.
                                                    http://kb.mailchimp.com/templates/code/create-editable-content-areas-with-mailchimps-template-language
                                                  -->
                                                  <h3 mc:edit="header" style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">Product Information</h3>
                                                  <div mc:edit="body" style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;">
                                            Product: '.$prd->title.'
                                            <br/>
                                            Vendor: '.$prd->company_name.'
                                            <br/>
                                            Category: '.$prd->cat_name.'<br/>
                                            Price: '.$prd->sale_price.' 
                                            <br/> 
                                            City: '.$prd->city_name.'
                                            <br/>
                                            product url:<a href="'.base_url().'user/prdDetails/'.$prd->id.'" >click me to for product details</a>
                                            
                                                </div>
                                                </td>
                                              </tr>
                                            </table>
                                            <!-- // CONTENT TABLE -->

                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                </table>
                                <!-- // FLEXIBLE CONTAINER -->
                              </td>
                            </tr>
                          </table>
                          <!-- // CENTERING TABLE -->
                        </td>
                      </tr>
                  
                      <tr>
                        <td align="center" valign="top">
                          <!-- CENTERING TABLE // -->
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td align="center" valign="top">
                                <!-- FLEXIBLE CONTAINER // -->
                                <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                  <tr>
                                    <td align="center" valign="top" width="500" class="flexibleContainerCell">
                                      <table class="flexibleContainerCellDivider" border="0" cellpadding="30" cellspacing="0" width="100%">
                                        <tr>
                                          <td align="center" valign="top" style="padding-top:0px;padding-bottom:0px;">

                                            <!-- CONTENT TABLE // -->
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                              <tr>
                                                <td align="center" valign="top" style="border-top:1px solid #C8C8C8;"></td>
                                              </tr>
                                            </table>
                                            <!-- // CONTENT TABLE -->

                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                </table>
                                <!-- // FLEXIBLE CONTAINER -->
                              </td>
                            </tr>
                          </table>
                          <!-- // CENTERING TABLE -->
                        </td>
                      </tr>
                    
                    </table>
                    <table bgcolor="#E1E1E1" border="0" cellpadding="0" cellspacing="0" width="500" id="emailFooter">
                      <tr>
                        <td align="center" valign="top">
                          
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td align="center" valign="top">
                                
                                <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                  <tr>
                                    <td align="center" valign="top" width="500" class="flexibleContainerCell">
                                      <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                        <tr>
                                          <td valign="top" bgcolor="#E1E1E1">

                                            <div style="font-family:Helvetica,Arial,sans-serif;font-size:13px;color:#828282;text-align:center;line-height:120%;">
                                              <div>Copyright &#169; 2018 <a href="www.expobazar.com" target="_blank" style="text-decoration:none;color:#828282;"><span style="color:#828282;">expobazar</span></a>. All&nbsp;rights&nbsp;reserved.</div>
                                              
                                            </div>

                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                </table>
                                
                              </td>
                            </tr>
                          </table>
                          
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </center>
          </body>
        '
          ;
      endforeach;
         

		

        // Ashok  Configurations //
           
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('akumar.hamdard@gmail.com'); // change it to yours
            $this->email->to($maileremail);// change it to yours
            $this->email->subject('Product Information from ExpoBazar');
            $this->email->message($message);
            $sent=$this->email->send();
        


        if($sent==true){
    		$this->session->set_flashdata('success','Email sent our vendor will contact you soon');
    		redirect("user/prdDetails/40");
    	}else{
   			show_error( $this->email->print_debugger());
    	}
    		
    }
    

}    

?>