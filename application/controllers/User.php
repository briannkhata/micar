<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

	
	function check_session(){
		if ($this->session->userdata('user_login') != 1)//not logged in
		redirect(base_url(), 'refresh');
    }
	
	function index(){
		$this->check_session();
		$data['page_title']  = 'Dashboard';
		$this->load->view($this->session->userdata('role').'/dashboard',$data);			
	}

	function verifyuser(){
		$this->check_session();
		$data['page_title']  = 'Verify User';
		$this->load->view($this->session->userdata('role').'/verifyuser',$data);			
	}

	function changepassword(){
		$this->check_session();
		$data['page_title']  = 'Change Password';
		$this->load->view($this->session->userdata('role').'/changepassword',$data);			
	}

	function changeprofile(){
		$this->check_session();
		$data['page_title']  = 'Change Profile';
		$this->load->view($this->session->userdata('role').'/changeprofile',$data);			
	}

    function profilechange(){
		$this->check_session();
        $data['photo'] = $_FILES['photo']['name'];
		if(isset($data['photo'])){
        $user_id = $this->session->userdata('user_id');
        move_uploaded_file($_FILES['photo']['tmp_name'],"uploads/users/profiles/".$data['photo']);
        $this->db->where('user_id',$user_id);
        $this->db->update('tblusers',$data);
		$this->session->set_flashdata('message','Profile changed successfully');
		}
		redirect('User/changeprofile');
	
    }


	function passwordchange(){
		$this->check_session();
        $data['password'] = MD5($this->input->post('password'));
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$this->db->update('tblusers',$data);
		$this->session->set_flashdata('message','Password changed successfully');
		redirect('User/profile');
    }

	function profile(){
		$this->check_session();
		$data['page_title']  = 'Profile';
		$this->load->view($this->session->userdata('role').'/profile',$data);			
	}

	function verify(){
		$this->check_session();
        $data['id_number'] = $this->input->post('id_number');
		$data['idtype_id'] = $this->input->post('idtype_id');
		$data['date_verified'] = date('Y-m-d h:m:s');
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$this->db->update('tblusers',$data);
		$this->session->set_flashdata('message','User verified successfully');
		redirect('User/profile');
    }
	
	function admins(){
        $this->check_session();
        $data['page_title']  = 'Administrators';
		$this->load->view($this->session->userdata('role').'/admins',$data);
	}

	function sellers(){
        $this->check_session();
        $data['page_title']  = 'Sellers';
		$this->load->view($this->session->userdata('role').'/sellers',$data);
	}

    function get_data_from_post(){
        $data['name'] = $this->input->post('name');
		$data['username'] = $this->input->post('email');
		$data['password'] = MD5('micar123');
        $data['role'] = $this->input->post('role');
        $data['phone'] = $this->input->post('phone');
        $data['alt_phone'] = $this->input->post('alt_phone');
        $data['email'] = $this->input->post('email');
        $data['address'] = $this->input->post('address');
        $data['district_id'] = $this->input->post('district_id');
		$data['date_added'] = date('Y-m-d h:m:s');
		$data['added_by'] = $this->session->userdata('user_id');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_user->get_user_by_id($update_id);
		foreach ($query as $row) {
			$data['name'] = $row['name'];
			$data['username'] = $row['email'];
			$data['phone'] = $row['phone'];
			$data['alt_phone'] = $row['alt_phone'];
			$data['email'] = $row['email'];
			$data['address'] = $row['address'];
			$data['district_id'] = $row['district_id'];
			$data['role'] = $row['role'];
		}	
		return $data;
	}

	function save(){
		$this->check_session();
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('user_id',$update_id);
			$this->db->update('tblusers',$data);
		 }else{
			$this->db->insert('tblusers',$data);
		}

		$this->session->set_flashdata('message','User saved successfully');
			if($update_id !=''):
    			redirect('User/users');
			else:
				redirect('User/read');
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

		$data['page_title']  = 'Create User';
		$this->load->view($this->session->userdata('role').'/add_user',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('user_id',$param);
        $this->db->update('tblusers',$data);
    	$this->session->set_flashdata('message','User deleted successfully');
		redirect('User/users');
	}





}