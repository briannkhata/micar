<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_condition extends CI_Model {
    
    function get_conditions(){
        $this->db->where('deleted',0);
        $this->db->order_by('condition_id','DESC');
        $query = $this->db->get('tblconditions');
        return $query->result_array();
    }

    function get_condition_by_id($condition_id){
	    $this->db->where('condition_id',$condition_id);
		$query = $this->db->get('tblconditions');
		return $query->result_array();
	}

    function get_condition($condition_id){
        $this->db->where('condition_id',$condition_id);
        $query = $this->db->get('tblconditions')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['condition'];
            }
        }else {
            return '';
        }
    }

}