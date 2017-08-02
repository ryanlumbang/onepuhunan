<?php
$data['title'] = 'OnePuhunan Service Portal | Login';
?>

<?php $this->load->view("onepuhunan/default/header", $data); ?>
<body class="login_body">
    <div class="wrapper">
        <div class="container">
            <img  src="<?=base_url()?>img/logo/onepuhunan_logo.png" alt="OnePuhunan" title="OnePuhunan" class="login-image">
            <?=form_open("", array("class" => "uk-form uk-margin-left uk-margin-right tm-box-shadow tm-form", "style" => "padding: 30px 25px;"));?>
            <?php echo validation_errors(); ?>
            <?php
            if ( isset($sp_ua_login_validation) ) {
                switch( $sp_ua_login_validation ) {
                    case 1:
                        echo "<div class='uk-alert uk-alert-danger uk-text-small uk-text-justify' data-uk-alert>"
                            . "      <span>"
                            .           "<big class='uk-text-bold'>Authentication Failed</big><br>"
                            .           "Sorry, we couldn't find an account with that employee id. "
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
                            .           "<big class='uk-text-bold'>Account Locked</big><br>"
                            .           "Unable to log you on because your account has been locked out. "
                            .           "Please contact the administrator to have your account unlocked."
                            . "      </span>"
                            . "   </div>";
                        break;
                    case 4:
                        echo "<div class='uk-alert uk-alert-danger uk-text-small uk-text-justify' data-uk-alert>"
                            . "      <span>"
                            .           "<big class='uk-text-bold'>Authentication Failed</big><br>"
                            .           "Invalid employee id or password provided. "
                            .           "Please try again."
                            . "      </span>"
                            . "   </div>";
                        break;
                    case 5:
                        echo "<div class='uk-alert uk-alert-danger uk-text-small uk-text-justify' data-uk-alert>"
                            . "      <span>"
                            .           "<big class='uk-text-bold'>Account Locked</big><br>"
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
            <button type="submit" class="form-control input-lg">LOGIN</button>
            <br/>
            <br/>
            <span><a href="<?php echo site_url("forgotpassword"); ?>">Forgot your Password?</a></span>
            <span><a href="<?php echo site_url("signup"); ?>" >Not a Member Yet?</a></span>
            <?=form_close();?>
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
    </div>
<?php $this->load->view("onepuhunan/default/footer"); ?>
