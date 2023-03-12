<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_message extends CI_Model {
    function get_messages(){
        $this->db->where('deleted',0);
        $this->db->order_by('message_id','DESC');
        $query = $this->db->get('tblmessages');
        return $query->result_array();
    }

  
    function get_message_by_id($message_id){
	    $this->db->where('message_id',$message_id);
		$query = $this->db->get('tblmessages');
		return $query->result_array();
	}

    function get_careers(){
        $this->db->order_by('applicant_id','DESC');
		$query = $this->db->get('tblapplicants');
		return $query->result_array();
	}

}