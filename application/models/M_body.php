<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_body extends CI_Model {
    function get_bodies(){
        $this->db->where('deleted',0);
        $this->db->order_by('body_id','DESC');
        $query = $this->db->get('tblbodies');
        return $query->result_array();
    }

  
    function get_body_by_id($body_id){
	    $this->db->where('body_id',$body_id);
		$query = $this->db->get('tblbodies');
		return $query->result_array();
	}

    function get_body($body_id){
        $this->db->where('body_id',$body_id);
        $query = $this->db->get('tblbodies')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['body'];
            }
        }else {
            return '';
        }
    }

}