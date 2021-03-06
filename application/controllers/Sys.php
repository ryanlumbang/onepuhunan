<?php

    //Author : Ronald San Pedro, Jr.
    //Date   : December 7, 2016

    class Sys extends CI_Controller {
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
            $this->load->model("System_model");
            $data["query"] = $this->System_model->registration_request();
            $data["number_of_rows"] = count($data["query"]);
            $this->load->view("sys/registration_request", $data); 
        }

        public function main_login() {
            $this->load->view("main/login.php");
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
            redirect(base_url()."sys/registration-request");
        }

        public function client_rejected() {
            $this->load->model("System_model");
            $data["query"] = $this->System_model->get_client_rejected();
            $data["number_of_rows"] = count($data["query"]);
            $this->load->view("sys/client_rejected", $data);
        }

        public function reprocess_user($input) {
            $this->load->model("System_model");
            $this->System_model->reprocess_request($input);
            redirect(base_url()."sys/client_rejected");
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
                    "is_new"  => ($this->input->post("is_new")) ? $this->input->post("is_new") : '0',
                    "is_repeat"  => ($this->input->post("is_repeat")) ? $this->input->post("is_repeat") : '0',
                    "is_set"  => ($this->input->post("is_set")) ? $this->input->post("is_set") : '0',
                );
                $data["sp_tc_update"] = $this->System_model->update_tc_qt($input);
                $this->load->view("templates/update_tc", $data);
            }

        }

        public function assign_roles() {
            $this->load->model("System_model");

            $data["query"] = $this->System_model->get_userAccount();

            $this->load->view("sys/assign_role_id", $data);
        }

        public function manage_resign() {
            $this->load->model("System_model");

            if(isset($_POST["employee_id"])){
                $input = array(
                    "emp_id" => $_POST["default_emp_id"],
                    "role_id" =>  $_POST["rolename"]
                );

                if($_POST["rolename"] != 'rsg' ){
                    $this->System_model->update_role_resign_id($input);
                } else {
                    $this->System_model->update_resign_id($input);
                }

                $data["query"] = $this->System_model->get_userAccount();
                $this->load->view("sys/assign_role_id", $data);
            } else {

                $emp_id = ($_GET["emp_id"]);
                $result = $this->System_model->get_userAccountById($emp_id);
                $data = array (
                    'emp_id' => $result->emp_id,
                    'full_name' => $result->last_name." ".$result->first_name,
                    'email' => $result->email,
                    'job_title' => $result->job_title,
                    'role_id' => $result->role_id,
                    "ln_rolename"       => $this->System_model->get_roleID(),

                );
                $this->load->view("sys/manage_resign", $data);
            }

        }

        public function update_role_id() {

            $this->load->library("form_validation");
            $this->load->model("System_model");
            $employee_name = $this->input->post("employee_name");

            $header = "Role ID Successfully Update!";
            $content = "You have successfully changed Role ID of ".$employee_name;

            $data = array(
                "ln_rolename"       => $this->System_model->get_roleID(),
            );


            $config = array(
                array(
                    "field" => "role",
                    "label" => "role",
                    "rules" => "trim|required",
                    "errors" => array(
                        "required" => "<big class='uk-text-bold'>Required Field</big><br>The <b>\"%s\"</b> field is required."
                    )
                )
            );

            $this->form_validation->set_error_delimiters("<div class='uk-alert uk-alert-danger uk-text-small' data-uk-alert>", "</div>");
            $this->form_validation->set_rules($config);

            if($this->form_validation->run() == FALSE) {
                $this->load->view("templates/update_role_id", $data);
            } else {
                $input = array(
                    "role"  => $this->input->post("role")
            );

                $data["sp_upd_role_id"] = $this->System_model->update_role_id($input);
                $this->session->set_flashdata('message', '<i class="uk-icon-check-circle-o uk-icon-medium"></i>&nbsp;&nbsp;' . $header . '<br><small>' . $content . '</small>');
                $this->load->view("templates/update_role_id", $data);
            }

        }

        public function add_role_id() {

            $this->load->library("form_validation");
            $this->load->model("System_model");

            $role_name = $this->input->post("role_name");

            $header = "Role ID Successfully Added";
            $content = "Role ID for ".$role_name." has been added in the database.";

            $config = array(
                array(
                    "field" => "role_id",
                    "label" => "role_id",
                    "rules" => "trim|required",
                    "errors" => array(
                        "required" => "<big class='uk-text-bold'>Required Field</big><br>The <b>\"%s\"</b> field is required."
                    ),
                    array(
                        "field" => "role_name",
                        "label" => "role_name",
                        "rules" => "trim|required",
                        "errors" => array(
                            "required" => "<big class='uk-text-bold'>Required Field</big><br>The <b>\"%s\"</b> field is required."
                        )
                    )
                )
            );

            $this->form_validation->set_error_delimiters("<div class='uk-alert uk-alert-danger uk-text-small' data-uk-alert>", "</div>");
            $this->form_validation->set_rules($config);

            if($this->form_validation->run() == FALSE) {
                $this->load->view("sys/add_role_id");
            } else {
                $input = array(
                    "role_id"  => $this->input->post("role_id"),
                    "role_name"  => $this->input->post("role_name")
                );

                $data["sp_add_role_id"] = $this->System_model->set_role_id($input);
                $this->session->set_flashdata('message', '<i class="uk-icon-check-circle-o uk-icon-medium"></i>&nbsp;&nbsp;' . $header . '<br><small>' . $content . '</small>');
                $this->load->view("sys/add_role_id", $data);
            }
        }


    }
