<?php
$data['title'] = 'OnePuhunan Service Portal | Manage Role ID';
?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("templates/op-head", $data); ?>
<body id="losbody">
<div id="page">
<div id="page-wrapper">
    <?php $this->load->view("templates/op-header"); ?>
    <?php $this->load->view("templates/subheader"); ?>
    <div class="header-bg">
        <div class="header-banner">
            <div class="uk-container op-container">
                <h2>SYSTEM SETTINGS</h2>
            </div>
        </div>
    </div>
    <section id="main-section">


        <div class="uk-container table-wrap op-container tc-container">

            <div class="op-title"><h1><i class="uk-icon-tags"></i> MANAGE ROLE ID</h1></div>

            <?php
            $msg = $this->session->flashdata('message');
            if( !$msg == '' ) {
                $flashdata = '<div class="uk-alert uk-alert-success los-alert" data-uk-alert>'
                    . '<p class="uk-margin-bottom-remove">' . $msg . '</p>'
                    . '</div>';
                echo $flashdata;
            }
            ?>

            <script>
                $(document).ready(function(){
                    setTimeout(function() {
                        $('.uk-alert').fadeOut('fast');
                    }, 10000); // <-- time in milliseconds
                });
            </script>

            <div>
                <a href="<?php echo site_url("sys/add_role_id"); ?>"> <button class="uk-button add-btn" type="button"><span class="op-btn"><i class="uk-icon-plus"></i> ADD NEW ROLE</span></button> </a>
            </div>

            <table id="tbl_rid" class="uk-text-center stripe hover op-table E1 tc-table" cellspacing="0" width="100%">
                <thead class="css3gradient">
                <tr>
                    <th>EMPLOYEE ID</th>
                    <th>NAME</th>
                    <th>JOB  TITLE</th>
                    <th>DATE ADDED</th>
                    <th>ROLE ID</th>
                    <th>APPROVED BY</th>
                    <th>DATE APPROVED</th>
                    <th>ACTION</th>
                </tr>
                </thead>

                <?php

                foreach((array) $query as $row) { ?>
                    <tr class="modal-update">
                        <td> <?php echo $row['emp_id'] ?> </td>
                        <td> <?php echo $row['fullname'] ?> </td>
                        <td> <?php echo $row['job_title'] ?> </td>
                        <td> <?php echo $row['date_added'] ?> </td>
                        <td> <?php echo $row['role_id'] ?> </td>
                        <td> <?php echo $row['approved_by'] ?> </td>
                        <td> <?php echo $row['date_approve'] ?> </td>
                        <td>  <a href="<?php echo site_url("sys/assign_role_id/update_role_id?emp_id=".$row['emp_id']."&role=".$row['role_id']."&fullname=".$row['fullname']."&job_title=".$row['job_title'].""); ?>" > <i class="uk-icon-edit"></i> EDIT </a></td>
                    </tr>
                <?php   }

                ?>

            </table>
        </div>
    </section>
    <?php $this->load->view("templates/footer"); ?>
    <?php $this->load->view("templates/modal"); ?>
</div>
</div>
<div id="loading"></div>
</body>
</html>