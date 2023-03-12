<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_district extends CI_Model {
    function get_districts(){
        $this->db->where('deleted',0);
        $this->db->order_by('district_id','DESC');
        $query = $this->db->get('tbldistricts');
        return $query->result_array();
    }

  
    function get_district_by_id($district_id){
	    $this->db->where('district_id',$district_id);
		$query = $this->db->get('tbldistricts');
		return $query->result_array();
	}

    function get_district($district_id){
        $this->db->where('district_id',$district_id);
        $query = $this->db->get('tbldistricts')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['district'];
            }
        }else {
            return '';
        }
    }

}