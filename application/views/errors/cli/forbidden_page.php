<?php
$data['title'] = 'OnePuhunan Service Portal | Manage Client';
?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("templates/op-head", $data); ?>
<body id="losbody">
<div id="page">
    <div id="page-wrapper">
        <?php $this->load->view("templates/op-header"); ?>
        <?php $this->load->view("templates/subheader"); ?>
        <div class="header-bg">
            <div class="header-banner">
                <div class="uk-container op-container">
                    <h2>ACCESS IS FORBIDDEN</h2>
                </div>
            </div>
        </div>
        <section id="main-section">
            <div class="uk-container table-wrap op-container tc-container">

                <div class="op-title"><h1><i class="uk-icon-tags"></i> NO USER ACCESS ON THIS PAGE!</h1></div>
                <div class="uk-container uk-width-5-10 uk-container-center">
                    <div class="uk-form-row">

                        <div class="uk-alert uk-alert-danger text-align" style="margin-top: 5%;">
                            <span class="error">ERROR 404!<span>
                                    <br/>
                            <span class="error-text">Access is Forbidden!<span>
                        </div>

                        <div class="tm-label uk-margin-small-bottom" style="text-align: center;">
                            <label class="uk-text-small">
                                Contact System Administration <b>IT APPLICATION SUPPORT 01</b>.
                            </label>
                        </div>

                    </div>
                </div>

                <div class="uk-form-row uk-text-center uk-margin-small-top uk-margin-small-bottom">
                    <a href="<?=base_url()?>" class="uk-button uk-button-small uk-width-2-10">Cancel</a>
                </div>

        </section>

        <style>

            .text-align{
                text-align: center;
                padding-top: 25px;
            }
            .error{
                font-size: 50px;
                font-weight: bold;
            }

            .error-text{
                font-size: 20px;
            }
        </style>

        <?php $this->load->view("templates/footer"); ?>
    </div>
</div>
<div id="loading"></div>
</body>
</html>