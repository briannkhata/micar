<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_fueltype extends CI_Model {
    
    function get_fueltypes(){
        $this->db->where('deleted',0);
        $this->db->order_by('fueltype_id','DESC');
        $query = $this->db->get('tblfueltypes');
        return $query->result_array();
    }

    function get_fueltype_by_id($fueltype_id){
	    $this->db->where('fueltype_id',$fueltype_id);
		$query = $this->db->get('tblfueltypes');
		return $query->result_array();
	}

    function get_fueltype($fueltype_id){
        $this->db->where('fueltype_id',$fueltype_id);
        $query = $this->db->get('tblfueltypes')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['fueltype'];
            }
        }else {
            return '';
        }
    }
   

}