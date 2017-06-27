<?php
    $data['title'] = 'OnePuhunan Service Portal | Manage TelleCaller Questions';
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
                        <h2>LOS SETTINGS</h2>
                    </div>
                </div>
            </div>
            <section id="main-section">


                <div class="uk-container table-wrap op-container tc-container">  <!-- Modal HTML embedded directly into document -->

                    <div class="op-title"><h1><i class="uk-icon-tags"></i> MANAGE TELLECALLER QUESTIONS</h1></div>

                    <!-- Trigger/Open The Modal -->
                    <a href="<?php echo site_url("sys/tc_question/add"); ?>"> <button class="uk-button add-btn" type="button"><span class="op-btn"><i class="uk-icon-plus"></i> ADD QUESTION</span></button> </a>

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

                        <?php

                        foreach((array) $tc_ques as $row) { ?>
                            <tr class="modal-update">
                            <td> <?php echo $row['question_no'] ?> </td>
                            <td> <?php echo $row['question'] ?> </td>
                            <td> <input type="hidden" name="checkme" value="0"><input type="checkbox" name="checkme" value="<?php echo $row['is_new'] ?>"></td>
                            <td> <input type="hidden" name="checkme" value="0"><input type="checkbox" name="checkme" value="<?php echo $row['is_repeat'] ?>"></td>
                            <td> <input type="hidden" name="checkme" value="0"><input type="checkbox" name="checkme" value="<?php echo $row['is_set'] ?>"></td>
                            <td>  <a href="<?php echo site_url("sys/tc_question/update?quest1=".$row['question_no']."&quest=".$row['question']."&new=".$row['is_new']."&repeat=".$row['is_repeat']."&set=".$row['is_set'].""); ?>" data-question="<?php echo $row['question'] ?>" data-new="<?php echo $row['is_new'] ?>" data-repeat="<?php echo $row['is_repeat'] ?>" data-set="<?php echo $row['is_set'] ?>" class="open-AddBookDialog" id="editbtn"  data-seq="1"> <i class="uk-icon-edit"></i> EDIT </a></td>
                            </tr>
                      <?php   }

                      ?>


                    </table>
                </div>
            </section>
            <?php $this->load->view("templates/footer"); ?>
            <?php $this->load->view("templates/modal"); ?>
        </div>
    </div>
    <div id="loading"></div>
     </body>
     </html>