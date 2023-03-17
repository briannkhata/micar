<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Plan extends CI_Controller {

    function check_session(){
        if ($this->session->userdata('user_login') != 1)
            redirect(base_url(), 'refresh');
    }
    
	function index(){
        $this->check_session();
		$data['page_title']  = 'Plan';
		$this->load->view($this->session->userdata('role').'/plans',$data);			
	}


    function get_data_from_post(){
        $data['plan'] = $this->input->post('plan');
        $data['duration'] = $this->input->post('duration');
        $data['price'] = $this->input->post('price');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_plan->get_plan_by_id($update_id);
		foreach ($query as $row) {
			$data['plan'] = $row['plan'];
            $data['duration'] = $row['duration'];
            $data['price'] = $row['price'];
		}	
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('plan_id',$update_id);
			$this->db->update('tblplans',$data);
		 }else{
			$this->db->insert('tblplans',$data);
		}

		$this->session->set_flashdata('message','Plan saved successfully');
			if($update_id !=''):
    			redirect('Plan');
			else:
				redirect('Plan/read');
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

		$data['page_title']  = 'Create plan';
		$this->load->view($this->session->userdata('role').'/add_plan',$data);			
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('plan_id',$param);
        $this->db->update('tblplans',$data);
    	$this->session->set_flashdata('message','Plan deleted successfully');
		redirect('Plan');
	}
	
}