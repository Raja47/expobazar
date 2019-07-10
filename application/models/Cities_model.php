<?php
  
class Cities_model extends CI_Model
{
    

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    
  public function allPakistaniCities()
  {   
  	$query = $this->db->query('select * from cities where country_id=1' );
  	return   $query->result();
  }
  
}  	