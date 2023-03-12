<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class M_feature extends CI_Model {
    
    function get_features(){
        //$this->db->where('deleted',0);
        $this->db->order_by('feature_id','DESC');
        $query = $this->db->get('tblfeatures');
        return $query->result_array();
    }

    function get_active_features(){
        $this->db->where('deleted',0);
        $this->db->order_by('feature_id','DESC');
        $query = $this->db->get('tblfeatures');
        return $query->result_array();
    }

    function get_feature_by_id($feature_id){
	    $this->db->where('feature_id',$feature_id);
		$query = $this->db->get('tblfeatures');
		return $query->result_array();
	}

    function get_photo($faeture_id){
        $this->db->where('feature_id',$faeture_id);
        $query = $this->db->get('tblfeatures')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['fimage'];
            }
        }else {
            return '';
        }
    }


  
}