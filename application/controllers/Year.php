<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Year extends CI_Controller {

	
	function check_session(){
		if ($this->session->userdata('user_login') != 1)
		redirect(base_url(), 'refresh');
    }
	
	function index(){
		$this->check_session();
		$data['page_title']  = 'Years';
		$this->load->view($this->session->userdata('role').'/years',$data);			
	}
    function get_data_from_post(){
        $data['year'] = $this->input->post('year');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_year->get_year_by_id($update_id);
		foreach ($query as $row) {
			$data['year'] = $row['year'];
		}	
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('year_id',$update_id);
			$this->db->update('tblyears',$data);
		 }else{
			$this->db->insert('tblyears',$data);
		}

		$this->session->set_flashdata('message','Year saved successfully');
			if($update_id !=''):
    			redirect('Year');
			else:
				redirect('Year/read');
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

		$data['page_title']  = 'Create Year';
		$this->load->view($this->session->userdata('role').'/add_year',$data);			
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('year_id',$param);
        $this->db->update('tblyears',$data);
    	$this->session->set_flashdata('message','year deleted successfully');
		redirect('Year');
	}
	
}