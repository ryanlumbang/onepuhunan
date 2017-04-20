<?php
    $data['title'] = 'OnePuhunan Service Portal | Manage TelleCaller Questions';
?>
<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view("templates/head", $data); ?>
    <body id="losbody" class="uk-height-1-1">
        <?php $this->load->view("templates/header"); ?>
        <div class="page-wrap">
            <?php $this->load->view("templates/subheader"); ?>
            <div class="bg-middle" style="padding-top: 100px;">
                <div class="uk-container uk-container-center" style="margin-bottom: -4px;">
                    <span id="hrtitle" class="uk-margin-large-left">SYSTEM SETTINGS</span>
                </div>
            </div>
            <div class="bg-middle bg-shadow2">
                <div class="uk-container uk-container-center bg-lower">
                    <div class="los-container margin-top-50 clear">
                        <div class="los-header">
                            <h1><span class="uk-icon-tags uk-margin-small-left uk-margin-small-right"></span> MANAGE TELLECALLER QUESTIONS</h1>
                        </div>
                        <div class="los-content">
                            <table id="tbl_tc" class="uk-table uk-table-striped uk-table-condensed uk-margin-small-top table-fix">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Question</th>
                                        <th>New Loan</th>
                                        <th>Repeat Loan</th>
                                        <th>Set for TC</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <?php $this->load->view("templates/footer"); ?>
    </body>
</html>
