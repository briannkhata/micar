<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

		function index(){
			$data['page_title']  = 'Home';
			$this->load->view('index',$data);		
			
			//echo $_SERVER["HTTP_CF_IPCOUNTRY"];
		}



		function login(){
			$data['page_title']  = 'Login';
			$this->load->view('login',$data);			
		}

		function register(){
			$data['page_title']  = 'Create Account';
			$this->load->view('register',$data);			
		}

		function about(){
			$data['page_title']  = 'About';
			$this->load->view('about',$data);			
		}

		function privacy(){
			$data['page_title']  = 'Privacy';
			$this->load->view('privacy',$data);
		}

		function contact(){
			$data['page_title']  = 'Contact Us';
			$this->load->view('contact',$data);
		}

		function cars(){
			$data['page_title']  = 'Car Listing ';
			$this->load->view('cars',$data);
		}

		function car_details($param=''){
			$data['page_title']  = 'Car Details';			
			$data['car_id'] = $param;
			$this->load->view('car_details',$data);
		}

		function how_it_works(){
			$data['page_title']  = 'How it Works';
			$this->load->view('how_it_works',$data);
		}

		function careers(){
			$data['page_title']  = 'Careers';
			$this->load->view('careers',$data);
		}

		function terms(){
			$data['page_title']  = 'terms';
			$this->load->view('terms',$data);
		}

		function faq(){
			$data['page_title']  = 'FAQs';
			$this->load->view('faq',$data);
		}



	function register_user(){
        $data['name'] = $this->input->post('name');
        $data['account_type'] = 'seller';
        $data['password'] = MD5($this->input->post('password'));
        $data['phone'] = $this->input->post('phone');
        $data['email'] = $this->input->post('email');
        $data['username'] = $this->input->post('username');
        $data['date_added'] = date('Y-m-d h:m:i');
        $this->db->insert('tblusers',$data);
        $this->session->set_flashdata('message','You Account has been created Successfully');
        redirect("Home/register");
    }

    function saveMessage(){
        $data['name'] = $this->input->post('name');
        $data['phone'] = $this->input->post('phone');
        $data['email'] = $this->input->post('email');
        $data['message'] = $this->input->post('message');
        $data['date_added'] = date('Y-m-d h:m:i');
        $this->db->insert('tblmessages',$data);
        $this->session->set_flashdata('message','Your has been sent Successfully');
        redirect("Home/contact");
    }

    function applyJob(){
        $data['name'] = $this->input->post('name');
        $data['phone'] = $this->input->post('phone');
        $data['email'] = $this->input->post('email');
        $data['qualification'] = $this->input->post('qualification');
        $data['location'] = $this->input->post('location');
        $data['post'] = $this->input->post('post');
        $data['date_applied'] = date('Y-m-d h:m:i');
        $this->db->insert('tblapplicants',$data);
        $this->session->set_flashdata('message','Application submited Successfully');
        redirect("Home/careers");
    }
}