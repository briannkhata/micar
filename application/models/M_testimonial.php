<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_testimonial extends CI_Model {
    function get_testimonials(){
        $this->db->where('deleted',0);
        $this->db->order_by('testimonial_id','DESC');
        $query = $this->db->get('tbltestimonials');
        return $query->result_array();
    }

  
    function get_testimonial_by_id($testimonial_id){
	    $this->db->where('testimonial_id',$testimonial_id);
		$query = $this->db->get('tbltestimonials');
		return $query->result_array();
	}

}