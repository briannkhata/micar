<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_steering extends CI_Model {
    function get_steerings(){
        $this->db->where('deleted',0);
        $this->db->order_by('steering_id','DESC');
        $query = $this->db->get('tblsteerings');
        return $query->result_array();
    }

  
    function get_steering_by_id($steering_id){
	    $this->db->where('steering_id',$steering_id);
		$query = $this->db->get('tblsteerings');
		return $query->result_array();
	}

    function get_steering($steering_id){
        $this->db->where('steering_id',$steering_id);
        $query = $this->db->get('tblsteerings')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['steering'];
            }
        }else {
            return '';
        }
    }

}