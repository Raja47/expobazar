<?php 
 class Pictures_model extends CI_Model
  {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function allBannerPics(){
		$query=$this->db->query("select * from pictures where picture_type='banner' ");
    	$result = $query->result();
    	return $result;
    }
    public function activeBanners(){
		$query=$this->db->query("select * from pictures where picture_type='banner' and status=1 ");
    	$result = $query->result();
    	return $result;
    }
	public function insertBanner(){
		
		$title=	$this->input->post('title');
		$orderNo =$this->input->post('orderNo');

		if(!empty($_FILES['bannerImage']['name'])){
	        $url = "Uploads/images/Banners/";
	        $config['upload_path']= $url;
	        //$config['max_size'] = '400';
	        //$config['max_width']  = '1024';
	        //$config['max_height']  = '768';
	        $config['allowed_types']= 'gif|jpg|png';
	        $config['file_name'] = $_FILES['bannerImage']['name'];
	        $this->load->library('upload');
	        $this->upload->initialize($config);
	        if($this->upload->do_upload('bannerImage')){
	            $uploadData = $this->upload->data();
	            $picture = $url.$uploadData['file_name'];
	            $querypic_data=array(
	             'picture_of_id'=>'0',	
	             'pic_location'=>"$picture",
	             'picture_type'=>'banner',
	             'order_no'=>"$orderNo",
	             'title'=>"$title",
	             'status'=>'1'
	            );
	            $result=$this->db->insert('pictures',$querypic_data);
	        }
	        else
	        {
	            $result= false;
	        }
	    }
	    if($result){
	    	$this->session->set_flashdata('success','Banner Added Successfully');
	    	redirect('admin/bannersettings','refresh');
	    } 
	    else{
	    	$this->session->set_flashdata('error','Sorry Error!  Try Again');
	    	redirect('admin/bannersettings','refresh');
	    }   
	}    

	public function bannerStatusUpdate(){
		
		$action=$this->input->post('action');
		$banner_id=$this->input->post('id');
		
		if($action == 'approve')
		{
			$query=$this->db->query("update pictures set status=1 where id=$banner_id");
			
		}
		elseif($action =='block')
		{
			$query=$this->db->query("update pictures set status=0 where id=$banner_id");
			
		}
		elseif($action =='delete')
		{
			$query=$this->db->query("Delete from pictures where id=$banner_id");
		}	
		$results['id']=$banner_id;
		$results['action']=$action;
		$results['query'] = $query;
		

		echo json_encode($results);
	}
}    
?>