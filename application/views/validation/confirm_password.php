<?php
$data['title'] = 'OnePuhunan Service Portal | Registration Successful';
?>
<?php $this->load->view("onepuhunan/header",$data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <?=form_open("", array("class" => "form-width-small text-center"));?>
            <h3 class="text-success">
                <i class=" glyphicon glyphicon-ok "></i>  RESET PASSWORD SUCCESSFUL!
            </h3>
            <div class="form-group">
                <label>
                    Congratulations! Your email has been submitted. If that email address exists in our system,
                    you should receive a recovery information email shortly. If you do not receive an email,
                    please check your spam folder. If you still don't receive an email, then there is no account associated with the submitted email address.
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