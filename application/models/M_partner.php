<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_partner extends CI_Model {
    
    function get_partners(){
        $this->db->where('deleted',0);
        $this->db->order_by('partner_id','DESC');
        $query = $this->db->get('tblpartners');
        return $query->result_array();
    }

  
    function get_partner_by_id($partner_id){
	    $this->db->where('partner_id',$partner_id);
		$query = $this->db->get('tblpartners');
		return $query->result_array();
	}

    function get_partner($partner_id){
        $this->db->where('partner_id',$partner_id);
        $query = $this->db->get('tblpartners')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['name'];
            }
        }else {
            return '';
        }
    }

    function get_logo($partner_id){
        $this->db->where('partner_id',$partner_id);
        $query = $this->db->get('tblpartners')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['logo'];
            }
        }else {
            return '';
        }
    }

}