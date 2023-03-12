<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Idtype extends CI_Controller {

    function check_session(){
        if ($this->session->userdata('user_login') != 1)
            redirect(base_url(), 'refresh');
    }
    
	function index(){
        $this->check_session();
		$data['page_title']  = 'Id types';
		$this->load->view($this->session->userdata('role').'/idtypes',$data);			
	}


    function get_data_from_post(){
        $data['idtype'] = $this->input->post('idtype');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_idtype->get_idtype_by_id($update_id);
		foreach ($query as $row) {
			$data['idtype'] = $row['idtype'];
		}	
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('idtype_id',$update_id);
			$this->db->update('tblidtypes',$data);
		 }else{
			$this->db->insert('tblidtypes',$data);
		}

		$this->session->set_flashdata('message','Id type saved successfully');
			if($update_id !=''):
    			redirect('Idtype');
			else:
				redirect('Idtype/read');
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

		$data['page_title']  = 'Create Id type';
		$this->load->view($this->session->userdata('role').'/add_idtype',$data);			
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('idtype_id',$param);
        $this->db->update('tblidtypes',$data);
    	$this->session->set_flashdata('message','Id type deleted successfully');
		redirect('Idtype');
	}
	
}