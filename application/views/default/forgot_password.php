<?php
$data['title'] = 'OnePuhunan Service Portal | Forgot Password';
?>
<?php $this->load->view("default/header", $data); ?>
<link rel="stylesheet" href="<?=base_url()?>css/default/login.css">
<div class="d-table wrapper">
    <div class="d-table-cell align-middle">
            <?=form_open("", array("class" => "uk-form uk-margin-left uk-margin-right tm-box-shadow tm-form", "style" => "padding: 30px 25px;"));?>
            <h1>Forgot Password</h1>

            <h4>HELP WITH MY ACCOUNT</h4>
            <p class="text-form">Please enter the e-mail address associated with your account and we'll email you a link to recover your password.</p>
            <?php echo validation_errors(); ?>
            <?php
            if ( isset($sp_ua_fgot_pass_validation)  ) {
                switch( $sp_ua_fgot_pass_validation) {
                    case 1:
                        echo "<div class='alert alert-warning'>"
                            . "      <span>"
                            .           "<strong>Authentication Failed</strong><br>"
                            .           "Sorry, we couldn't find an account with that email address. "
                            . "      </span>"
                            . "   </div>";
                        break;
                    case 2:
                        echo "<div class='alert alert-warning'>"
                            . "      <span>"
                            .           "<strong class='uk-text-bold'>Account Disabled</strong><br>"
                            .           "Your account has been disabled. "
                            .           "Please contact the administrator if you have any questions or concerns."
                            . "      </span>"
                            . "   </div>";
                        break;
                    case 3:
                        echo "<div class='alert alert-warning'>"
                            . "      <span>"
                            .           "<strong class='uk-text-bold'>Authentication Failed</strong><br>"
                            .           "Invalid Email Address. "
                            .           "Please try again."
                            . "      </span>"
                            . "   </div>";
                        break;
                    default:
                        redirect(base_url()."confirm_password");
                        break;
                }
            }
            ?>
            <div class="form-group row">
                <div class="col-md-12">
                    <?php
                    $email =  array(
                        "id"    => "email",
                        "name"  => "email",
                        "value" => set_value("email"),
                        "class" => "form-control input-lg",
                        "placeholder" => "Email Address"
                    );
                    echo form_input($email);
                    ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6"><a href="<?php echo site_url("/"); ?>" class="form-control input-lg">Cancel</a></div>
                <div class="col-6"><button type="submit" id="btn-submit-fgot" class="form-control input-lg submit" >Submit</button></div>
            </div>
            <?=form_close();?>
    </div>
</div>
<?php $this->load->view("default/footer"); ?>
