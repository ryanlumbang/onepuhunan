<?php
$data['title'] = 'OnePuhunan Service Portal | Login';
?>

<?php $this->load->view("default/header", $data); ?>
<link rel="stylesheet" href="<?=base_url()?>css/default/login.css">

<div class="d-table wrapper">
    <div class="d-table-cell align-middle">
        <?=form_open("", array("class" => "uk-form uk-margin-left uk-margin-right tm-box-shadow tm-form", "style" => "padding: 30px 25px;"));?>
        <img  src="<?=base_url()?>img/logo/onepuhunan_logo.png" alt="OnePuhunan" title="OnePuhunan" class="login-image">
        <?php echo validation_errors(); ?>
        <?php
        if ( isset($sp_ua_login_validation) ) {
            switch( $sp_ua_login_validation ) {
                case 1:
                    echo "<div class='alert alert-warning'>"
                        . "      <span>"
                        .           "<strong>Authentication Failed</strong><br>"
                        .           "Sorry, we couldn't find an account with that employee id. "
                        . "      </span>"
                        . "   </div>";
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
                        .           "<strong>Account Locked</strong><br>"
                        .           "Unable to log you on because your account has been locked out. "
                        .           "Please contact the administrator to have your account unlocked."
                        . "      </span>"
                        . "   </div>";
                    break;
                case 4:
                    echo "<div class='alert alert-warning'>"
                        . "      <span>"
                        .           "<strong>Authentication Failed</strong><br>"
                        .           "Invalid employee id or password provided. "
                        .           "Please try again."
                        . "      </span>"
                        . "   </div>";
                    break;
                case 5:
                    echo "<div class='alert alert-warning'>"
                        . "      <span>"
                        .           "<strong>Account Locked</strong><br>"
                        .           "Your account has been locked out because of too many invalid login attempts. "
                        .           "Please contact the administrator to have your account unlocked."
                        . "      </span>"
                        . "   </div>";
                    break;
                default:
                    redirect(base_url()."dashboard");
                    break;
            }
        }
        ?>
        <div class="form-group row">
            <div class="col-md-12">
                <?php
                $u_empid =  array(
                    "id"    => "u_empid",
                    "class"    => "form-control input-lg",
                    "name"  => "u_empid",
                    "value" => set_value("u_empid"),
                    "placeholder" => "Employee ID"
                );
                echo form_input($u_empid);
                ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <?php
                $u_pass = array(
                    "id"    => "u_pass",
                    "class"    => "form-control input-lg",
                    "name"  => "u_pass",
                    "type"  => "password",
                    "placeholder" => "Password"
                );
                echo form_input($u_pass);
                ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <button type="submit" class="form-control input-lg">LOGIN</button>

            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <span><a href="<?php echo site_url("forgotpassword"); ?>">Forgot your Password?</a></span>
                <span><a href="<?php echo site_url("signup"); ?>" >Not a Member Yet?</a></span>
            </div>
        </div>
        <?=form_close();?>
    </div>
</div>

<ul class="bg-bubbles">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
</ul>

<script src="<?=base_url()?>js/default/login.js"></script>

<?php $this->load->view("default/footer"); ?>
