<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_cartype extends CI_Model {
    function get_cartypes(){
        $this->db->where('deleted',0);
        $this->db->order_by('cartype_id','ASC');
        $query = $this->db->get('tblcartypes');
        return $query->result_array();
    }

  
    function get_cartype_by_id($cartype_id){
	    $this->db->where('cartype_id',$cartype_id);
		$query = $this->db->get('tblcartypes');
		return $query->result_array();
	}

    function get_cartype($cartype_id){
        $this->db->where('cartype_id',$cartype_id);
        $query = $this->db->get('tblcartypes')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['cartype'];
            }
        }else {
            return '';
        }
    }

}