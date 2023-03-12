<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class District extends CI_Controller {

    function check_session(){
        if ($this->session->userdata('user_login') != 1)
            redirect(base_url(), 'refresh');
    }
    
	function index(){
        $this->check_session();
		$data['page_title']  = 'Districts';
		$this->load->view($this->session->userdata('role').'/districts',$data);			
	}


    function get_data_from_post(){
        $data['district'] = $this->input->post('district');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_district->get_district_by_id($update_id);
		foreach ($query as $row) {
			$data['district'] = $row['district'];
		}	
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('district_id',$update_id);
			$this->db->update('tbldistricts',$data);
		 }else{
			$this->db->insert('tbldistricts',$data);
		}

		$this->session->set_flashdata('message','District saved successfully');
			if($update_id !=''):
    			redirect('District');
			else:
				redirect('District/read');
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

		$data['page_title']  = 'Create District';
		$this->load->view($this->session->userdata('role').'/add_district',$data);			
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('district_id',$param);
        $this->db->update('tbldistricts',$data);
    	$this->session->set_flashdata('message','District deleted successfully');
		redirect('District');
	}
	
}