<?php
    $data['title'] = 'OnePuhunan Service Portal | Registration Request';
    header("Cache-Control: max-age=0, must-revalidate");
    ?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("templates/head", $data); ?>
<body>
    <?php $this->load->view("templates/header"); ?>
    <div class="page-wrap">
        <?php $this->load->view("templates/subheader"); ?>

        <div class="uk-container uk-width-5-10 uk-container-center">
            <div class="uk-form" style="padding-top: 5%;">

                <div class="uk-alert uk-alert-danger uk-margin-large-top text-align">
                    <span class="error">ERROR 404!<span>
                            <br/>
                    <span class="error-text">Access is Forbidden!<span>

                </div>

                <div class="uk-form text-align">
                    <a href="<?=base_url()?>" class="uk-button uk-button-default uk-width-3-10 uk-margin-small-top">Back to Homepage</a>
                </div>

            </div>
        </div>

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

    </div>

    <div class="overlay">
        <div class="modelBox">
            <div class="modal-header">
                <h2 class="header">LOADING DATA!</h2>
            </div>

            <div class="modal-header-done">
                <h2 class="header">SUCCESS!</h2>
            </div>

            <div class="modal-body">
                                                    <span class ="modal-body-text">
                                                        <div class="extraction-success">
                                                            <div class="loading">
                                                                <img src="<?=base_url()?>img/system_png/loader.gif" class="loader"/>
                                                                <p class="dot text-loading">Please Wait <span>.</span><span>.</span><span>.</span></p>
                                                            </div>
                                                        </div>

                                                         <div class="extraction-done">
                                                                <div class="loading">
                                                                    <img src="<?=base_url()?>img/system_png/done.gif" class="icon-done"/>
                                                                </div>
                                                         </div>

                                                    </span>
            </div>
            <div class="modal-footer">
                <button class="uk-button uk-button-success footer close">
                    <a href="<?php echo site_url("audit/index"); ?>" style="text-decoration: none; color: white;">OK</a>
                </button>
            </div>
        </div>
    </div>

    <?php $this->load->view("templates/footer"); ?>
</body>
</html>


