<?php
$data['title'] = 'OnePuhunan Service Portal | Manage Branch Handle';
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
                    <h2>AUDIT SETTINGS</h2>
                </div>
            </div>
        </div>
        <section id="main-section">


            <div class="uk-container table-wrap op-container tc-container">

                <div class="op-title"><h1><i class="uk-icon-tags"></i> MANAGE BRANCH HANDLE</h1></div>
                <div>
                    <a href="<?php echo site_url("audit/add"); ?>"> <button class="uk-button add-btn" type="button"><span class="op-btn"><i class="uk-icon-plus"></i> ADD NEW EMPLOYEE</span></button> </a>
                </div>


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

                <table id="tbl_aud_assign_branch" class="uk-text-center stripe hover op-table E1 tc-table" cellspacing="0" width="100%">
                    <thead class="css3gradient">
                    <tr>
                        <th>EMPLOYEE ID</th>
                        <th>NAME</th>
                        <th>JOB  TITLE</th>
                        <th>BRANCH HANDLE</th>
                        <th>ACTION</th>
                    </tr>
                    </thead>

                    <?php

                    foreach((array) $query as $row) { ?>
                        <tr class="modal-update">
                            <td> <?php echo $row['emp_id'] ?> </td>
                            <td> <?php echo $row['fullname'] ?> </td>
                            <td> <?php echo $row['job_title'] ?> </td>
                            <td> <?php echo $row['branch_ids'] ?> </td>
<!--                            <td> EDIT </td>-->
                            <td>  <a href="<?php echo site_url("audit/assign_branch/update_aud_branch_handle?emp_id=".$row['emp_id']."&branch_ids=".$row['branch_ids']."&fullname=".$row['fullname']."&job_title=".$row['job_title'].""); ?>" > <i class="uk-icon-edit"></i> EDIT </a></td>
                        </tr>
                    <?php   }

                    ?>

                </table>
            </div>
        </section>
        <?php $this->load->view("templates/footer"); ?>
    </div>
</div>
<div id="loading"></div>
</body>
</html>