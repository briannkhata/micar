<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class faq extends CI_Controller {
	
	function check_session(){
		if ($this->session->userdata('user_login') != 1)
		redirect(base_url(), 'refresh');
    }
	
		function index(){
			$this->check_session();
			$data['page_title']  = 'Faqs';
			$this->load->view($this->session->userdata('role').'/faqs',$data);			
		}

    function get_data_from_post(){
        $data['faq'] = $this->input->post('faq');
        $data['faq_answer'] = $this->input->post('faq_answer');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_faq->get_faq_by_id($update_id);
		foreach ($query as $row) {
			$data['faq'] = $row['faq'];
            $data['faq_answer'] = $row['faq_answer'];

		}	
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('faq_id',$update_id);
			$this->db->update('tblfaqs',$data);
		 }else{
			$this->db->insert('tblfaqs',$data);
		}

		$this->session->set_flashdata('message','Faq saved successfully');
			if($update_id !=''):
    			redirect('Faq');
			else:
				redirect('Faq/read');
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

		$data['page_title']  = 'Create Faq';
		$this->load->view($this->session->userdata('role').'/add_faq',$data);			
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('faq_id',$param);
        $this->db->update('tblfaqs',$data);
    	$this->session->set_flashdata('message','Faq deleted successfully');
		redirect('Faq');
	}
	
}