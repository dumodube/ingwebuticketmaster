<?php 

class Categories extends CI_Controller{
    public function index(){
        $data['title'] = 'Categories';

        $data['categories'] = $this->category_model->get_categories();

        $this->load->view('templates/admin_header');
        $this->load->view('categories/index',$data);
        $this->load->view('templates/footer');
    }



    public function create(){
        $data['title'] = 'Create Category';
        $this->form_validation->set_rules('name','Name','required');
        
        if($this->form_validation->run() === FALSE){

            $this->load->view('templates/admin_header');
            $this->load->view('categories/create',$data);
            $this->load->view('templates/footer');
        }else{
            $this->category_model->create_category();
            redirect('admin/categories');
        }

    }

    public function posts($categories_id){

        $data['title'] = $this->category_model->get_category($categories_id)->name;

        $data['posts'] = $this->post_model->get_posts_by_category($categories_id);

        $this->load->view('templates/admin_header');
        $this->load->view('posts/index',$data);
        $this->load->view('templates/footer');
    }
}