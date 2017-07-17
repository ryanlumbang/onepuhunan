<?php

/**
 * Created by PhpStorm.
 * User: ryan.lumbang
 * Date: 2/10/2017
 * Time: 4:40 PM
 */


class Audit_model extends CI_Model
{
    public function _construct() {
        parent::__construct();
    }

    public function get_branch_list() {
        $branch = $this->input->post("branch_code");
        $date = $this->input->post("hidden_date");
        $loan = $this->input->post("type_loan");
        //var_dump($branch);
        $input = array(
            "branch" => $branch,
            "date" =>  $date,
            "loan" => $loan
        );

        if( trim($branch) != "") {
            $query = $this->db->query("SELECT * FROM sp_zyz( ?, ?, ?)", $input);
            return $query->result_array();
        }

    }

    public function set_audit_sampling($data)
    {
        $this->db->insert('"t_audit_sampling"', $data);
    }

    public function get_audit_sampling()
    {

        $query = $this->db->query('SELECT * FROM "t_audit_sampling"');
        return $query->result_array();
    }

    function get_userAccount()
    {
        $aud_db = $this->load->database("Audit", true);
        $query = $aud_db->query("SELECT * FROM sp_assign_branch()");
        return $query->result_array();
    }


    public function get_ln_branch() {
        $aud_db = $this->load->database("Audit", true);
        $query = $aud_db->query("SELECT * FROM sp_usr_assign_branch(?)" , $this->session->emp_id);
        return $query->result_array();
    }

    public function set_branch_handle() {
        $employee_id = $this->input->post("employee_id");
        $branch_id = $this->input->post("branch_id");

        $input = array(
            "employee_id" => $employee_id,
            "branch_id" =>  $branch_id
        );

        $aud_db = $this->load->database("Audit", true);
        $query = $aud_db->query("SELECT sp_upd_assign_branch ( ?, ? )", $input);
        $row = $query->row();

        if( isset($row) ) {
            return $row->sp_upd_assign_branch;
        }
    }

    function get_branchCode()
    {
        $query = $this->db->query('SELECT * FROM "t_Branch"');
        return $query->result_array();
    }

    function get_EmpployeeName()
    {
        $aud_db = $this->load->database("Audit", true);
        $query = $aud_db->query("SELECT * FROM sp_aud_list_employee()");
        return $query->result_array();
    }

    function get_assign_branch(){

        $aud_db = $this->load->database("Audit", true);
        $query = $aud_db->query("SELECT * FROM sp_aud_branch_assign()");
            return $query->result_array();

    }

    function get_client($brnchID){

        $aud_db = $this->load->database("Audit", true);
        $query = $aud_db->query("SELECT * FROM sp_aud_client(?)",$brnchID);
        return $query->result_array();

    }

    function get_client_info($accountid){

        $aud_db = $this->load->database("Audit", true);
        $query = $aud_db->query("SELECT * FROM sp_aud_client_info(?)",$accountid);
        return $query->result_array();

    }


}