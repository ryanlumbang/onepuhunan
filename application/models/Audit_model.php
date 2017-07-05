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
            $query = $this->db->query("SELECT * FROM sp_audit_extract_data( ?, ?, ?)", $input);
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

    public function set_audit_excel() {


    }

    function get_userAccount()
    {
        $query = $this->db->query("SELECT * FROM sp_assign_branch()");
        return $query->result_array();
    }


    public function get_ln_branch() {

        $query = $this->db->query("SELECT * FROM sp_sample_usr(?)" , $this->session->emp_id);
        return $query->result_array();
    }

    public function set_branch_handle($input) {
        $query = $this->db->query("SELECT sp_upd_assign_branch ( ?, ? )", $input);
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


}