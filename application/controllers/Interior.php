<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Interior extends CI_Controller {

	
	function check_session(){
		if ($this->session->userdata('user_login') != 1)
		redirect(base_url(), 'refresh');
    }
	
	function index(){
		$this->check_session();
		$data['page_title']  = 'Car interiors';
		$this->load->view($this->session->userdata('role').'/interiors',$data);			
	}
    function get_data_from_post(){
        $data['interior'] = $this->input->post('interior');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_interior->get_interior_by_id($update_id);
		foreach ($query as $row) {
			$data['interior'] = $row['interior'];
		}	
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('interior_id',$update_id);
			$this->db->update('tblinteriors',$data);
		 }else{
			$this->db->insert('tblinteriors',$data);
		}

		$this->session->set_flashdata('message','interior saved successfully');
			if($update_id !=''):
    			redirect('interior');
			else:
				redirect('interior/read');
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

		$data['page_title']  = 'Create interior';
		$this->load->view($this->session->userdata('role').'/add_interior',$data);			
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('interior_id',$param);
        $this->db->update('tblinteriors',$data);
    	$this->session->set_flashdata('message','interior deleted successfully');
		redirect('interior');
	}
	
}