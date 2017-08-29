<?php

    //@Author: Ronald San Pedro, Jr.
    //Date   : December 7, 2016

    class System_model extends CI_Model {
        
        public function __construct() {
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

        public function reprocess_request($input) {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT sp_los_laf_rev_rej( ? )", $input);
            return $query->row_array();


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

        public function get_client_rejected() {
            $los_db = $this->load->database("LOS", true);
            $query = $los_db->query("SELECT * FROM sp_get_rejected_client()");
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

//            $qno = $this->input->post("question_no");
//            $questions = $this->input->post("question");
//            $new = $this->input->post("new");
//            $rep = $this->input->post("rep");
//            $set = $this->input->post("set");
//
//            $input = array(
//                "qno" => $qno,
//                "questions" =>  $questions,
//                "new" => $new,
//                "rep" =>  $rep,
//                "set" => $set
//            );

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

        function get_userAccount()
        {
            $query = $this->db->query("SELECT * FROM sp_user_account()");
            return $query->result_array();
        }

        function get_userAccountById($id)
        {
            $query = $this->db->query("SELECT * FROM \"t_UserAccount\" WHERE emp_id = (?)", $id);
            return $query->row();
        }

        public function update_role_resign_id($input) {
            $query = $this->db->query("SELECT sp_upd_role_id ( ?, ?)", $input);
            $row = $query->row();

            if( isset($row) ) {
                return $row->update_role_resign_id;
            }
        }

        public function update_role_id() {

            $employee_id = $this->input->post("emp_id");
            $role = $this->input->post("role");

            $input = array(
                "emp_id" => $employee_id,
                "role" =>  $role
            );

            $query = $this->db->query("SELECT sp_upd_role_id ( ?, ?)", $input);
            $row = $query->row();

            if( isset($row) ) {
                return $row->sp_upd_role_id;
            }
        }

        public function update_resign_id($input) {

            $query = $this->db->query("SELECT sp_upd_resign_id ( ?, ?)", $input);
            $row = $query->row();

            if( isset($row) ) {
                return $row->sp_upd_resign_id;
            }
        }

        public function set_role_id() {

            $role_id = $this->input->post("role_id");
            $role_name = $this->input->post("role_name");
            $date = $this->input->post("date_added");


            $input = array(
                "role_id" => $role_id,
                "role_name" =>  $role_name,
                "date" =>  $date
            );

            $query = $this->db->query("SELECT sp_add_role_id ( ?, ?, ?)", $input);
            $row = $query->row();

            if( isset($row) ) {
                return $row->sp_add_role_id;
            }
        }

        function get_roleID()
        {
            $query = $this->db->query('SELECT * FROM "t_LoginRoles"');
            return $query->result_array();
        }

    }
