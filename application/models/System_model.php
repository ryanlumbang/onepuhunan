<?php

    //@Author: Ronald San Pedro, Jr.
    //Date   : December 7, 2016

    class System_model extends CI_Model {
        
        public function _construct() {
            parent::__construct();
        }
        
        public function registration_request() {
            $input = $this->input->post("reg_name");
            $search_str = !empty($input) ? $input : " ";
            
            $query = $this->db->query("SELECT * FROM sp_uc_acct_approval( ? )", $search_str);
            return $query->result_array();
        }
        
        public function approve_request($input) {
            $query = $this->db->query("SELECT sp_uc_upd_acct_approval( ?, ? )", $input);
            $row = $query->row();
            
            if( isset($row) ) {
                return $row->sp_uc_upd_acct_approval;
            }
        }
        
        public function get_employee_name($input) {
            $qry = $this->db->query("SELECT emp_name, emp_email FROM sp_uc_sel_emp_name( ? ) AS (emp_name text, emp_email text)", $input);
            return $qry->row_array();
        }

        public function get_tc_questions() {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT * FROM sp_tc_questions()");
            return $query->result_array();
        }


        public function add_tc_qt($input) {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT sp_tc_add ( ?, ?, ?, ? )", $input);
            $row = $query->row();

            if( isset($row) ) {
                return $row->sp_tc_add;
            }
        }
        public function update_tc_qt($input) {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT sp_tc_update ( ?, ?, ?, ?, ? )", $input);
            $row = $query->row();

            if( isset($row) ) {
                return $row->sp_tc_update;
            }
        }
        function get_question($question_id)
        {
            $los_db = $this->load->database("LOS", true);
            $sql = 'SELECT * FROM sp_tc_questions() WHERE question_id=?';
            $query = $los_db->query($sql, array($question_id));
            return $query->row();
        }

        function update_question($data)
        {
            $los_db = $this->load->database("LOS", true);
            $los_db->where(array('question_no' => $data['question_no']));
            $los_db->update('SELECT * FROM sp_tc_questions()', $data);
        }


    }
