<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_model extends CI_Model {
    
    function get_models(){
        $this->db->where('deleted',0);
        $this->db->order_by('model_id','DESC');
        $query = $this->db->get('tblmodels');
        return $query->result_array();
    }

  
    function get_model_by_id($model_id){
	    $this->db->where('model_id',$model_id);
		$query = $this->db->get('tblmodels');
		return $query->result_array();
	}

    function get_model($model_id){
        $this->db->where('model_id',$model_id);
        $query = $this->db->get('tblmodels')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['model'];
            }
        }else {
            return '';
        }
    }

}