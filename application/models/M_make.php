<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_make extends CI_Model {
    function get_makes(){
        $this->db->where('deleted',0);
        $this->db->order_by('make_id','DESC');
        $query = $this->db->get('tblmakes');
        return $query->result_array();
    }

  
    function get_make_by_id($make_id){
	    $this->db->where('make_id',$make_id);
		$query = $this->db->get('tblmakes');
		return $query->result_array();
	}

    function get_make($make_id){
        $this->db->where('make_id',$make_id);
        $query = $this->db->get('tblmakes')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['make'];
            }
        }else {
            return '';
        }
    }

}