<?php

    class Hr extends CI_Controller {
        public function __construct() {
            parent:: __construct();

            $this->load->library('session');
            if(!$this->session->userdata('logged_in')){
                if(current_url() != base_url()){
                    redirect(base_url());

                }
            }
        }
        
        public function index() {
            $this->load->view("hr/bulletin");
        }
    }
