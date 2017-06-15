<?php
if($this->session->role_id == 'sa'  OR $this->session->role_id == 'super' OR $this->session->role_id == 'tc'
OR $this->session->role_id == 'qa'  OR $this->session->role_id == 'bm' OR $this->session->role_id == 'cpu'
OR $this->session->role_id == 'ssuper'){?>

<?php
    $data['title'] = 'OnePuhunan Service Portal | Dashboard';
?>
<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view("templates/head", $data); ?>
    <body>
        <?php $this->load->view("templates/header"); ?>
        <div class="page-wrap">
            <?php $this->load->view("templates/subheader"); ?>
            <div class="uk-container uk-container-center">
                <div class="uk-grid tm-mainmenu">
                    <div class="uk-width-1-4 uk-text-center">
                        <img class="uk-margin uk-margin-remove" src="<?=base_url()?>img/system_png/profile.png" width="100">
                        <h3>MY PROFILE</h3>
                        <p>Manage your personal information and application settings.</p>
                        <ul class="tm-ul">
                            <li><a href="<?php echo site_url("profile/userinfo"); ?>">Update Personal Information</a></li>
                            <li><a href="<?php echo site_url("profile/changepass"); ?>">Change Password</a></li>
                        </ul>
                    </div>
                    
                    <?php
                        if($this->session->role_id == 'super' OR $this->session->role_id == 'sa') { ?>
                            <div class="uk-width-1-4 uk-text-center">
                            <img class="uk-margin uk-margin-remove" src="<?=base_url()?>img/system_png/system.png" width="100">
                            <h3>SYSTEM SETTINGS</h3>
                            <p>View and manage system settings.</p>
                            <ul class="tm-ul">
                                <li><a href="">View Users Catalog</a></li>
                                <li><a href="<?php echo site_url("sys/registration_request"); ?>">View New User Registration Request</a></li>
                                <li><a href="<?php echo site_url("sys/client_rejected"); ?>">Client Rejected</a></li>
                            </ul>
                            </div>   
                    <?php } ?>

                    <div class="uk-width-1-4 uk-text-center">
                        <img class="uk-margin uk-margin-remove" src="<?=base_url()?>img/system_png/operations.png" width="100">
                        <h3>OPERATIONS</h3>
                        <p>View and process loan applications received by the system.</p>
                        <ul class="tm-ul">
                            <li><a href="<?php echo site_url("operations/client_catalog"); ?>">Client's Catalog</a></li>
                            <li><a href="<?php echo site_url("operations/los"); ?>">Loan Origination System</a></li>
                        </ul>
                    </div>
                    <div class="uk-width-1-4 uk-text-center">
                        <img class="uk-margin uk-margin-remove" src="<?=base_url()?>img/system_png/maintenance.png" width="100">
                        <h3>LOS SETTINGS</h3>
                        <p>View and manage LOS settings.</p>
                        <ul class="tm-ul">
                            <?php
                            if($this->session->role_id == 'ssuper'  OR $this->session->role_id == 'super') { ?>
                                <li><a href="<?php echo site_url("operations/branch_handle"); ?>">Branch Assignment </a></li>
                                <li><a href="<?php echo site_url("operations/branch_handle"); ?>">LOS Client Search</a></li>
                                <li><a href="<?php echo site_url("sys/tc_question"); ?>">Manage TelleCaller Questions</a></li>
                                <li><a href="<?php echo site_url("operations/los_report"); ?>">LOS Report</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view("templates/footer"); ?>
    </body>
</html>

<?php } else{?>

    <?php $this->load->view("errors/cli/forbidden_page"); ?>

<?php }?>
