<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_car extends CI_Model {
    
    function get_cars(){
        //$this->db->where('deleted',0);
        $this->db->order_by('car_id','DESC');
        $query = $this->db->get('tblcars');
        return $query->result_array();
    }

    function get_cars_by_body($body_id){
        $this->db->where('deleted',0);
        $this->db->order_by('body_id',$body_id);
        $query = $this->db->get('tblcars');
        return $query->result_array();
    }

    function get_other_attribute($car_id){
        $this->db->where('deleted',0);
        $this->db->order_by('car_id',$car_id);
        $query = $this->db->get('tblattributes');
        return $query->result_array();
    }

    function get_cars_by_cartype($cartype_id){
        $this->db->where('deleted',0);
        $this->db->order_by('cartype_id',$cartype_id);
        $query = $this->db->get('tblcars');
        return $query->result_array();
    }

    function get_car_by_id($car_id){
	    $this->db->where('car_id',$car_id);
		$query = $this->db->get('tblcars');
		return $query->result_array();
	}

    function get_name($car_id){
        $this->db->where('car_id',$car_id);
        $query = $this->db->get('tblcars')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['name'];
            }
        }else {
            return '';
        }
    }

    function get_carno($car_id){
        $this->db->where('car_id',$car_id);
        $query = $this->db->get('tblcars')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['car_no'];
            }
        }else {
            return '';
        }
    }

    function get_seller($car_id){
        $this->db->where('car_id',$car_id);
        $query = $this->db->get('tblcars')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['seller'];
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

    
    function get_photo($photo_id){
        $this->db->where('photo_id',$photo_id);
        $query = $this->db->get('tblphotos')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['photo'];
            }
        }else {
            return '';
        }
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

    function get_selling_price_alt($car_id){
        $this->db->where('car_id',$car_id);
        $query = $this->db->get('tblcars')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return number_format($row['selling_price_alt'],2,',', ' ');;
            }
        }else {
            return 0.00;
        }
    }

    function get_car_no($car_id){
        $this->db->where('car_id',$car_id);
        $query = $this->db->get('tblcars')->result_array();
        if(count($query) > 0){
            foreach ($query as $row) {
                return $row['car_no'];
            }
        }else {
            return '';
        }
    }

}