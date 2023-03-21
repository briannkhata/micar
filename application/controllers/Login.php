<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	
	function signin(){   
	 if (isset($_POST['login']) && !empty($_POST['phone'])){
			$phone	=	$this->input->post('phone');
  			$password	=	md5($this->input->post('password'));
			//$password	=	$this->input->post('password');
            $login = $this->db->query("SELECT * FROM tblusers WHERE phone='$phone' AND password='$password' AND deleted = 0");
			$row = $login->row();
			if (isset($row))
				{
					 $name		=	$row->name;
					 $user_id	=	$row->user_id;
					 $role	=	$row->role;
					 $this->session->set_userdata('user_login', '1');
					 $this->session->set_userdata('user_id',$user_id);
					 $this->session->set_userdata('role',$role);
                     $this->session->set_userdata('name',$name);
                     redirect('User');
					}
					$this->session->set_flashdata('message','Invalid Username or Password');
                     redirect(base_url().'Home/login');
			    }
	}

	function logout(){
        //$this->M_user->get_setonline_status_to_off($this->session->userdata('user_id'));
        $this->session->sess_destroy();
		redirect('/Home/login');
	}
}