<?php

class Category_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_categories(){
        $this->db->order_by('name');
        $query = $this->db->get('categories');
        return $query->result_array();
    } 

    public function create_category(){
        $data = array(
            'name' => $this->input->post('name'),
        );

        return $this->db->insert('categories',$data);
    }

    public function get_category($categories_id){
        $query = $this->db->get_where('categories',array('categories_id'=>$categories_id));
        
        return $query->row();
    }

    public function get_posts_by_category($categories_id){
        $this->db->order_by('posts.id','DESC');

        
        
        $query = $this->db->get('categories');
        return $query ->result_array();
    } 
}