
<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Users_model extends CI_Model
  {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function allusers($usertype)

    {   
        if($usertype=="vendor")
        {
            $query = $this->db->query(
            "SELECT users.id , users.first_name , users.last_name ,users.status,users.email , cities.city_name , roles.role_name  ,vendor_information.company_name,vendor_information.id as 'vendor_id' FROM users   
                
                LEFT JOIN roles on users.role_id = roles.id 
                LEFT JOIN cities on users.city_id = cities.id
                LEFT JOIN vendor_information on users.id = vendor_information.user_id
                
                where roles.role_name = 'vender' and users.status <> 2
            ");
            return $query->result();
        }
        elseif($usertype = 'buyer')
        {
            $query = $this->db->query(
            "SELECT users.id , users.first_name , users.last_name ,users.status,users.email , cities.city_name , roles.role_name FROM users   
                
                LEFT JOIN roles on users.role_id = roles.id 
                LEFT JOIN cities on users.city_id = cities.id
               
                where roles.role_name = 'buyer' and users.status <> 2
            ");
            return $query->result();
        }    
    }

    public function userinfo($id){

        $query=$this->db->query("select * from users where id=$id");
        return $query->result();

    }
    public function updateUser($id){
        
       $fname= $this->input->post('fname'); 
       $lname= $this->input->post('lname');
       $email= $this->input->post('email');
       $num  =$this->input->post('num');

      
       $data = array(
        
        'first_name' =>$fname ,
        'last_name'  =>  $lname,
        'contact_num'  => $num ,
        'email'  =>  $email
    
        );
        $this->db->where('id', $id);
        $result=$this->db->update('users', $data);
        if($result){
            $this->session->set_flashdata('success','Data Updated Succesfully');
            redirect('user/accountHome');                
        }else{
            $this->session->set_flashdata('error','Data is not updated');
            redirect('user/accountHome');
        }

    }    

    public function user_status_update(){
        
        $action =$this->input->post('action');
        $id     =$this->input->post('ele_id');
        $type   =$this->input->post('ele_type');
        
        if($action == 'approve')
        {
            $query = $this->db->query("update users set status=1 where id=$id" );
        }
        elseif($action =='block')
        {      
            $query = $this->db->query(
                "update users set status=0 where id=$id");
        }
        $results['id']=$id;
        $results['query']=$query;
        $results['type']=$type;
        $results['action']=$action;
        echo json_encode($results);
    }

    public function loginAsAdmin(){
           
        if($this->input->post('loginadmin'))
        {
            $email=$this->input->post('loginEmail');
            $pass= $this->input->post('loginPassword');
            $query=$this->db->query("
                
                select * from users where email='".$email."' AND password='".$pass."'");
                $result=$query->result();
                $user = $result[0];
                    
                if($query->num_rows()==1 && $user->role_id == '1')
                {
                    $this->session->set_userdata('adminname',$user->first_name." ".$user->last_name);
                    $this->session->set_userdata('adminid',$user->id);
                    $this->session->set_userdata('adminrole',$user->role_id);
                    $this->session->set_userdata('adminlogin',true);
                    redirect('admin/index','refresh');
                }
                else if($query->num_rows()==1 && $user->role_id == '2')
                {
                    $this->session->set_userdata('modifiername',$user->first_name." ".$user->last_name);
                    $this->session->set_userdata('modifierid',$user->id);
                    $this->session->set_userdata('modifierrole',$user->role_id);
                    $this->session->set_userdata('modifierlogin',true);
                    redirect('admin/index','refresh');
                }
                else{
                    redirect('admin/login','refresh');
                }
        }            
    }


    
    public function loginUser(){
           
        if($this->input->post('loginuser'))
        {
            $email=$this->input->post('loginEmail');
            $pass= $this->input->post('loginPassword');
            $query=$this->db->query("
                select * from users where email='".$email."' AND password='".$pass."' And role_id In(2,3) ");
            if( $query->num_rows()==1)
            {  
                $result=$query->result();
                $user = $result[0];
                //single row returned at zero index 
                
                $this->session->set_userdata('username',$user->first_name." ".$user->last_name);
                $this->session->set_userdata('id',$user->id);
                $this->session->set_userdata('userlogin',true);
                if($user->profile_pic==null){
                    $user_pic='Uploads/images/users/avatar_2x1.png';
                }
                else{
                    $user_pic=$user->profile_pic;
                }
                $this->session->set_userdata('userpic',$user_pic);
                
                if( $user->role_id == 2){
                    $this->session->set_userdata('role','vendor');
                }elseif($user->role_id == 3){
                    $this->session->set_userdata('role','buyer');
                }

                $this->session->set_flashdata('success','you are logged in succesfully ');
                

                redirect('user/accountHome');
            }
            else{
                $this->session->set_flashdata('error','invalid email or password ,please Try again !');
                redirect('user/login');
            }
        }            
    }
    public function logoutuser(){
        $sess_items=array('username','userlogin','id','role');
        $this->session->unset_userdata($sess_items);
        redirect('user/login');
    }


    public function logoutAsAdmin(){
        $sess_items=array('adminname','adminlogin','adminid','modifiername','modifierlogin','modifierid');
        $this->session->unset_userdata($sess_items);
        redirect('admin/login');
    }

   /* public function logoutAsModifier(){
        $sess_items=array('modifiername','modifierlogin','modifierid');
        $this->session->unset_userdata($sess_items);
        redirect('admin/login');
    }*/

    public function signupBackend(){
         
         $fname=$this->input->post('fname');
         $lname  =$this->input->post('lname');
         $email  =$this->input->post('email');
         $password =$this->input->post('password');
         $contact_num=$this->input->post('contact_num');
         $gender  = $this->input->post('gender');
         $dob  = $this->input->post('dob');
         $city_id  = $this->input->post('city_id');
         
        
                   
        if(!empty($_FILES["userImage"]['name'])){
               
            $config['upload_path']="Uploads/images/users/";
            $url="Uploads/images/users/";
            $config['allowed_types']= 'gif|jpg|png';
            $config['file_name'] = $_FILES["userImage"]['name'];
            $this->load->library('upload');
            $this->upload->initialize($config);
            if($this->upload->do_upload("userImage")){
                $uploadData = $this->upload->data();
                $userPic = $url.$uploadData['file_name'];
            }
            else{
                $userPic = $this->upload->display_errors()." <br/>".$config['upload_path'];
            }
        }
        

         $role  = $this->input->post('role');   
         if($role=='2'){
             $user=array(
                'role_id'=>$role,
                'city_id'=>$city_id,
                'contact_num'=>$contact_num,  
                'first_name'=>$fname,
                'last_name'=>$lname,
                'Gender'=>$gender,
                'email'=>$email,
                'password'=>$password,
                'profile_pic'=>$userPic,
                'status'=>"0"
             );
          }
          else{
               $user=array(
                'role_id'=>$role,
                'city_id'=>$city_id,
                'contact_num'=>$contact_num,  
                'first_name'=>$fname,
                'last_name'=>$lname,
                'Gender'=>$gender,
                'email'=>$email,
                'password'=>$password,
                'profile_pic'=>$userPic,
                'status'=>"1"
             );
         }   
         $userResult=$this->db->insert('users',$user); 
         if($userResult==true && $role=='2'){
                            
                $user_id=$this->db->insert_id();    
                $company_name  = $this->input->post('company_name');
                $product_category_id  = $this->input->post('product_category_id');
                $address  = $this->input->post('address');
                

                if(!empty($_FILES["vendorimage"]['name'])){
                   
                      $config['upload_path']="Uploads/images/vendors/";
                      $url="uploads/images/vendors/";
                      //$config['max_size'] = '400';
                      //$config['max_width']  = '1024';
                      //$config['max_height']  = '768';
                      $config['allowed_types']= 'gif|jpg|png';
                      $config['file_name'] = $_FILES["vendorimage"]['name'];
                      $this->load->library('upload');
                      $this->upload->initialize($config);
                      if($this->upload->do_upload("vendorimage")){
                          $uploadData = $this->upload->data();
                          $picture = $url.$uploadData['file_name'];
                      }
                      else{
                        $picture = $this->upload->display_errors()." <br/>".$config['upload_path'];
                      }
            }
            $vendor= array(
                'user_id'=>$user_id,
                'package_id'=>1,
                'city_id'=>$city_id,
                'company_name'=>$company_name,
                'address'=>$address,
                'bussiness_type_id'=>$product_category_id,
                'profile_picture'=>$picture
            );
            $added=$this->db->insert('vendor_information',$vendor);
            if($added){
                $this->session->set_flashdata('success','You are registered Succesfully' );
                redirect('user/login');
            }
        }
        if($userResult==true){
            $this->session->set_flashdata('success','You are registered Succesfully ');
            redirect('user/login');
        }
    }

    public function pkgByUserId($userid){
        $query = $this->db->query(
            "select vendor_information.id as 'vendor_id' , package_id,packages.* from vendor_information 
                left join `packages` on 
                packages.id=vendor_information.package_id 
                where `user_id`=$userid ");
        return $query->result();
    }    
}   

?> 