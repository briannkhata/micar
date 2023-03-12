<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Region extends CI_Controller {

    function check_session(){
        if ($this->session->userdata('user_login') != 1)
            redirect(base_url(), 'refresh');
    }
    
	function index(){
        $this->check_session();
		$data['page_title']  = 'regions';
		$this->load->view($this->session->userdata('role').'/regions',$data);			
	}


    function get_data_from_post(){
        $data['region'] = $this->input->post('region');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_region->get_region_by_id($update_id);
		foreach ($query as $row) {
			$data['region'] = $row['region'];
		}	
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('region_id',$update_id);
			$this->db->update('tblregions',$data);
		 }else{
			$this->db->insert('tblregions',$data);
		}

		$this->session->set_flashdata('message','Region saved successfully');
			if($update_id !=''):
    			redirect('Region');
			else:
				redirect('Region/read');
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

		$data['page_title']  = 'Create Region';
		$this->load->view($this->session->userdata('role').'/add_region',$data);			
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('region_id',$param);
        $this->db->update('tblregions',$data);
    	$this->session->set_flashdata('message','Region deleted successfully');
		redirect('Region');
	}
	
}