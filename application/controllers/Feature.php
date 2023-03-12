<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Feature extends CI_Controller {

	
	function check_session(){
		if ($this->session->userdata('user_login') != 1)//not logged in
		redirect(base_url(), 'refresh');
    }
	
	function index(){
		$this->check_session();
		$data['page_title']  = 'Car Features';
		$this->load->view($this->session->userdata('role').'/features',$data);			
	}
	
    function get_data_from_post(){
        $data['car_id'] = $this->input->post('car_id');
        $data['added_by'] = $this->session->userdata('user_id');
        $data['date_added'] = date('Y-m-d h:m:s');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_feature->get_feature_by_id($update_id);
		foreach ($query as $row) {
            $data['car_id'] = $row['car_id'];
            $data['fimage'] = $row['fimage'];
		}	
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();

        $data['fimage'] = $_FILES['fimage']['name'];
        if(isset($data['fimage'])){
            move_uploaded_file($_FILES['fimage']['tmp_name'],"uploads/cars/features/".$data['fimage']);
        }

		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('user_id',$update_id);
			$this->db->update('tblfeatures',$data);
		 }else{
			$this->db->insert('tblfeatures',$data);
		}

		$this->session->set_flashdata('message','Your car has been featured successfully');
			if($update_id !=''):
    			redirect('Feature');
			else:
				redirect('Feature/read');
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

		$data['page_title']  = 'Create feature';
		$this->load->view($this->session->userdata('role').'/add_feature',$data);			
	}

	function delete($param=''){
        $this->check_session();
		$data['deleted'] = 1;
		$this->db->where('feature_id',$param);
        $this->db->update('tblfeatures',$data);
    	$this->session->set_flashdata('message','Car has been removed successfully from the featured List');
		redirect('Feature');
	}
	
}