<?php

    //Author : Ronald San Pedro, Jr.
    //Date   : December 7, 2016

    class Sys extends CI_Controller {
        public function _construct() {
            parent:: _construct();
        }
        
        public function index() {
            $this->load->model("System_model");
            $data["query"] = $this->System_model->registration_request();
            $data["number_of_rows"] = count($data["query"]);
            $this->load->view("sys/registration_request", $data); 
        }

        public function tc_question() {
            $this->load->model("System_model");
            $data = array (
                "tc_ques"       => $this->System_model->get_tc_questions()
            );
            $this->load->view("sys/tc_question", $data);
        }

        public function approve_user($input) {
            $this->load->model("System_model");
            
            $var = array(
                "_emp_id"   => (string)hexdec($input),
                "_approver" => $this->session->emp_id
            );
           
            $this->System_model->approve_request($var);
            
            $data["query"] = $this->System_model->get_employee_name((string)hexdec($input));

            $session = array(
                "emp_name"  => $data["query"]["emp_name"],
                "emp_email" => $data["query"]["emp_email"]
            );
            
            $this->send_mail($session);
            //$this->index();
            redirect(base_url()."sys/registration_request");
        }
        
        public function send_mail($session) {
            $this->load->library("email");
            
            $this->email->from("it.administrator@onepuhunan.com.ph", "OnePuhunan Service Portal")
                        ->to($session["emp_email"])
                        ->subject("OnePuhunan Service Portal Registration");
            
            $mail_body = $this->load->view("emails/registration_approve", $session, TRUE);
            $this->email->message($mail_body); 
            
            $this->email->send();
        }
        
        public function get_tc_questions() {
            $this->load->model("System_model");
            $data["query"] = $this->System_model->get_tc_questions();
            echo "{ \"data\" : " . json_encode($data["query"]) . "}";
        }

        public function add_tc_questions() {
            $this->load->library("form_validation");
            $this->load->model("System_model");

            $config = array(
                array(
                    "field" => "question",
                    "label" => "question",
                    "rules" => "trim|required",
                    "errors" => array(
                        "required" => "<big class='uk-text-bold'>Required Field</big><br>The <b>\"%s\"</b> field is required."
                    )
                )
            );

            $this->form_validation->set_error_delimiters("<div class='uk-alert uk-alert-danger uk-text-small' data-uk-alert>", "</div>");
            $this->form_validation->set_rules($config);

            if($this->form_validation->run() == FALSE) {
                $this->load->view("templates/add_tc");
            } else {
                $input = array(
                    "question"  => $this->input->post("question"),
                    "is_new"  => $this->input->post("is_new"),
                    "is_repeat"  => $this->input->post("is_repeat"),
                    "is_set"  => $this->input->post("is_set"),
                );

                $data["sp_tc_add"] = $this->System_model->add_tc_qt($input);
                $this->load->view("templates/add_tc", $data);
            }

        }
        public function update_tc_questions() {
            $this->load->library("form_validation");
            $this->load->model("System_model");

            $config = array(
                array(
                    "field" => "question",
                    "label" => "question",
                    "rules" => "trim|required",
                    "errors" => array(
                        "required" => "<big class='uk-text-bold'>Required Field</big><br>The <b>\"%s\"</b> field is required."
                    )
                )
            );

            $this->form_validation->set_error_delimiters("<div class='uk-alert uk-alert-danger uk-text-small' data-uk-alert>", "</div>");
            $this->form_validation->set_rules($config);

            if($this->form_validation->run() == FALSE) {
                $this->load->view("templates/update_tc");
            } else {
                $input = array(
                    "question_no"  => $this->input->post("question_no"),
                    "question"  => $this->input->post("question"),
                    "is_new"  => $this->input->post("is_new"),
                    "is_repeat"  => $this->input->post("is_repeat"),
                    "is_set"  => $this->input->post("is_set"),
                );

                $data["sp_tc_update"] = $this->System_model->update_tc_qt($input);
                $this->load->view("templates/update_tc", $data);
            }

        }

    }
