<?php
if($this->session->role_id == 'aud'  OR $this->session->role_id == 'super'){?>

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
                    <div class="uk-width-1-2 uk-text-center">
                        <img class="uk-margin uk-margin-remove" src="<?=base_url()?>img/system_png/profile.png" width="100">
                        <h3>MY PROFILE</h3>
                        <p>Manage your personal information and application settings.</p>
                        <ul class="tm-ul">
                            <li><a href="<?php echo site_url("profile/userinfo"); ?>">Update Personal Information</a></li>
                            <li><a href="<?php echo site_url("profile/changepass"); ?>">Change Password</a></li>
                        </ul>
                    </div>

                     <div class="uk-width-1-2 uk-text-center">
                            <img class="uk-margin uk-margin-remove" src="<?=base_url()?>img/system_png/operations.png" width="100">
                            <h3>AUDIT APPLICATION</h3>
                            <p>Extract Raw Data and Uploading Data of Sampling.</p>
                            <ul class="tm-ul">
                                <li><a href="<?php echo site_url("audit/audit_extraction"); ?>">Audit Extraction of Raw Data</a></li>
                                <?php
                                if($this->session->role_id == 'super') { ?>
                                    <li><a href="<?php echo site_url("audit/audit_import"); ?>">Audit Uploading of Sampling</a></li>
                                <?php } ?>
                                <li><a href="<?php echo site_url("audit/aud_extraction_assign"); ?>">Audit Extraction For Auditor</a></li>
                                <li><a href="<?php echo site_url("audit/assign_branch"); ?>">Assign Branch for Auditor</a></li>
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
