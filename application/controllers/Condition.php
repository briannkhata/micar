<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Condition extends CI_Controller {


    function check_session(){
        if ($this->session->userdata('user_login') != 1)
            redirect(base_url(), 'refresh');
    }

	function index(){
		$this->check_session();
		$data['page_title']  = 'Car conditions';
		$this->load->view($this->session->userdata('role').'/conditions',$data);			
	}


    function get_data_from_post(){
        $data['condition'] = $this->input->post('condition');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_condition->get_condition_by_id($update_id);
		foreach ($query as $row) {
			$data['condition'] = $row['condition'];
		}	
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('condition_id',$update_id);
			$this->db->update('tblconditions',$data);
		 }else{
			$this->db->insert('tblconditions',$data);
		}

		$this->session->set_flashdata('message','condition saved successfully');
			if($update_id !=''):
    			redirect('condition');
			else:
				redirect('condition/read');
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

		$data['page_title']  = 'Create condition';
		$this->load->view($this->session->userdata('role').'/add_condition',$data);			
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('condition_id',$param);
        $this->db->update('tblconditions',$data);
    	$this->session->set_flashdata('message','condition deleted successfully');
		redirect('condition');
	}
	
}