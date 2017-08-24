<?php
    $data['title'] = 'OnePuhunan Service Portal | Registration Successful';
?>
<?php $this->load->view("onepuhunan/header",$data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <?=form_open("", array("class" => "form-width-small text-center"));?>
                <h3 class="text-success">
                    <i class=" glyphicon glyphicon-ok "></i>  REGISTRATION SUCCESSFUL!
                </h3>
                <div class="form-group">
                    <label>
                        Congratulations! Your registration request has been received and will be reviewed and processed
                        by the System Administrator. Your <strong>"Employee ID"</strong> is shown below. You will
                        need this, along with the password you chose, every time you enter <strong>OnePuhunan Service Portal</strong>.
                        An email will be sent to the email address you specified confirming your registration.
                    </label>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="uk-form-label uk-text-small">Employee ID</label>
                    </div>
                    <div class="col-md-9">
                        <label class="uk-form-label uk-text-small uk-text-bold"><?= $this->session->emp_id ?></label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="uk-form-label uk-text-small">Full Name</label>
                    </div>
                    <div class="col-md-9">
                        <label class="uk-form-label uk-text-small uk-text-bold"><?= $this->session->name ?></label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="uk-form-label uk-text-small">Email Address</label>
                    </div>
                    <div class="col-md-9">
                        <label class="uk-form-label uk-text-small uk-text-bold"><?= $this->session->email ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <a class="btn global-button" href="<?php echo site_url("index.php"); ?>">GO TO LOGIN PAGE</a>
                </div>
            <?=form_close();?>
            <?php
                $this->session->unset_userdata('emp_id');
                $this->session->unset_userdata('name');
                $this->session->unset_userdata('email');
            ?>
        </div>
    </div>
</div>
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>