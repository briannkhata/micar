<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Fueltype extends CI_Controller {


    function check_session(){
        if ($this->session->userdata('user_login') != 1)
            redirect(base_url(), 'refresh');
    }

	function index(){
		$this->check_session();
		$data['page_title']  = 'Fuel types';
		$this->load->view($this->session->userdata('role').'/fueltypes',$data);			
	}


    function get_data_from_post(){
        $data['fueltype'] = $this->input->post('fueltype');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_fueltype->get_fueltype_by_id($update_id);
		foreach ($query as $row) {
			$data['fueltype'] = $row['fueltype'];
		}	
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('fueltype_id',$update_id);
			$this->db->update('tblfueltypes',$data);
		 }else{
			$this->db->insert('tblfueltypes',$data);
		}

		$this->session->set_flashdata('message','fueltype saved successfully');
			if($update_id !=''):
    			redirect('fueltype');
			else:
				redirect('fueltype/read');
			endif;
	}

	function read(){
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

		$data['page_title']  = 'Create Fuel type';
		$this->load->view($this->session->userdata('role').'/add_fueltype',$data);			
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('fueltype_id',$param);
        $this->db->update('tblfueltypes',$data);
    	$this->session->set_flashdata('message','fueltype deleted successfully');
		redirect('fueltype');
	}
	
}