<?php 
    class Contacts extends CI_Controller{
        public function view(){
            $data['title']= 'My Contacts';


            $this -> load ->view('templates/header');
		    $this -> load ->view('contacts/view', $data);
		    $this -> load ->view('templates/footer');
        }
    }