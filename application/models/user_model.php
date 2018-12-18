<?php 

    class User_model extends CI_Model{

        public function __construct()
 		{
 			$this -> load -> database();
		 }
		 

		// public function get_users(){


        //         $this->db->query('INSERT INTO posts(user_name) SELECT username FROM users');

                
        //         $query = $this->db->get();

        //         if($query->num_rows() != 0){
        //             return $query->result();
        //         }
        //         else{
        //             return false;
        //         }
        // }

        public function register($enc_password){
            //User data array
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $enc_password,
                'worker_number' => $this->input->post('worker_number'),
                
            );
           


            //Insert user
            return $this->db->insert('users',$data);
        }

        //  Get the users name
        

        // Login user
        public function login($type,$username,$password){
            // Validate
            
            $this->db->where('type',$username);
            $this->db->where('username',$username);
            $this->db->where('password',$password);

            $result = $this->db->get('users');

            if($result->num_rows() == 1){
                return $result->row(0)->id;
            }else{
                return false;
            }
        }
        // Check username exists
        public function check_username_exists($username){
            $query = $this->db->get_where('users',array('username'=>$username));

            if(empty($query->row_array())){
                return true;
            }else{
                return false;
            }
             

        }

       

        // Check email exists
        public function check_email_exists($email){
            $query = $this->db->get_where('users',array('email'=>$email));

            if(empty($query->row_array())){
                return true;
            }else{
                return false;
            }

        }

        // Gets the list of all the users from the database
        public function get_users(){
            $this->db->order_by('name');
            $query = $this->db->get('users');
            return $query->result_array();
        }

        // Gets each user posts
        public function get_user($id){
            $query = $this->db->get_where('users',array('id' => $id));
            return $query->row();
        }

        public function get_user_type($type){
            $query = $this->db->get_where('users',array('type'=>$type));
            return $query->row();
        }
    }