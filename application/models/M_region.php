<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_region extends CI_Model {
    function get_regions(){
        $this->db->where('deleted',0);
        $this->db->order_by('region_id','DESC');
        $query = $this->db->get('tblregions');
        return $query->result_array();
    }

  
    function get_region_by_id($region_id){
	    $this->db->where('region_id',$region_id);
		$query = $this->db->get('tblregions');
		return $query->result_array();
	}

    function get_region($region_id){
        $this->db->where('region_id',$region_id);
        $query = $this->db->get('tblregions')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['region'];
            }
        }else {
            return '';
        }
    }

}