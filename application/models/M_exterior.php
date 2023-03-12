<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_exterior extends CI_Model {
    
    function get_exteriors(){
        $this->db->where('deleted',0);
        $this->db->order_by('exterior_id','DESC');
        $query = $this->db->get('tblexteriors');
        return $query->result_array();
    }

    function get_exterior_by_id($exterior_id){
	    $this->db->where('exterior_id',$exterior_id);
		$query = $this->db->get('tblexteriors');
		return $query->result_array();
	}

    function get_exterior($exterior_id){
        $this->db->where('exterior_id',$exterior_id);
        $query = $this->db->get('tblexteriors')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['exterior'];
            }
        }else {
            return '';
        }
    }

}