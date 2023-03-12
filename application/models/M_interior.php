<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_interior extends CI_Model {
    
    function get_interiors(){
        $this->db->where('deleted',0);
        $this->db->order_by('interior_id','DESC');
        $query = $this->db->get('tblinteriors');
        return $query->result_array();
    }

    function get_interior_by_id($interior_id){
	    $this->db->where('interior_id',$interior_id);
		$query = $this->db->get('tblinteriors');
		return $query->result_array();
	}

    function get_interior($interior_id){
        $this->db->where('interior_id',$interior_id);
        $query = $this->db->get('tblinteriors')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['interior'];
            }
        }else {
            return '';
        }
    }

}