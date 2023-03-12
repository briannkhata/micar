<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_location extends CI_Model {
    function get_locations(){
        $this->db->where('deleted',0);
        $this->db->order_by('location_id','DESC');
        $query = $this->db->get('tbllocations');
        return $query->result_array();
    }

  
    function get_location_by_id($location_id){
	    $this->db->where('location_id',$location_id);
		$query = $this->db->get('tbllocations');
		return $query->result_array();
	}

    function get_location($location_id){
        $this->db->where('location_id',$location_id);
        $query = $this->db->get('tbllocations')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['location'];
            }
        }else {
            return '';
        }
    }

}