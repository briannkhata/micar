<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cartype extends CI_Controller {

    function check_session(){
        if ($this->session->userdata('user_login') != 1)
            redirect(base_url(), 'refresh');
    }
    
	function index(){
        $this->check_session();
		$data['page_title']  = 'Cartypes';
		$this->load->view($this->session->userdata('role').'/cartypes',$data);			
	}


    function get_data_from_post(){
        $data['cartype'] = $this->input->post('cartype');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_cartype->get_cartype_by_id($update_id);
		foreach ($query as $row) {
			$data['cartype'] = $row['cartype'];
		}	
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('cartype_id',$update_id);
			$this->db->update('tblcartypes',$data);
		 }else{
			$this->db->insert('tblcartypes',$data);
		}

		$this->session->set_flashdata('message','Cartype saved successfully');
			if($update_id !=''):
    			redirect('Cartype');
			else:
				redirect('Cartype/read');
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

		$data['page_title']  = 'Create Cartype';
		$this->load->view($this->session->userdata('role').'/add_cartype',$data);			
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('cartype_id',$param);
        $this->db->update('tblcartypes',$data);
    	$this->session->set_flashdata('message','Cartype deleted successfully');
		redirect('Cartype');
	}
	
}