<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Car extends CI_Controller {

	
	function check_session(){
		if ($this->session->userdata('user_login') != 1)//not logged in
		redirect(base_url(), 'refresh');
    }
	
	function index(){
		$this->check_session();
		$data['page_title']  = 'Car Listing';
		$this->load->view($this->session->userdata('role').'/cars',$data);			
	}

	function view($param=''){
		$this->check_session();
		$data['page_title']  = 'Car Details';
		$data['car_id']  = $param;
		$this->load->view($this->session->userdata('role').'/car_details',$data);			
	}
	
    function get_data_from_post(){
        $data['selling_price'] = $this->input->post('selling_price');
		$data['user_id'] = $this->input->post('user_id');
        $data['body_id'] = $this->input->post('body_id');
        $data['year'] = $this->input->post('year');
        $data['condition_id'] = $this->input->post('condition_id');
        $data['exterior_id'] = $this->input->post('exterior_id');
        $data['interior_id'] = $this->input->post('interior_id');
        $data['make_id'] = $this->input->post('make_id');
        $data['model_id'] = $this->input->post('model_id');
        $data['steering_id'] = $this->input->post('steering_id');
        $data['transmission_id'] = $this->input->post('transmission_id');
        $data['engine'] = $this->input->post('engine');
        $data['mileage'] = $this->input->post('mileage');
        $data['comment'] = $this->input->post('comment');
        $data['drive_train'] = $this->input->post('drive_train');
        $data['added_by'] = $this->session->userdata('user_id');
		$data['fueltype_id'] = $this->input->post('location');
		$data['location'] = $this->input->post('fueltype_id');
		$data['district_id'] = $this->input->post('district_id');
		$data['region_id'] = $this->input->post('region_id');
		$data['location_id'] = $this->input->post('location_id');
        $data['date_added'] = date('Y-m-d h:m:s');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_car->get_car_by_id($update_id);
		foreach ($query as $row) {
            $data['selling_price'] = $row['selling_price'];
            $data['user_id'] = $row['user_id'];
            $data['body_id'] = $row['body_id'];
            $data['year'] = $row['year'];
            $data['condition_id'] = $row['condition_id'];
            $data['exterior_id'] = $row['exterior_id'];
            $data['interior_id'] = $row['interior_id'];
            $data['make_id'] = $row['make_id'];
            $data['model_id'] = $row['model_id'];
            $data['steering_id'] = $row['steering_id'];
            $data['transmission_id'] = $row['transmission_id'];
            $data['engine'] = $row['engine'];
            $data['mileage'] = $row['mileage'];
            $data['drive_train'] = $row['drive_train'];
            $data['comment'] = $row['comment'];
			$data['fueltype_id'] = $row['fueltype_id'];
			$data['location'] = $row['location'];
			$data['region_id'] = $row['region_id'];
			$data['district_id'] = $row['district_id'];
			$data['location_id'] = $row['location_id'];
		}	
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();

		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('car_id',$update_id);
			$this->db->update('tblcars',$data);
		 }else{
			$this->db->insert('tblcars',$data);
			$data2023['car_id'] = $this->db->insert_id();
		}


		for($i=0;$i<count($_FILES["photo"]["name"]);$i++)
		{
			$data2023['photo'] = $_FILES["photo"]["name"][$i];
			move_uploaded_file($_FILES["photo"]["tmp_name"][$i], "uploads/cars/".$data2023['photo']);
			$this->db->insert('tblphotos',$data2023);
		}

		$this->session->set_flashdata('message','Your car has been saved successfully');
			if($update_id !=''):
    			redirect('Car');
			else:
				redirect('Car/read');
			endif;
	}

	function read(){
        $this->check_session();
		$update_id = $this->uri->segment(3);
		if(!isset($update_id)){
			$update_id = $this->input->post('update_id',$update_id);
		}
		if(is_numeric($update_id)){
			$data = $this->get_data_from_db($update_id);
			$data['update_id'] = $update_id;
		}
		else{
			$data = $this->get_data_from_post();
		}

		$data['page_title']  = 'Create Car';
		$this->load->view($this->session->userdata('role').'/add_car',$data);			
	}

    function delete_car(){
		$this->check_session();
		$data['page_title']  = 'Delete Car Details';
		$this->load->view($this->session->userdata('role').'/delete_car',$data);			
	}

	function delete($param=''){
        $this->check_session();
		$data['deleted'] = 1;
        $data['reason_for_delete'] = $this->input->post('reason_for_delete');
        $data['deleted_by'] = $this->session->userdata('user_id');
        $data['date_deleted'] = date('Y-m-d h:m:s');
		$this->db->where('user_id',$param);
        $this->db->update('tblcars',$data);
    	$this->session->set_flashdata('message','Car deleted successfully');
		redirect('Car');
	}


    function add_photos(){
		$this->check_session();
		$data['page_title']  = 'Add Car Photos';
		$this->load->view($this->session->userdata('role').'/cars',$data);			
	}


    function save_photos(){
        $data['photo'] = random_string().'_'.$_FILES['photo']['name'];
        $data['car_id'] = $this->input->post('car_id');
        move_uploaded_file($_FILES['photo']['tmp_name'],"uploads/cars/".$data['photo']);
        $this->db->insert('tblcars',$data);
        $this->session->set_flashdata('message','Car Photos successfully saved');
        redirect("Car/add_photos");
    }


	
}