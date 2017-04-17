<?php
    $data['title'] = 'OnePuhunan Service Portal Login';
?>
<!DOCTYPE html>
<html id="mlogin" lang="en">
    <?php $this->load->view("templates/head", $data); ?>
    <body class="uk-height-1-1">
        <div class="uk-vertical-align uk-text-center uk-height-1-1">
            <div class="uk-vertical-align-middle" style="width: 310px;">
                <img class="uk-margin-bottom" alt="" src="<?=base_url()?>img/onepuhunan.png" style="height: 125px; width: 300px; padding-right: 15px;" >
                <form class="uk-panel uk-panel-box uk-form tm-box-shadow">
                    <legend class="uk-margin-small-top uk-text-large uk-text-left">LOGIN TO YOUR ACCOUNT</legend>
                    <div class="uk-form-row uk-text-left">
                        <label class="uk-form-label uk-text-small" style="padding-left: 2px;">ALREADY HAVE AN ACCOUNT?</label>
                    </div>
                    <div class="uk-form-row uk-form-icon">
                        <i class="uk-icon-user"></i>
                        <input class="uk-width-1-1 uk-form-medium" type="text" placeholder="Employee ID">
                    </div>
                    <div class="uk-form-row uk-form-icon">
                        <i class="uk-icon-lock"></i>
                        <input class="uk-width-1-1 uk-form-medium" type="text" placeholder="Password">
                    </div>
                    <div class="uk-form-row">
                        <button type="submit" class="uk-width-1-1 uk-button uk-button-primary">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

