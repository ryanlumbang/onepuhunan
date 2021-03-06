<?php

//@Author: Ronald San Pedro, Jr.
//Date   : October 21, 2016

class Application_model extends CI_Model {
    public function __construct() {
        parent:: __construct();
    }

    public function get_dept_list() {
        $this->db->select(" t1.\"dept_id\", t1.\"dept_name\" ")
            ->order_by(" t1.\"dept_name\" ");

        $query = $this->db->get(" \"t_Department\" t1 ");
        return $query->result_array();
    }
    public function get_set_password($input) {
        $query = $this->db->query("SELECT sp_ua_fgot_pass_validation( ? )", $input);
        $row = $query->row();

        if ( isset($row) ) {
            return $row->sp_ua_fgot_pass_validation;
        }
    }

    public function get_confirm($input) {
        $query = $this->db->query("SELECT sp_ua_confirm_validation(?,?)", $input);
        $row = $query->row();

        if ( isset($row) ) {
            return $row->sp_ua_confirm_validation;
        }
    }

    public function get_user_account($input) {
        $query = $this->db->query("SELECT sp_ua_login_validation( ?, ? )", $input);
        $row = $query->row();

        if ( isset($row) ) {
            return $row->sp_ua_login_validation;
        }
    }


    public function set_user_logout($input) {
        $query = $this->db->query("SELECT sp_ua_logout_validation( ? )", $input);
        $row = $query->row();

        if(isset($row)) {
            return $row->sp_ua_logout_validation;
        }
    }

    public function set_user_account($input) {
        $query = $this->db->query("SELECT sp_ua_create_acct( ?, ?, ?, ?, ?, ?, ?, ? )", $input);
        $row = $query->row();

        if( isset($row) ) {
            return $row->sp_ua_create_acct;
        }
    }

    public function get_user_account_info($input) {
        $query = $this->db->query("SELECT * FROM sp_ua_sel_user_acct( ? )", $input);
        return $query->row_array();
    }

    public function set_user_account_info($input) {
        $query = $this->db->query("SELECT sp_ua_upd_user_acct ( ?, ?, ?, ?, ?, ?, ? )", $input);
        $row = $query->row();

        if( isset($row) ) {
            return $row->sp_ua_upd_user_acct;
        }
    }

    public function set_user_pass($input) {
        $query = $this->db->query("SELECT sp_ua_upd_user_pass ( ?, ? )", $input);
        $row = $query->row();

        if( isset($row) ) {
            return $row->sp_ua_upd_user_pass;
        }
    }

    public function set_confirm_pass($input) {
        $query = $this->db->query("SELECT sp_ua_upd_confirm_pass ( ?, ? )", $input);
        $row = $query->row();

        if( isset($row) ) {
            return $row->sp_ua_upd_confirm_pass;
        }
    }

    public function get_admin_list() {
        $where = "(t1.\"role_id\" = 'sa' OR t1.\"role_id\" = 'super')";
        $this->db->select(" t1.\"email\" ")
            ->where($where)
            ->order_by(" t1.\"last_name\" ");

        $query = $this->db->get(" \"t_UserAccount\" t1 ");
        return $query->result_array();
    }
    public function get_user_sess_login($input) {
        $qry = $this->db->query("SELECT emp_id, emp_name, role_id FROM sp_ua_sess_login( ? ) AS (emp_id text, emp_name text, role_id text)", $input);
        return $qry->row_array();
    }

    //    new theme
    public function get_dashboard_general($input) {
        $los_db = $this->load->database("LOS", true);
        $query = $los_db->query("SELECT * FROM sp_los_laf_dashboard_general(?)", $input );
        return $query->row_array();
    }

    public function get_pending_count($input) {
        $los_db = $this->load->database("LOS", true);
        $query = $los_db->query("SELECT * FROM sp_get_processor_pending(?)", $input );
        return $query->row_array();
    }

    public function get_user_branch($input) {
        $los_db = $this->load->database("LOS", true);
        $query = $los_db->query("SELECT * FROM sp_usr_emp_branch(?)", $input );
        return $query->result_array();
    }

    public function get_sp_usr_pending_branch($input) {
        $los_db = $this->load->database("LOS", true);
        $query = $los_db->query("SELECT ourbranchid,destprocess,SUM(count) FROM sp_usr_pending_branch( ?, ?) GROUP BY ourbranchid,destprocess", $input);
        return $query->result_array();
    }
    public function get_user_branch_pending($input) {
        $los_db = $this->load->database("LOS", true);
        $query = $los_db->query("SELECT * FROM sp_los_laf_usr_branch(?)", $input );
        return $query->result_array();
    }
    public function get_user_branch_total($input) {
        $los_db = $this->load->database("LOS", true);
        $query = $los_db->query("SELECT * FROM sp_los_laf_sum_branch(?)", $input );
        return $query->row_array();
    }
}

