<?php

 	/**
 	* 
 	*/
 	class Post_Model extends CI_Model
 	{
 		
 		public function __construct()
 		{
 			$this -> load -> database();
		 }
		 


 		public function get_posts($id = FALSE, $limit = FALSE, $offset = FALSE){
			 if($limit){
				 $this->db->limit($limit,$offset);

			 }
			if($id === FALSE){
				// $this->db->join('priority','priority.priority_id = posts.priorities_id');
				$this->db->join('categories','categories.categories_id = posts.category_id');
				$this->db->order_by('posts.id','DESC');
				
				
				$query = $this ->db ->get('posts');
				return $query->result_array();
			}

			$query = $this->db->get_where('posts',array('id' => $id));
			return $query -> row_array();
		 }

		// This create the ticket
		 public function create_post($post_image){
			 $slug = url_title($this->input->post('title'));

			 $data = array(
				 'title' => $this->input->post('title'),
				 'slug' => $slug,
				 'body' => $this->input->post('body'),
				 'category_id'=>$this->input->post('category_id'),
				 'user_id' => $this->session->userdata('user_id'),
				 'user_name' => $this->session->userdata('username'),

			 );

			 $users = $this->input->post('username');

			 return $this->db->insert('posts',$data);
		 }
		//  For deleting posts
		 public function delete_post($id){
			$this->db->where('id', $id);
			$this->db->delete('posts');
			return true;
		 }
		//  updating a post
		 public function update_post(){
			$slug = url_title($this->input->post('title'));

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'category_id' => $this->input->post('category_id'),
				

			);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('posts',$data);
		 }


		public function get_categories(){
			$this->db->order_by('name');
			$query = $this->db->get('categories');
			return $query->result_array();
		} 

		public function get_priority(){
			$this->db->order_by('name');
			$query = $this->db->get('priority');
			return $query->result_array();
		
		}

		public function get_posts_by_category($categories_id){
			$this->db->order_by('posts.id','DESC');
			$this->db->join('categories','categories.categories_id = posts.category_id');
			
			$query = $this->db->get_where('posts',array(
				'category_id' => $categories_id,
			));
			return $query ->result_array();
		} 










		public function	get_post_by_user($user_id){
			$this->db->order_by('posts.id','DESC');
			$this->db->join('users','users.id= posts.user_id');
			$query = $this->db->get_where('posts',array('user_id'=>$user_id));

			return $query->result_array();
		}
	 }

	 	
	 
	 ?>