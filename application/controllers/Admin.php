<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {

	function index(){
		$data['page_title']  = 'Admin Login';
		$this->load->view('admin/index',$data);			
	}

	function dashboard(){
		$data['page_title']  = 'Admin Dashboard';
		$this->load->view('admin/dashboard',$data);			
	}

	function users(){
		$data['page_title']  = 'Users';
		$this->load->view('admin/users',$data);
	}

	function messages(){
		$data['page_title']  = 'Messages';
		$this->load->view('admin/messages',$data);			
	}

	function settings(){
		$data['page_title']  = 'Settings';
		$this->load->view('admin/settings',$data);			
	}

	function payments(){
		$data['page_title']  = 'Payments';
		$this->load->view('admin/payments',$data);
	}

	function services(){
		$data['page_title']  = 'Services';
		$this->load->view('admin/services',$data);			
	}

	function testimonials(){
		$data['page_title']  = 'Testimonials';
		$this->load->view('admin/testimonials',$data);			
	}

	function clients(){
		$data['page_title']  = 'Clients';
		$this->load->view('admin/clients',$data);			
	}

	function addClient(){
		$data['page_title']  = 'Add Client	';
		$this->load->view('admin/addClient',$data);			
	}

	function users(){
		$data['page_title']  = 'Users/Staff';
		$this->load->view('admin/users',$data);			
	}

	function values(){
		$data['page_title']  = 'Values';
		$this->load->view('admin/values',$data);			
	}

	function complaints(){
		$data['page_title']  = 'Complaints';
		$this->load->view('admin/complaints',$data);			
	}



	
	function deleteClient($param=""){
		$this->db->where("id",$param);
		$this->db->delete('clients');
		redirect("admin/clients");
	}

	function addSlide(){
		$data['page_title']  = 'Add Slide';
		$this->load->view('admin/addSlide',$data);			
	}

	function addWhy(){
		$data['page_title']  = 'Add Why Us';
		$this->load->view('admin/addWhy',$data);			
	}


	function editWhy($param=""){
		$data['page_title']  = 'Edit Why Us';
		$data['id']  = $param;
		$data['edit']  = $this->db->get_where("why",array('id'=>$param))->result_array();
		$this->load->view('admin/editWhy',$data);			
	}

	function editValue($param=""){
		$data['page_title']  = 'Edit Value';
		$data['id']  = $param;
		$data['edit']  = $this->db->get_where("values",array('id'=>$param))->result_array();
		$this->load->view('admin/editValue',$data);			
	}

	function editSlide($param=""){
		$data['page_title']  = 'Edit Slide';
		$data['id']  = $param;
		$data['edit']  = $this->db->get_where("slides",array('id'=>$param))->result_array();
		$this->load->view('admin/editSlide',$data);			
	}

	function editProduct($param=""){
		$data['page_title']  = 'Edit Product';
		$data['id']  = $param;
		$data['edit']  = $this->db->get_where("products",array('id'=>$param))->result_array();
		$this->load->view('admin/editProduct',$data);			
	}

	function addValue(){
		$data['page_title']  = 'Add Value';
		$this->load->view('admin/addValue',$data);			
	}

	function why(){
		$data['page_title']  = 'Why Us';
		$this->load->view('admin/why',$data);			
	}
	function saveWhy(){
		$data['why'] = $this->input->post('why');
		$data['desc'] = $this->input->post('desc');
		$this->db->insert('why',$data);
		redirect("admin/why");
	}

	function saveSlide(){
		$data['title'] = $this->input->post('title');
		$data['image'] = $_FILES['image']['name'];
		$data['desc'] = $this->input->post('desc');
		$data['details'] = $this->input->post('details');
		move_uploaded_file($_FILES['image']['tmp_name'],"uploads/slides/".$data['image']);
		$this->db->insert('slides',$data);
		redirect("admin/slides");
	}

	

	function updateWhy(){
		$id= $this->input->post('id');
		$data['why'] = $this->input->post('why');
		$data['desc'] = $this->input->post('desc');
		$this->db->where('id',$id);
		$this->db->update('why',$data);
		redirect("admin/why");
	}

	function updateSlide(){
		$id= $this->input->post('id');
		$data['title'] = $this->input->post('title');
		$data['desc'] = $this->input->post('desc');
		$data['details'] = $this->input->post('details');
		if ($_FILES['image']['size'] == 0 && $_FILES['image']['error'] == 0){
			$data['image'] = $_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],"uploads/slides/".$data['image']);
		}
		$this->db->where('id',$id);
		$this->db->update('slides',$data);
		redirect("admin/slides");
	}

	function saveUser(){
		$data['name'] = $this->input->post('name');
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$data['position'] = $this->input->post('position');
		$data['role'] = "staff";
		$data['photo'] = $_FILES['image']['name'];
		$data['desc'] = $this->input->post('desc');
		move_uploaded_file($_FILES['image']['tmp_name'],"uploads/users/".$data['photo']);
		$this->db->insert('users',$data);
		redirect("admin/users");
	}

	
	function saveClient(){
		$data['name'] = $this->input->post('name');
		$data['business'] = $this->input->post('business');
		//$data['photo'] = $_FILES['photo']['name'];
		$data['desc'] = $this->input->post('desc');
		//move_uploaded_file($_FILES['photo']['tmp_name'],"uploads/users/".$data['photo']);
		$this->db->insert('clients',$data);
		redirect("admin/clients");
	}

	function deleteSlide($param=""){
		$this->db->where("id",$param);
		$this->db->delete('slides');
		redirect("admin/slides");
	}

	function deleteWhy($param=""){
		$this->db->where("id",$param);
		$this->db->delete('products');
		redirect("admin/products");
	}


	function deleteMessage($param=""){
		$this->db->where("id",$param);
		$this->db->delete('messages');
		redirect("admin/messages");
	}
	
	function addTestimonial(){
		$data['page_title']  = 'Add Testimonial';
		$this->load->view('admin/addTestimonial',$data);			
	}

	function saveTestimonial(){
		$data['name'] = $this->input->post('name');
		$data['testimonial'] = $this->input->post('testimonial');
		$data['occupation'] = $this->input->post('occupation');
		$this->db->insert('testimonials',$data);
		redirect("admin/testimonials");
	}


	
	function deleteTestimonial($param=""){
		$this->db->where("id",$param);
		$this->db->delete('testimonials');
		redirect("admin/testimonials");
	}

	function addService(){
		$data['page_title']  = 'Add Service';
		$this->load->view('admin/addService',$data);			
	}

	function addUser(){
		$data['page_title']  = 'Add User';
		$this->load->view('admin/addUser',$data);			
	}

	function deleteUser($param=""){
		$this->db->where("user_id",$param);
		$this->db->delete('users');
		redirect("admin/users");
	}

	function deleteNote($param=""){
		$this->db->where("id",$param);
		$this->db->delete('notes');
		redirect("admin/notes");
	}

	function deleteService($param=""){
		$this->db->where("id",$param);
		$this->db->delete('services');
		redirect("admin/services");
	}

	function deleteValue($param=""){
		$this->db->where("id",$param);
		$this->db->delete('values');
		redirect("admin/values");
	}

	function saveService(){
		$data['service'] = $this->input->post('service');
		$this->db->insert('services',$data);
		redirect("admin/services");
	}

	function saveValue(){
		$data['value'] = $this->input->post('value');
		$data['desc'] = $this->input->post('desc');
		$this->db->insert('values',$data);
		redirect("admin/values");
	}

	function saveSettings(){
		$data['company'] = $this->input->post('company');
		$data['email1'] = $this->input->post('email1');
		$data['email2'] = $this->input->post('email2');
		$data['email3'] = $this->input->post('email3');
		$data['phone1'] = $this->input->post('phone1');
		$data['phone2'] = $this->input->post('phone2');
		$data['phone3'] = $this->input->post('phone3');
		$data['history'] = $this->input->post('history');
		$data['vision'] = $this->input->post('vision');
		$data['mission'] = $this->input->post('mission');
		$data['address'] = $this->input->post('address');
		$data['motto'] = $this->input->post('motto');
		$data['about'] = $this->input->post('about');
		$data['privacy'] = $this->input->post('privacy');
		$data['terms'] = $this->input->post('terms');
		$data['cookie_policy'] = $this->input->post('cookie_policy');
		$data['tcs'] = $this->input->post('tcs');
		$data['twitter'] = $this->input->post('twitter');
		$data['instagram'] = $this->input->post('instagram');
		$data['facebook'] = $this->input->post('facebook');
		$data['whatsapp'] = $this->input->post('whatsapp');
		$id = $this->input->post('id');
		$this->db->where("id",$id);
		$this->db->update('settings',$data);
		redirect("admin/settings");
	}

	function login(){   
		
 	  $username	=	$this->input->post('username');
	  $password	=	$this->input->post('password');	
	  $admin = $this->db->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
	  $row = $admin->row();
		if (isset($row))
		{
			$username   =	$row->username;
			$name		=	$row->name;
			$user_id	=	$row->user_id;
			$this->session->set_userdata('user_login', '1');
			$this->session->set_userdata('user_id',$user_id);
			$this->session->set_userdata('name',$name);
			redirect(base_url().'admin/dashboard', 'refresh');
		}
		
		$data['page_title']  = 'Login';
		$this->session->set_flashdata('message','Invalid Username or Password');
		return $this->load->view('admin/index',$data);
    }

	
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

	
}