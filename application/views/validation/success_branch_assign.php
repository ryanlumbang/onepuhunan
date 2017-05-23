<?php
$data['title'] = 'OnePuhunan Service Portal | Registration Successful';
?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("templates/head", $data); ?>
<body>
<?php $this->load->view("templates/header"); ?>
<div class="page-wrap">
    <div id="tm-container" class="uk-container uk-width-5-10 uk-container-center">
        <?=form_open("", array("class" => "uk-form uk-form-horizontal"));?>
        <legend class="uk-text-muted uk-text-bold uk-text-success tm-form-legend">
            <i class="uk-icon-check-circle uk-text-success"></i> BRANCH ASSIGN SUCCESSFUL!
        </legend>
        <div class="uk-form-row uk-text-center uk-margin-large-top">
            <a class="uk-button uk-button-primary uk-button-small uk-width-3-10" href="<?php echo site_url("dashboard"); ?>">GO TO DASHBOARD PAGE</a>
        </div>
        <?=form_close();?>
    </div>
</div>
<?php $this->load->view("templates/footer"); ?>
</body>
</html>
