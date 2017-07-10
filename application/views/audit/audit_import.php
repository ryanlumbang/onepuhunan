<?php
$data['title'] = 'OnePuhunan Service Portal | Audit Uploading of Sampling';
?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("templates/op-head", $data); ?>
<body id="losbody">
<div id="page">
    <div id="page-wrapper">
        <?php $this->load->view("templates/op-header"); ?>
        <?php $this->load->view("templates/subheader"); ?>
        <link rel="stylesheet" href="<?=base_url()?>css/audit_extract.css">
        <script src="<?=base_url()?>js/audit_extract.js"></script>
        <div class="header-bg">
            <div class="header-banner">
                <div class="uk-container op-container">
                    <h2>AUDIT UPLOADING</h2>
                </div>
            </div>
        </div>
        <section id="main-section">


            <div id="tm-container" class="uk-container uk-width-5-10 uk-container-center">

                <?php if($this->session->flashdata('message')){?>
                    <div align="center" class="alert alert-success">
                        <?php echo $this->session->flashdata('message')?>
                    </div>
                <?php } ?>

                <form class="uk-form uk-form-horizontal"  method="post" action="<?php echo site_url("audit/import"); ?>" method="post" name="upload_excel" enctype="multipart/form-data">
                    <div class="op-title"><h1><i class="uk-icon-tags"></i> UPLOADING OF RAW DATA</h1></div>
                    <br/>
                    <div class="uk-form-row tm-label">
                        <label class="uk-text-small">
                            Please click the Choose A File to upload a file, CSV File Type only Accepting.<br>
                            Once completed, please select the <b>"UPLOAD"</b> button.
                        </label>
                    </div>
                    <?php if($this->session->flashdata('message')){?>
                        <div align="center" class="alert alert-success">
                            <?php echo $this->session->flashdata('message')?>
                        </div>
                    <?php } ?>
                    <div class="uk-form-row">

                        <div class="uk-form-row uk-margin-small-bottom">

                            <input type="file" name="file" id="file" class="input-file" accept=".csv" onchange="ValidateSingleInput(this);">
                            <label for="file" class="btn btn-tertiary js-labelFile">
                                <i class="uk-icon-cloud-upload"></i>
                                <span class="js-fileName">Choose a file<span class="tm-required-label">*</span></span>
                            </label>
                        </div>

                        <div class="uk-form-row uk-text-center uk-margin-large-bottom" style="margin-top: 15px;">
                            <button type="submit" name="import" id="submit" class="uk-button uk-button-primary uk-button-small uk-width-2-10">Upload</button>
                            <!--                        <input type="submit" name="import" id="submit" class="uk-button uk-button-primary uk-width-2-10" style="color: white;" value="Import CSV"/>-->
                            <a href="<?php echo site_url("aud_dashboard"); ?>" class="uk-button uk-button-small uk-width-2-10">Cancel</a>
                        </div>
                </form>

            </div>

        </section>
        <?php $this->load->view("templates/footer"); ?>
    </div>
</div>
<div id="loading"></div>
</body>
</html>




















