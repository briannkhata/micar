<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_servicetype extends CI_Model {
    function get_servicetypes(){
        $this->db->where('deleted',0);
        $this->db->order_by('servicetype_id','DESC');
        $query = $this->db->get('tblservicetypes');
        return $query->result_array();
    }

  
    function get_servicetype_by_id($servicetype_id){
	    $this->db->where('servicetype_id',$servicetype_id);
		$query = $this->db->get('tblservicetypes');
		return $query->result_array();
	}

    function get_servicetype($servicetype_id){
        $this->db->where('servicetype_id',$servicetype_id);
        $query = $this->db->get('tblservicetypes')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['servicetype'];
            }
        }else {
            return '';
        }
    }

}