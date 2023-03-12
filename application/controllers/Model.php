<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class model extends CI_Controller {

	
	function check_session(){
		if ($this->session->userdata('user_login') != 1)
		redirect(base_url(), 'refresh');
    }
	
	function index(){
		$this->check_session();
		$data['page_title']  = 'Car Models';
		$this->load->view($this->session->userdata('role').'/models',$data);			
	}
    function get_data_from_post(){
        $data['model'] = $this->input->post('model');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_model->get_model_by_id($update_id);
		foreach ($query as $row) {
			$data['model'] = $row['model'];
		}	
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('model_id',$update_id);
			$this->db->update('tblmodels',$data);
		 }else{
			$this->db->insert('tblmodels',$data);
		}

		$this->session->set_flashdata('message','model saved successfully');
			if($update_id !=''):
    			redirect('model');
			else:
				redirect('model/read');
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

		$data['page_title']  = 'Create model';
		$this->load->view($this->session->userdata('role').'/add_model',$data);			
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('model_id',$param);
        $this->db->update('tblmodels',$data);
    	$this->session->set_flashdata('message','model deleted successfully');
		redirect('model');
	}
	
}