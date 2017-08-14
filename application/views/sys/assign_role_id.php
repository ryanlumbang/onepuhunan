<?php
$data['title'] = 'OnePuhunan Service Portal | Manage Role ID';
?>
<?php $this->load->view("onepuhunan/header", $data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">

            <h1>MANAGE ROLE ID</h1>
            <?php
            $msg = $this->session->flashdata('message');
            if( !$msg == '' ) {
                $flashdata = '<div class="alert alert-success">'
                    . '<span>' . $msg . '</span>'
                    . '</div>';
                echo $flashdata;
            }
            ?>

            <script>
                $(document).ready(function(){
                    setTimeout(function() {
                        $('.alert-success').fadeOut('fast');
                    }, 10000); // <-- time in milliseconds
                });
            </script>

            <div>
                <a href="<?php echo site_url("sys/add_role_id"); ?>">
                    <button class="uk-button add-btn" type="button">
                        <span class="op-btn"><i class="glyphicon glyphicon-plus"></i> ADD NEW ROLE</span>
                    </button>
                </a>
            </div>

            <table id="tbl_rid" class="table table-striped" cellspacing="0" width="100%">
                <thead class="">
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
                        <td>
                            <a href="<?php echo site_url("sys/assign_role_id/update_role_id?emp_id=".$row['emp_id']."&role=".$row['role_id']."&fullname=".$row['fullname']."&job_title=".$row['job_title'].""); ?>" >
                                <i class="glyphicon glyphicon-pencil"></i> EDIT </a> &nbsp;&nbsp;&nbsp;

                            <a href="<?php echo site_url("sys/assign_role_id/manage_resign?emp_id=".$row['emp_id'].""); ?>" >
                                <i class="glyphicon glyphicon-pencil"></i> MANAGE RESIGN </a>
                        </td>
                    </tr>
                <?php   }

                ?>

            </table>
        </div>
    </div>
</div>
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>
