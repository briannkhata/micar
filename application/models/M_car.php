<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_car extends CI_Model {
    
    function get_cars(){
        $this->db->where('deleted',0);
        $this->db->order_by('car_id','DESC');
        $query = $this->db->get('tblcars');
        return $query->result_array();
    }

    function get_car_by_id($car_id){
	    $this->db->where('car_id',$car_id);
		$query = $this->db->get('tblcars');
		return $query->result_array();
	}

    function get_car($car_id){
        $this->db->where('car_id',$car_id);
        $query = $this->db->get('tblcars')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['car'];
            }
        }else {
            return '';
        }
    }

    function get_photos($car_id){
	    $this->db->where('car_id',$car_id);
		$query = $this->db->get('tblphotos');
		return $query->result_array();
	}

   
    function get_deleted($car_id){
        $this->db->where('car_id',$car_id);
        $query = $this->db->get('tblcars')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['deleted'];
            }
        }else {
            return '';
        }
    }

    function get_user_id($car_id){
        $this->db->where('car_id',$car_id);
        $query = $this->db->get('tblcars')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['user_id'];
            }
        }else {
            return '';
        }
    }

    function get_single_photo($car_id){
        $this->db->where('car_id',$car_id);
        $query = $this->db->get('tblphotos')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['photo'];
            }
        }else {
            return '';
        }
    }

    function get_selling_price($car_id){
        $this->db->where('car_id',$car_id);
        $query = $this->db->get('tblcars')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return number_format($row['selling_price'],2,',', ' ');;
            }
        }else {
            return 0.00;
        }
    }

}