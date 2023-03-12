<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class exterior extends CI_Controller {

	
	function check_session(){
		if ($this->session->userdata('user_login') != 1)
		redirect(base_url(), 'refresh');
    }
	
	function index(){
		$this->check_session();
		$data['page_title']  = 'Car Exterior Color';
		$this->load->view($this->session->userdata('role').'/exteriors',$data);			
	}
    function get_data_from_post(){
        $data['exterior'] = $this->input->post('exterior');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_exterior->get_exterior_by_id($update_id);
		foreach ($query as $row) {
			$data['exterior'] = $row['exterior'];
		}	
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('exterior_id',$update_id);
			$this->db->update('tblexteriors',$data);
		 }else{
			$this->db->insert('tblexteriors',$data);
		}

		$this->session->set_flashdata('message','exterior saved successfully');
			if($update_id !=''):
    			redirect('exterior');
			else:
				redirect('exterior/read');
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

		$data['page_title']  = 'Create exterior';
		$this->load->view($this->session->userdata('role').'/add_exterior',$data);			
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('exterior_id',$param);
        $this->db->update('tblexteriors',$data);
    	$this->session->set_flashdata('message','exterior deleted successfully');
		redirect('exterior');
	}
	
}