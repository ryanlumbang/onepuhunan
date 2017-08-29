<?php
$data['title'] = 'OnePuhunan Service Portal | Audit Uploading of Sampling';
?>
<link rel="stylesheet" href="<?=base_url()?>css/audit_extract.css">
<?php $this->load->view("onepuhunan/header",$data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <?php if($this->session->flashdata('message')){?>
                <div align="center" class="alert alert-success">
                    <?php echo $this->session->flashdata('message')?>
                </div>
            <?php } ?>

            <form class="form-width-small"  method="post" action="<?php echo site_url("audit/import"); ?>" method="post" name="upload_excel" enctype="multipart/form-data">
                    <h2 class="text-center">UPLOADING OF RAW DATA</h2>
                    <div class="form-group">
                        <label class="text-center">
                            Please click the Choose A File to upload a file, CSV File Type only Accepting.
                            Once completed, please select the <b>"UPLOAD"</b> button.
                        </label>
                    </div>
                    <?php if($this->session->flashdata('message')){?>
                        <div align="center" class="alert alert-success">
                            <?php echo $this->session->flashdata('message')?>
                        </div>
                    <?php } ?>

                    <div class="form-group">
                        <input type="file" name="file" id="file" class="input-file" accept=".csv" onchange="ValidateSingleInput(this);">
                        <label for="file" class="form-control js-labelFile form-input-file">
                            <i class="uk-icon-cloud-upload"></i>
                            <span class="js-fileName">Choose a file<span class="tm-required-label">*</span></span>
                        </label>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-6">
                            <button type="submit" name="import" id="submit" class="form-control global-button">Upload</button>
                        </div>
                        <div class="col-xs-6">
                            <a href="<?php echo site_url("aud_dashboard"); ?>" class="btn form-control global-button">Cancel</a>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>
<script src="<?=base_url()?>js/audit_extract.js"></script>
