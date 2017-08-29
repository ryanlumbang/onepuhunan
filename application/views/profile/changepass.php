<?php
    $data['title'] = 'OnePuhunan Service Portal | Change Password';
?>
<?php $this->load->view("onepuhunan/header",$data); ?>
<div class="main">
    <div class="main-inner">
            <div id="tm-container" class="container ">
                <?=form_open("", array("class" => "form-width-small"));?>

                <?php echo validation_errors(); ?>
                <?php
                if ( isset($sp_ua_upd_user_pass) ) {
                    switch ($sp_ua_upd_user_pass) {
                        case 1:
                            echo "<div class='alert alert-warning'> "
                                . " <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"
                                . "      <span>Sorry, a user account with that employee id not existing.</span>"
                                . "   </div>";
                            break;
                        default:
                            echo "<div class='alert alert-warning'> "
                                . " <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"
                                . "       <span>Your profile has been successfully updated.</span>"
                                . "   </div>";
                            break;
                    }
                }
                ?>
                    <h2 class="text-center">CHANGE PASSWORD</h2>
                    <div class="form-group">
                        <strong>Password complexity requirements:</strong>

                        <ul>
                            <li>Password must be at least 8 characters in length</li>
                            <li>One or more upper case letters</li>
                            <li>One or more lower case letters</li>
                            <li>One or more numbers</li>
                            <li>One or more of these special characters: !@#$%^&*</li>
                        </ul>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label>New Password<span class="tm-required-label">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <?php
                            $password = array(
                                "id" => "password",
                                "name" => "password",
                                "type" => "password",
                                "class" => "form-control",
                                "placeholder" => "Please enter your new password."
                            );
                            echo form_input($password);
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>You will use this when logging in to our member's area(s). Please see password complexity requirements above for your reference in creating your desired password. </label>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label>Confirm Password<span class="tm-required-label">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <?php
                            $passconf = array(
                                "id" => "passconf",
                                "name" => "passconf",
                                "type" => "password",
                                "class" => "form-control",
                                "placeholder" => "Please confirm the password you entered above."
                            );
                            echo form_input($passconf);
                            ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-6">
                            <button type="submit" class="form-control global-button ">Submit</button>
                        </div>
                        <div class="col-xs-6">
                            <a class="form-control btn global-button " href="<?php echo site_url("index.php"); ?>">Back</a>
                        </div>
                    </div>
                <?=form_close();?>
            </div>
    </div>
</div>
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>