<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class testimonial extends CI_Controller {

	
	function check_session(){
		if ($this->session->userdata('user_login') != 1)
		redirect(base_url(), 'refresh');
    }
	
	function index(){
		$this->check_session();
		$data['page_title']  = 'Testimonials';
		$this->load->view($this->session->userdata('role').'/testimonials',$data);			
	}
    function get_data_from_post(){
        $data['testimonial'] = $this->input->post('testimonial');
        $data['user'] = $this->input->post('user');
        $data['role'] = $this->input->post('role');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_testimonial->get_testimonial_by_id($update_id);
		foreach ($query as $row) {
			$data['testimonial'] = $row['testimonial'];
            $data['user'] = $row['user'];
            $data['role'] = $row['role'];
		}	
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('testimonial_id',$update_id);
			$this->db->update('tbltestimonials',$data);
		 }else{
			$this->db->insert('tbltestimonials',$data);
		}

		$this->session->set_flashdata('message','Testimonial saved successfully');
			if($update_id !=''):
    			redirect('Testimonial');
			else:
				redirect('Testimonial/read');
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

		$data['page_title']  = 'Create Testimonial';
		$this->load->view($this->session->userdata('role').'/add_testimonial',$data);			
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('testimonial_id',$param);
        $this->db->update('tbltestimonials',$data);
    	$this->session->set_flashdata('message','Testimonial deleted successfully');
		redirect('Testimonial');
	}
	
}