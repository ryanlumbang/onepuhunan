<?php
$data['title'] = 'OnePuhunan Service Portal | Registration Successful';
?>
<?php $this->load->view("onepuhunan/header",$data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
        <?=form_open("", array("class" => "form-width-small text-center"));?>
            <h3 class="text-success">
                <i class=" glyphicon glyphicon-ok "></i> CHANGE TO DEFAULT PASSWORD SUCCESSFUL!
            </h3>
            <div class="form-group">
                <label>
                    You have successfully reset to default password. You can now login as usual with your Employee ID and the default password.
                </label>
            </div>
            <div class="form-group">
                <a class="btn global-button" href="<?php echo site_url("index.php"); ?>">GO TO DASHBOARD PAGE</a>
        </div>
        <?=form_close();?>
        </div>
    </div>
</div>
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>