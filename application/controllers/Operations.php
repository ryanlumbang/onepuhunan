<?php

    //Author : Ronald San Pedro, Jr.
    //Date   : October 21, 2016

    class Operations extends CI_Controller {
        public function _construct() {
            parent::__construct();
        }
        
        public function index() {
            $this->load->model("Operations_model");          
            $data["query"] = $this->Operations_model->client_catalog();
            $data["number_of_rows"] = count($data["query"]);
            $this->load->view("operations/client_catalog", $data);
        }
        
        public function client_info($input) {
            $this->load->model("Operations_model");
            
            $data["client_info"]  = $this->Operations_model->client_info(str_pad(hexdec($input), 10, '0', STR_PAD_LEFT));
            $data["acct_history"] = $this->Operations_model->client_acct_history(str_pad(hexdec($input), 10, '0', STR_PAD_LEFT));
                    
            $data["result"] = array(
                "OurBranchID"       => $data["client_info"]["OurBranchID"],
                "BranchName"        => $data["client_info"]["BranchName"],
                "ClientID"          => $data["client_info"]["ClientID"],
                "Name"              => $data["client_info"]["Name"],
                "DateOfBirth"       => $data["client_info"]["DateOfBirth"],
                "ClientSince"       => $data["client_info"]["ClientSince"],
                "NoOfLoanAvailed"   => $data["client_info"]["NoOfLoanAvailed"],
                "MarStatDesc"       => $data["client_info"]["MarStatDesc"],
                "LitLvlDesc"        => $data["client_info"]["LitLvlDesc"],
                "Mobile"            => $data["client_info"]["Mobile"],
                "Address1"          => $data["client_info"]["Address1"],
                "Address2"          => $data["client_info"]["Address2"],
                "City"              => $data["client_info"]["City"],
                "NumberOfHHMembers" => $data["client_info"]["NumberOfHHMembers"],
                "BusName"           => $data["client_info"]["BusName"],
                "BusinessAdd"       => $data["client_info"]["BusinessAdd"],
                "YearsInBus"        => $data["client_info"]["YearsInBus"],
                "BuSizeDesc"        => $data["client_info"]["BuSizeDesc"],
                "BTypeDesc"         => $data["client_info"]["BTypeDesc"]
            );
            
            $this->load->view("operations/client_info", $data);
        }
        
        public function los() {
           $this->load->model("Operations_model");

           $arraydata['ln_branch'] = $this->Operations_model->get_ln_branch();
           foreach((array) $arraydata['ln_branch'] as $key => $value) {
               $arraydata['ln_branch'][$key]['ln_status'] = $this->Operations_model->get_los_laf_status($value['BranchCode']);
           }
           
           $this->load->view("operations/los_dashboard", $arraydata);  
        }
                
        public function los_pending($dateData, $branchId, $groupId) {
            $session = array(
                "datedata" => $dateData,
                "branchid" => $branchId,
                "groupid"  => $groupId
            );
            $this->session->set_userdata($session);
            
            $this->load->view("operations/los");
        }
        
        public function los_info() {
            $this->load->model("Operations_model");
            $input = $this->uri->segment(6);
            
            $data = array(
                "cl_info"    => $this->Operations_model->get_los_laf_details($input),
                "cl_asset"   => $this->Operations_model->get_los_laf_asset_liabilities($input),
                "cl_error"   => $this->Operations_model->get_los_laf_err($input),
                "cl_remarks" => $this->Operations_model->get_los_laf_hist_remarks($input),
                "cl_tags"    => $this->Operations_model->get_los_laf_tags($input)
            );

            $this->load->view("operations/los_info", $data);
        }
                
        /* for individual approving/rejecting/reverting of accounts */
        public function los_laf_approval() {
            $this->load->model("Operations_model");

            $input = array();
            $header = "Submission Successful!";
            $content = "You have successfully submitted the application for the next processing.";
            
            if (isset($_POST['btn_approve'])) {
                $input = array(
                    "FileNo"      => $this->input->post("txt_fileno"),
                    "Approval"    => "APR",
                    "Remarks"     => $this->input->post("txt_remarks"),
                    "ProcessedBy" => $this->session->emp_id
                );
            } elseif (isset($_POST['btn_reject'])) {
                $input = array(
                    "FileNo"      => $this->input->post("txt_fileno"),
                    "Approval"    => "REJ",
                    "Remarks"     => $this->input->post("txt_remarks"),
                    "ProcessedBy" => $this->session->emp_id
                );
            } else {
                $input = array(
                    "FileNo"      => $this->input->post("txt_fileno"),
                    "Approval"    => "REV",
                    "Remarks"     => $this->input->post("txt_remarks"),
                    "ProcessedBy" => $this->session->emp_id
                );                
            }

           $this->Operations_model->set_los_laf_approval($input);
           $this->session->set_flashdata('message', '<i class="uk-icon-check-circle-o uk-icon-medium"></i>&nbsp;&nbsp;' . $header . '<br><small>' . $content . '</small>');
           
           if($this->session->records_count - 1 == 0) {
               redirect("operations/los");
           } else {
               $branchId = $this->session->branchid;
               $groupId  = $this->session->groupid;
               $dateData = $this->session->datedata;
               redirect("operations/los/" . $dateData . '/' . $branchId . '/' . $groupId);
           }
        }
        
        /* javascript: for bulk approving/rejecting/reverting of accounts  */
        public function los_laf($fileno, $approval) {
            $this->load->model("Operations_model");

            $header = "Submission Successful!";
            $content = "You have successfully submitted the application for the next processing.";
            
            $input = array(
                "FileNo"      => $fileno,
                "Approval"    => $approval,
                "Remarks"     => '',
                "ProcessedBy" => $this->session->emp_id
            );
            
            $this->Operations_model->set_los_laf_approval($input);
            $this->session->set_flashdata('message', '<i class="uk-icon-check-circle-o uk-icon-medium"></i>&nbsp;&nbsp;' . $header . '<br><small>' . $content . '</small>');
        }
        
        /* AJAX's */
        public function ops_pending_app() {
            $this->load->model("Operations_model");

            $input = array(
                "_roleid"      => $this->session->role_id,
                "_ourbranchid" => $this->session->branchid,
                "_groupid"     => $this->session->groupid,
                "_asofdate"    => $this->session->datedata
            );
            
            $data["query"] = $this->Operations_model->get_laf_pending($input); 
            
            $session = array("records_count" => count($data['query']));
            $this->session->set_userdata($session);
            
            echo "{ \"data\" : " . json_encode($data["query"]) . "}";
        }
        
        public function get_ln_branch() {
            $this->load->model("Operations_model");
            $data["query"] = $this->Operations_model->get_ln_branch();
            echo "{ \"data\" : " . json_encode($data["query"]) . "}";
        }

    }
    
    