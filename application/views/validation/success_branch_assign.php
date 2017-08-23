<?php
$data['title'] = 'OnePuhunan Service Portal | Registration Successful';
?>
<?php $this->load->view("onepuhunan/header",$data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <?=form_open("", array("class" => "form-width-small text-center"));?>
            <h2 class="text-success">
                <i class="glyphicon glyphicon-ok"></i> BRANCH ASSIGN SUCCESSFUL!
            </h2>
            <div class="form-group default-margin">
                <a class="btn  global-button" href="<?php echo site_url("dashboard"); ?>">GO TO DASHBOARD PAGE</a>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>