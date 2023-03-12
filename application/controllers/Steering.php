<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class steering extends CI_Controller {

    
    function check_session(){
        if ($this->session->userdata('user_login') != 1)
        redirect(base_url(), 'refresh');
    }
    
    function index(){
        $this->check_session();
        $data['page_title']  = 'steerings';
        $this->load->view($this->session->userdata('role').'/steerings',$data);			
    }
    function get_data_from_post(){
        $data['steering'] = $this->input->post('steering');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_steering->get_steering_by_id($update_id);
		foreach ($query as $row) {
			$data['steering'] = $row['steering'];
		}	
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('steering_id',$update_id);
			$this->db->update('tblsteerings',$data);
		 }else{
			$this->db->insert('tblsteerings',$data);
		}

		$this->session->set_flashdata('message','steering saved successfully');
			if($update_id !=''):
    			redirect('steering');
			else:
				redirect('steering/read');
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

		$data['page_title']  = 'Create steering';
		$this->load->view($this->session->userdata('role').'/add_steering',$data);			
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('steering_id',$param);
        $this->db->update('tblsteerings',$data);
    	$this->session->set_flashdata('message','steering deleted successfully');
		redirect('steering');
	}
	
}