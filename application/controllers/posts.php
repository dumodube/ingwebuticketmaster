<?php

class Posts extends CI_Controller
{
	
	public function index($offset = 0){

	// pagination configuration
	$config['base_url']=base_url() . 'posts/index';
	$config['total_rows']=$this->db->count_all('posts');
	$config['per_page']=10;
	$config['uri_segment']=3;
	$config['attributes']=array('class','pagination');


	$data['title']= 'Your Tickets';
	$data['posts']= $this->post_model->get_posts(FALSE,$config['per_page'],$offset);

		$this -> load ->view('templates/header');
		$this -> load ->view('posts/index', $data);
		$this -> load ->view('templates/footer');
	}




// This is the view section of the page
	public function view($id = NULL){
		
		$data['post'] = $this->post_model->get_posts($id);
		$post_id = $data['post']['id'];
		$data['comments']= $this->comment_model->get_comments($post_id);


		if(empty($data['post'])){
			show_404();
		}

		
		$data['title'] =$data['post']['title'];
		$this -> load ->view('templates/header');
		$this -> load ->view('posts/view', $data);
		$this -> load ->view('templates/footer');
	}


// This is the create section of the page
	public function create(){
		


		$data['title'] ='Create Ticket';
		$data['categories'] = $this->post_model->get_categories();
		$data['priority'] = $this->post_model->get_priority();
		
		// $data['username'] = $this->post_model->create_post();

		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('body','Body','required');

		if($this->form_validation->run()===FALSE){
			$this -> load ->view('templates/header');
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

		
			
		



	

// This is the edit section
	public function edit($slug){

		$data['post'] = $this->post_model->get_posts($slug);
		
		if($this->session->userdata('user_id') != $this->post_model->get_posts($slug)['user_id']){
			redirect('posts');
		}

		$data['categories'] = $this->post_model->get_categories();
		
		if(empty($data['post'])){
			show_404();
		}

		$data['title'] ='Edit Post';

		$this -> load ->view('templates/header');
		$this -> load ->view('posts/edit', $data);
		$this -> load ->view('templates/footer');
	}


	public function update(){
		$this->post_model->update_post();

		//Set message
		$this->session->set_flashdata('updated','Ticket has been updated');

		redirect('posts');
	}


	
}


?>