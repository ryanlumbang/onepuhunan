<?php

    //@Author: Ronald San Pedro, Jr.
    //Date   : October 19, 2016

    class Operations_model extends CI_Model {
        
        public function _construct() {
            parent::__construct();
        }
        
        public function client_catalog() {
            $name = $this->input->post("c_name");
            if( trim($name) != "" ) {
                if (filter_input(INPUT_POST, 'chk-spouse')) {
                    $query = $this->db->query("SELECT * FROM sp_cc_sel_client( ?, 'true')", $name);
                } else {
                    $query = $this->db->query("SELECT * FROM sp_cc_sel_client( ?, 'false')", $name);
                }
                return $query->result_array();
            }
        }

        public function get_client_search() {
            $los_db = $this->load->database("LOS", true);
            $name = $this->input->post("c_name");
            if( trim($name) != "" ) {
                if (filter_input(INPUT_POST, 'chk-spouse')) {
                    $query = $los_db->query("SELECT * FROM sp_los_search_client( ?, 'true')", $name);
                } else {
                    $query = $los_db->query("SELECT * FROM sp_los_search_client( ?, 'false')", $name);
                }
                return $query->result_array();
            }
        }
        
        public function client_info($input) {
            $query = $this->db->query("SELECT * FROM sp_cc_user_info( ? )", $input);
            return $query->row_array();
        }
        
        public function client_acct_history($input) {
            $query = $this->db->query("SELECT * FROM sp_cc_acct_info( ? )", $input);
            return $query->result_array();
        }
        
        public function get_ln_branch() {
            //$query = $this->db->query("SELECT * FROM sp_ln_branch() LIMIT 5");
            //return $query->result_array();
            
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT * FROM sp_usr_emp_branch(?)", $this->session->emp_id);
            return $query->result_array();
        }

        public function get_laf_pending($input) {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT * FROM sp_los_laf_pending_rev_2(?, ?, ?, ?)", $input);
            return $query->result_array();
        }
        
        public function get_los_laf_details($input) {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT * FROM sp_los_laf_details(?)", $input);
            return $query->row_array();
        }
        
        public function get_los_laf_asset_liabilities($input) {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT * FROM sp_los_laf_asset_liabilities(?)", $input);
            return $query->result_array();
        }
        
        public function get_los_laf_err($input) {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT * FROM sp_los_laf_err(?)", $input);
            return $query->result_array();
        }
        
        public function set_los_laf_approval($input) {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT sp_los_laf_process(?, ?, ?, ?)", $input);
            return $query->row();
        }
        
        public function get_los_laf_status($input) {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT * FROM sp_los_laf_status_rev(?)", $input);
            return $query->result_array();
        }
        
        public function get_los_laf_hist_remarks($input) {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT * FROM sp_los_laf_hist_remarks(?)", $input);
            return $query->result_array();
        }
        
        public function get_los_laf_tags($input) {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT * FROM sp_los_laf_tags(?)", $input);
            return $query->row_array();
        }
        
        public function get_los_laf_tc_questions($input) {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT * FROM sp_los_laf_tc_question(?)", $input);
            return $query->result_array();
        }
        
        public function set_los_laf_tc_process($input) {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT sp_los_laf_tc_process(?, ?, ?, ?)", $input);
            return $query->row();
        }
        
        public function get_los_laf_tc_display($input) {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT * FROM sp_los_laf_tc_display(?)", $input);
            return $query->result_array();
        }
        
        public function get_los_laf_repeat_display($input) {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT * FROM sp_los_laf_repeat_display(?)", $input);
            return $query->row_array();
        }


        public function set_branch_handle($input) {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT sp_upd_emp_branch ( ?, ? )", $input);
            $row = $query->row();

            if( isset($row) ) {
                return $row->sp_upd_emp_branch;
            }
        }

        public function get_kyc_today() {
            $los_db = $this->load->database("LOS", true);
            $date = $this->input->post("hidden_date");
            $input = array(
                "date" =>  $date
            );
                $query = $los_db->query("SELECT * FROM sp_report_kyc_today( ?)", $input);
                return $query->result_array();
        }

        public function get_kyc_pending() {
            $los_db = $this->load->database("LOS", true);
            $sdate = $this->input->post("start_date");
            $edate = $this->input->post("end_date");
            $input = array(
                "sdate" =>  $sdate,
                "edate" =>  $edate,
            );
            $query = $los_db->query("SELECT * FROM sp_report_kyc_pending( ?, ?)", $input);
            return $query->result_array();
        }

        public function get_kyc_remarks() {
            $los_db = $this->load->database("LOS", true);
            $sdate = $this->input->post("start_date_remarks");
            $edate = $this->input->post("end_date_remarks");
            $loan_type = $this->input->post("loan_type");

            $input = array(
                "sdate" =>  $sdate,
                "edate" =>  $edate,
                "loan_type" => $loan_type
            );
            $query = $los_db->query("SELECT * FROM sp_report_kyc_remarks( ?, ?, ?)", $input);
            return $query->result_array();
        }

        public function get_bmv_remarks() {
            $los_db = $this->load->database("LOS", true);
            $sdate = $this->input->post("start_date_bmv_remarks");
            $edate = $this->input->post("end_date_bmv_remarks");
            $input = array(
                "sdate" =>  $sdate,
                "edate" =>  $edate,
            );
            $query = $los_db->query("SELECT * FROM sp_report_bmv_remarks( ?, ?)", $input);
            return $query->result_array();
        }

        public function get_bmv_pending() {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT * FROM sp_report_bmv_pending()");
            return $query->result_array();
        }

        public function get_bmv_pending_qa() {
            $los_db = $this->load->database("LOS", true);
            $branchcode = $this->input->post("branch_code");
            $loan_type = $this->input->post("loan_type");
            $input = array(
                "branchcode" =>  $branchcode,
                "loan_type" => $loan_type
            );
            $query = $los_db->query("SELECT * FROM sp_report_bmv_pending_qa( ?, ?)", $input);
            return $query->result_array();
        }

        public function get_qa_productivity() {
            $los_db = $this->load->database("LOS", true);
            $sdate = $this->input->post("select_date_qa");
            $input = array(
                "sdate" =>  $sdate
            );
            $query = $los_db->query("SELECT * FROM sp_report_qa_productivity( ?)", $input);
            return $query->result_array();
        }

        public function get_alaf_report() {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT * FROM sp_report_alaf_pending()");
            return $query->result_array();
        }

        public function get_tc_report() {
            $los_db = $this->load->database("LOS", true);
            $sdate = $this->input->post("select_date_tc");
            $input = array(
                "sdate" =>  $sdate
            );
            $query = $los_db->query("SELECT * FROM sp_report_tc_call( ?)", $input);
            return $query->result_array();
        }

        public function get_sanction_report() {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT * FROM sp_report_sanction_pending()");
            return $query->result_array();
        }


        public function get_kyc_rvrt() {
            $los_db = $this->load->database("LOS", true);
            $sdate = $this->input->post("start_date_rvrt");
            $edate = $this->input->post("end_date_rvrt");
            $input = array(
                "sdate" =>  $sdate,
                "edate" =>  $edate,
            );
            $query = $los_db->query("SELECT * FROM sp_report_kyc_rvrtd_applctn( ?, ?)", $input);
            return $query->result_array();
        }

        public function get_pro_pending_qa() {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT * FROM sp_los_laf_loan_pending() WHERE process_name = 'KYC' AND NOT as_of_date = '0'");
            return $query->result_array();
        }
        public function get_pro_pending_bm() {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT * FROM sp_los_laf_loan_pending() WHERE process_name = 'BMV' AND NOT as_of_date = '0'");
            return $query->result_array();
        }
        public function get_pro_pending_tc() {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT * FROM sp_los_laf_loan_pending() WHERE process_name = 'TC' AND NOT as_of_date = '0'" );
            return $query->result_array();
        }
        public function get_pro_pending_sanction() {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT * FROM sp_los_laf_loan_pending() WHERE process_name = 'SANCTION' AND NOT as_of_date = '0'");
            return $query->result_array();
        }

        function get_branchCode()
        {
            $query = $this->db->query('SELECT * FROM "t_Branch"');
            return $query->result_array();
        }

        public function get_asg_branch() {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT * FROM sp_usr_emp_branch(?)" , $this->session->emp_id);
            return $query->result_array();
        }

        public function update_sanction_waive($data){
            $los_db = $this->load->database("LOS", true);
            $los_db->insert('"t_Sanction_Waive"', $data);
        }

        public function get_sanction_waive() {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query('SELECT * FROM "t_Sanction_Waive"');
            return $query->result_array();
        }

    }