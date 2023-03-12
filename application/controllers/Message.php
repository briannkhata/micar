<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class message extends CI_Controller {
	
	function check_session(){
		if ($this->session->userdata('user_login') != 1)
		redirect(base_url(), 'refresh');
    }
	
	function index(){
		$this->check_session();
		$data['page_title']  = 'messages';
		$this->load->view($this->session->userdata('role').'/messages',$data);			
	}

	function careers(){
		$this->check_session();
		$data['page_title']  = 'Careers';
		$this->load->view($this->session->userdata('role').'/careers',$data);			
	}

    // function get_data_from_post(){
    //     $data['message'] = $this->input->post('message');
	// 	return $data;
    // }

    // function get_data_from_db($update_id){
	// 	$query = $this->M_message->get_message_by_id($update_id);
	// 	foreach ($query as $row) {
	// 		$data['message'] = $row['message'];
	// 	}	
	// 	return $data;
	// }

	// function save(){
	// 	$data = $this->get_data_from_post();
	// 	$update_id = $this->input->post('update_id', TRUE);
	// 	if (isset($update_id)){
	// 		$this->db->where('message_id',$update_id);
	// 		$this->db->update('tblmessages',$data);
	// 	 }else{
	// 		$this->db->insert('tblmessages',$data);
	// 	}

	// 	$this->session->set_flashdata('message','message saved successfully');
	// 		if($update_id !=''):
    // 			redirect('message/messages');
	// 		else:
	// 			redirect('message/read');
	// 		endif;
	// }

	// function read(){
	// 	$update_id = $this->uri->segment(3);
	// 	if(!isset($update_id)){
	// 		$update_id = $this->input->post('update_id',$update_id);
	// 	}
	// 	if(is_numeric($update_id)){
	// 		$data = $this->get_data_from_db($update_id);
	// 		$data['update_id'] = $update_id;
	// 	}
	// 	else{
	// 		$data = $this->get_data_from_post();
	// 	}

	// 	$data['page_title']  = 'Create message';
	// 	$this->load->view($this->session->userdata('role').'/add_message',$data);			
	// }

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('message_id',$param);
        $this->db->update('tblmessages',$data);
    	$this->session->set_flashdata('message','message deleted successfully');
		redirect('message');
	}
	
}