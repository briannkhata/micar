<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class transmission extends CI_Controller {


    function check_session(){
        if ($this->session->userdata('user_login') != 1)
            redirect(base_url(), 'refresh');
    }

	function index(){
		$this->check_session();
		$data['page_title']  = 'Car Transmissions';
		$this->load->view($this->session->userdata('role').'/transmissions',$data);			
	}


    function get_data_from_post(){
        $data['transmission'] = $this->input->post('transmission');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_transmission->get_transmission_by_id($update_id);
		foreach ($query as $row) {
			$data['transmission'] = $row['transmission'];
		}	
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('transmission_id',$update_id);
			$this->db->update('tbltransmissions',$data);
		 }else{
			$this->db->insert('tbltransmissions',$data);
		}

		$this->session->set_flashdata('message','transmission saved successfully');
			if($update_id !=''):
    			redirect('transmission');
			else:
				redirect('transmission/read');
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

		$data['page_title']  = 'Create transmission';
		$this->load->view($this->session->userdata('role').'/add_transmission',$data);			
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('transmission_id',$param);
        $this->db->update('tbltransmissions',$data);
    	$this->session->set_flashdata('message','transmission deleted successfully');
		redirect('Transmission');
	}
	
}