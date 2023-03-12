<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_transmission extends CI_Model {
    
    function get_transmissions(){
        $this->db->where('deleted',0);
        $this->db->order_by('transmission_id','DESC');
        $query = $this->db->get('tbltransmissions');
        return $query->result_array();
    }

    function get_transmission_by_id($transmission_id){
	    $this->db->where('transmission_id',$transmission_id);
		$query = $this->db->get('tbltransmissions');
		return $query->result_array();
	}

    function get_transmission($transmission_id){
        $this->db->where('transmission_id',$transmission_id);
        $query = $this->db->get('tbltransmissions')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['transmission'];
            }
        }else {
            return '';
        }
    }
   

}