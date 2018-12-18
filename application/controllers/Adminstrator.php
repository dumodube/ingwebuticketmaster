<?php

class Adminstrator extends CI_Controller
{
	
	public function index(){
	
	
	$data['title']= 'Latest Tickets';
	$data['posts']= $this->post_model->get_posts();

		$this -> load ->view('templates/admin_header');
		$this -> load ->view('posts/index', $data);
		$this -> load ->view('templates/footer');
	}

	public function view($slug = NULL){
		
		$data['post'] = $this->post_model->get_posts($slug);
		

		if(empty($data['post'])){
			show_404();
		}

		
		$data['title'] =$data['post']['title'];
		$this -> load ->view('templates/admin_header');
		$this -> load ->view('posts/admin_view', $data);
		$this -> load ->view('templates/footer');
	}


	public function create(){
		


		$data['title'] ='Create Ticket';
		// $data['categories'] = $this->post_model->get_categories();

		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('body','Body','required');

		if($this->form_validation->run()===FALSE){
			$this -> load ->view('templates/admin_header');
			$this -> load ->view('posts/create', $data);
			$this -> load ->view('templates/footer');
		}else{
			// Upload an image
			$config['upload_path'] = './assets/images/posts';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload()){
				$errors = array('error' => $this->upload->display_errors());
				$post_image = 'noimage.jpg';
			}else{
				$data= array('upload_data'=> $this->upload->data());
				$post_image = $_FILES['userfile']['name'];
			}

			$this->post_model->create_post($post_image);

			//Set message
            $this->session->set_flashdata('ticket_created','You have successfully created a ticket, We are attending to your case');


			redirect('home');
		}
		
	}



	public function edit($slug){
		if(!$this->session->userdata('loggen_in')){
			redirect('users/login');
		}
		$data['post'] = $this->post_model->get_posts($slug);
		
		if($this->session->userdata('user_id') != $this->post_model->get_posts($slug)['user_id']){
			redirect('posts');
		}

		$data['categories'] = $this->post_model->get_categories();
		
		if(empty($data['post'])){
			show_404();
		}

		$data['title'] ='Edit Post';

		$this -> load ->view('templates/admin_header');
		$this -> load ->view('posts/edit', $data);
		$this -> load ->view('templates/footer');
	}


	public function update(){
		if(!$this->session->userdata('loggen_in')){
			redirect('users/login');
		}

		$this->post_model->update_post();

		//Set message
		$this->session->set_flashdata('updated','Ticket has been updated');

		redirect('posts');
	}


	
// Login user
public function login(){
	$data['title']='Sign in';

	
	$this->form_validation->set_rules('username','Username','required');
	$this->form_validation->set_rules('password','Password','required');
	


	if($this->form_validation->run() === FALSE){
		$this->load->view('templates/header');
		$this->load->view('users/login',$data);
		$this->load->view('templates/footer');

	}else{
		// Get username
		$username = $this->input->post('username');
		// Get and encrypt the password
		$password = md5($this->input->post('password'));

		// Login user
		$user_id = $this->user_model->login('admin',$username,$password);

		if($user_id){
			// Create Session
			$user_data = array(
				'user_id'=> $user_id,
				'username' => $username,
				'logged_in' => true,

			);

		   

			$this->session->set_userdata($user_data);



			 //Set message
			 $this->session->set_flashdata('user_loggedin','You are now logged in');
			 redirect('posts/index');
		}else{
			//Set message
			$this->session->set_flashdata('login_failed','Login is invalid');
			redirect('users/login');
		}
		
		
	}
}

// Logout user
public function logout(){
	// Unset user data
	$this->session->unset_userdata('logged_in');
	$this->session->unset_userdata('user_id');
	$this->session->unset_userdata('username');

	$this->session->set_flashdata('user_logout','You are now logged out, Login to continue');
	   
	
	redirect('users/login');
}

// Check username exists
public function check_username_exists($username){
	$this->form_validation->set_message('
	check_username_exists','That username is taken.
	Please choose a differnt one
	');
	if($this->user_model->check_username_exists($username)){
		return true;
	}else{
		return false;
	}
}

public function check_email_exists($email){
	$this->form_validation->set_message('check_email_exists','That email is taken.Please choose a differnt one.');
	if($this->user_model->check_email_exists($email)){
		return true;
	}else{
		return false;
	}
}



}



?>