<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_plan extends CI_Model {
    function get_plans(){
        $this->db->where('deleted',0);
        $this->db->order_by('plan_id','DESC');
        $query = $this->db->get('tblplans');
        return $query->result_array();
    }

  
    function get_plan_by_id($plan_id){
	    $this->db->where('plan_id',$plan_id);
		$query = $this->db->get('tblplans');
		return $query->result_array();
	}

    function get_plan($plan_id){
        $this->db->where('plan_id',$plan_id);
        $query = $this->db->get('tblplans')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['plan'];
            }
        }else {
            return '';
        }
    }

    function get_duration($plan_id){
        $this->db->where('plan_id',$plan_id);
        $query = $this->db->get('tblplans')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['duration'];
            }
        }else {
            return '';
        }
    }

    function get_price($plan_id){
        $this->db->where('plan_id',$plan_id);
        $query = $this->db->get('tblplans')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['price'];
            }
        }else {
            return '';
        }
    }

}