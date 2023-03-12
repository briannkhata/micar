<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_faq extends CI_Model {
    function get_faqs(){
        $this->db->where('deleted',0);
        $this->db->order_by('faq_id','DESC');
        $query = $this->db->get('tblfaqs');
        return $query->result_array();
    }

  
    function get_faq_by_id($faq_id){
	    $this->db->where('faq_id',$faq_id);
		$query = $this->db->get('tblfaqs');
		return $query->result_array();
	}

}