<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_idtype extends CI_Model {
    function get_idtypes(){
        $this->db->where('deleted',0);
        $this->db->order_by('idtype_id','DESC');
        $query = $this->db->get('tblidtypes');
        return $query->result_array();
    }

  
    function get_idtype_by_id($idtype_id){
	    $this->db->where('idtype_id',$idtype_id);
		$query = $this->db->get('tblidtypes');
		return $query->result_array();
	}

    function get_idtype($idtype_id){
        $this->db->where('idtype_id',$idtype_id);
        $query = $this->db->get('tblidtypes')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['idtype'];
            }
        }else {
            return '';
        }
    }

}