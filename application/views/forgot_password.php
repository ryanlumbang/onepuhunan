<?php
$data['title'] = 'OnePuhunan Service Portal | Login';
?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("templates/head", $data); ?>
<body>
<?php $this->load->view("templates/header"); ?>
<div class="page-wrap">
    <div class="uk-container uk-container-center">
        <div class="uk-align-right tm-padding">
            <div style="width: 350px;">
                <?=form_open("", array("class" => "uk-form uk-margin-left uk-margin-right tm-box-shadow tm-form", "style" => "padding: 30px 25px;"));?>
                <legend class="uk-margin-small-top uk-text-large uk-text-bold">HELP WITH MY ACCOUNT</legend>
                <p class="text-form">Please enter the e-mail address associated with your account and we'll email you a link to recover your password.</p>
                <?php echo validation_errors(); ?>
                <?php
                if ( isset($sp_ua_fgot_pass_validation)  ) {
                    switch( $sp_ua_fgot_pass_validation) {
                        case 1:
                            echo "<div class='uk-alert uk-alert-danger uk-text-small uk-text-justify' data-uk-alert>"
                                . "      <span>"
                                .           "<big class='uk-text-bold'>Authentication Failed</big><br>"
                                .           "Sorry, we couldn't find an account with that email address. "
                                . "      </span>"
                                . "   </div>";
                            break;
                        case 2:
                            echo "<div class='uk-alert uk-alert-danger uk-text-small uk-text-justify' data-uk-alert>"
                                . "      <span>"
                                .           "<big class='uk-text-bold'>Account Disabled</big><br>"
                                .           "Your account has been disabled. "
                                .           "Please contact the administrator if you have any questions or concerns."
                                . "      </span>"
                                . "   </div>";
                            break;
                        case 3:
                            echo "<div class='uk-alert uk-alert-danger uk-text-small uk-text-justify' data-uk-alert>"
                                . "      <span>"
                                .           "<big class='uk-text-bold'>Authentication Failed</big><br>"
                                .           "Invalid Email Address. "
                                .           "Please try again."
                                . "      </span>"
                                . "   </div>";
                            break;
                        default:
                            redirect(base_url()."confirm_password", "refresh");
                            break;
                    }
                }
                ?>
                <div class="uk-form-row uk-form-icon">
                    <i class="uk-icon-envelope"></i>
                    <?php
                    $email =  array(
                        "id"    => "email",
                        "name"  => "email",
                        "value" => set_value("email"),
                        "class" => "uk-width-1-1 uk-form-medium",
                        "placeholder" => "Email Address"
                    );
                    echo form_input($email);
                    ?>
                </div>
                <div class="uk-form-row">
                    <div class="uk-grid">
                        <div class="uk-width-1-2"><a href="<?php echo site_url("opslogin"); ?>" class="uk-width-1-1 uk-button uk-text-bold ">Cancel</a></div>
                        <div class="uk-width-1-2"><button type="submit" id="btn-submit-fgot" class="uk-width-1-1 uk-button uk-button-primary uk-text-bold submit" >Submit</button></div>
                    </div>
                </div>
                <?=form_close();?>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("templates/footer"); ?>
</body>
</html>