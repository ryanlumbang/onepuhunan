<?php
$data['title'] = 'OnePuhunan Service Portal | Login';
?>
<?php $this->load->view("onepuhunan/header",$data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <?=form_open("", array("class" => "form-width-small"));?>
            <h1>CONFIRMATION</h1>
            <label>Enter the Employee ID to confirm.</label>
            <?php echo validation_errors(); ?>
            <?php
            if ( isset($sp_ua_confirm_validation) ) {
                switch( $sp_ua_confirm_validation) {
                    case 1:
                        echo "<div class='alert alert-warning'>"
                            . "      <span>"
                            .           "<strong>Authentication Failed</strong><br>"
                            .           "Sorry, we couldn't find an account with that Employee ID. "
                            . "      </span>"
                            . "</div>";
                        break;
                    case 2:
                        echo "<div class='alert alert-warning'>"
                            . "      <span>"
                            .           "<strong>Account Disabled</strong><br>"
                            .           "Your account has been disabled. "
                            .           "Please contact the administrator if you have any questions or concerns."
                            . "      </span>"
                            . "   </div>";
                        break;
                    case 3:
                        echo "<div class='alert alert-warning'>"
                            . "      <span>"
                            .           "<strong>Authentication Failed</strong><br>"
                            .           "Invalid Employee ID. "
                            .           "Please try again."
                            . "      </span>"
                            . "   </div>";
                        break;
                    default:
                        redirect(base_url()."success_password");
                        break;
                }
            }
            ?>

            <div class="form-group">
                <?php
                $email =  array(
                    "id"    => "emp_id",
                    "name"  => "emp_id",
                    "value" => set_value("emp_id"),
                    "class" => "form-control input-lg",
                    "placeholder" => "Employee Id"
                );
                echo form_input($email);
                ?>
            </div>
            <div class="form-group">
                <button type="submit" class="form-control global-button">Confirm</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>