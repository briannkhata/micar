<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Servicetype extends CI_Controller {

    function check_session(){
        if ($this->session->userdata('user_login') != 1)
            redirect(base_url(), 'refresh');
    }
    
	function index(){
        $this->check_session();
		$data['page_title']  = 'Service Types';
		$this->load->view($this->session->userdata('role').'/servicetypes',$data);			
	}


    function get_data_from_post(){
        $data['servicetype'] = $this->input->post('servicetype');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_servicetype->get_servicetype_by_id($update_id);
		foreach ($query as $row) {
			$data['servicetype'] = $row['servicetype'];
		}	
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('servicetype_id',$update_id);
			$this->db->update('tblservicetypes',$data);
		 }else{
			$this->db->insert('tblservicetypes',$data);
		}

		$this->session->set_flashdata('message','Service Type saved successfully');
			if($update_id !=''):
    			redirect('Servicetype');
			else:
				redirect('Servicetype/read');
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

		$data['page_title']  = 'Create Service Type';
		$this->load->view($this->session->userdata('role').'/add_servicetype',$data);			
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('servicetype_id',$param);
        $this->db->update('tblservicetypes',$data);
    	$this->session->set_flashdata('message','Service Type deleted successfully');
		redirect('Servicetype');
	}
	
}