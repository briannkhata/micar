<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_year extends CI_Model {
    function get_years(){
        $this->db->where('deleted',0);
        $this->db->order_by('year_id','DESC');
        $query = $this->db->get('tblyears');
        return $query->result_array();
    }

  
    function get_year_by_id($year_id){
	    $this->db->where('year_id',$year_id);
		$query = $this->db->get('tblyears');
		return $query->result_array();
	}

  
}