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
            $query = $los_db->query("SELECT * FROM sp_los_laf_pending_rev(?, ?, ?, ?)", $input);
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
        
    }