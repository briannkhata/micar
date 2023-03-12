<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Body extends CI_Controller {

	
	function check_session(){
		if ($this->session->userdata('user_login') != 1)
		redirect(base_url(), 'refresh');
    }
	
	function index(){
		$this->check_session();
		$data['page_title']  = 'Body Types';
		$this->load->view($this->session->userdata('role').'/bodies',$data);			
	}
    function get_data_from_post(){
        $data['body'] = $this->input->post('body');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_body->get_body_by_id($update_id);
		foreach ($query as $row) {
			$data['body'] = $row['body'];
		}	
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('body_id',$update_id);
			$this->db->update('tblbodies',$data);
		 }else{
			$this->db->insert('tblbodies',$data);
		}

		$this->session->set_flashdata('message','Body saved successfully');
			if($update_id !=''):
    			redirect('Body');
			else:
				redirect('Body/read');
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

		$data['page_title']  = 'Create body';
		$this->load->view($this->session->userdata('role').'/add_body',$data);			
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('body_id',$param);
        $this->db->update('tblbodies',$data);
    	$this->session->set_flashdata('message','Body deleted successfully');
		redirect('body');
	}
	
}