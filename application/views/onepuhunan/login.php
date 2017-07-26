<?php
$data['title'] = 'OnePuhunan Service Portal | Login';
?>
<link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>img/onepuhunan.ico" >
<!--css-->
<link rel="stylesheet" href="<?=base_url()?>css/onepuhunan/css/login.css">
<!--js-->
<script src="<?=base_url()?>js/jquery-3.1.1.min.js"></script>
<script src="<?=base_url()?>js/onepuhunan/js/login.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OnePuhunan</title>
    <link href="<?=base_url()?>css/global.css" rel="stylesheet">

</head>

<body class="login_body">


<div class="wrapper">
    <div class="container">
        <h1><img  src="<?=base_url()?>img/logo/onepuhunan_logo.png" alt="OnePuhunan" title="OnePuhunan" class="login-image"></h1>
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
            "name"  => "u_empid",
            "value" => set_value("u_empid"),
            "placeholder" => "Employee ID"
        );
        echo form_input($u_empid);
        ?>
        <?php
        $u_pass = array(
            "id"    => "u_pass",
            "name"  => "u_pass",
            "type"  => "password",
            "placeholder" => "Password"
        );
        echo form_input($u_pass);
        ?>
        <button type="submit" class="uk-width-1-1 uk-button uk-button-primary uk-text-bold">LOGIN</button>
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
</body>

</html>