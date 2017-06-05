<?php
    $data['title'] = 'OnePuhunan Service Portal | Manage TelleCaller Questions';
?>
<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view("templates/op-head", $data); ?>
    <body id="losbody">
        <div id="page-wrapper">
            <?php $this->load->view("templates/op-header"); ?>
            <?php $this->load->view("templates/subheader"); ?>
            <div class="header-bg">
                <div class="header-banner">
                    <div class="uk-container op-container">
                        <h2>SYSTEM SETTINGS</h2>
                    </div>
                </div>
            </div>
            <section id="main-section">


                <div class="uk-container table-wrap op-container tc-container">  <!-- Modal HTML embedded directly into document -->

                    <div class="op-title"><h1><i class="uk-icon-tags"></i> MANAGE TELLECALLER QUESTIONS</h1></div>

                    <!-- Trigger/Open The Modal -->
                    <a href="#btnAdd" rel="modal:open"> <button class="uk-button add-btn" type="button"><span class="op-btn"><i class="uk-icon-plus"></i> ADD QUESTION</span></button> </a>

                    <table id="tbl_tc" class="uk-text-center stripe hover op-table E1 tc-table" cellspacing="0" width="100%">
                        <thead class="css3gradient">
                        <tr>
                            <th>ID</th>
                            <th>QUESTION</th>
                            <th>NEW LOAN</th>
                            <th>REPEAT LOAN</th>
                            <th>SET FOR TC</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </section>
            <?php $this->load->view("templates/footer"); ?>
            <?php $this->load->view("templates/modal"); ?>
        </div>
    </body>
</html>