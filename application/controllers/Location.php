<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Location extends CI_Controller {

    function check_session(){
        if ($this->session->userdata('user_login') != 1)
            redirect(base_url(), 'refresh');
    }
    
	function index(){
        $this->check_session();
		$data['page_title']  = 'Locations';
		$this->load->view($this->session->userdata('role').'/locations',$data);			
	}


    function get_data_from_post(){
        $data['location'] = $this->input->post('location');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_location->get_location_by_id($update_id);
		foreach ($query as $row) {
			$data['location'] = $row['location'];
		}	
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('location_id',$update_id);
			$this->db->update('tbllocations',$data);
		 }else{
			$this->db->insert('tbllocations',$data);
		}

		$this->session->set_flashdata('message','location saved successfully');
			if($update_id !=''):
    			redirect('Location');
			else:
				redirect('Location/read');
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

		$data['page_title']  = 'Create Location';
		$this->load->view($this->session->userdata('role').'/add_location',$data);			
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('location_id',$param);
        $this->db->update('tbllocations',$data);
    	$this->session->set_flashdata('message','Location deleted successfully');
		redirect('Location');
	}
	
}