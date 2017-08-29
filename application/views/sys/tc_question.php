<?php
    $data['title'] = 'OnePuhunan Service Portal | Manage TelleCaller Questions';
?>
<?php $this->load->view("onepuhunan/header",$data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <h2 class="title"><i class="glyphicon glyphicon-tag"></i>  MANAGE TELLECALLER QUESTIONS</h2>

            <!-- Trigger/Open The Modal -->
            <a href="<?php echo site_url("sys/tc_question/add"); ?>">
                <button class="btn global-btn-add add-btn" type="button"><span class="op-btn"><i class="glyphicon glyphicon-plus"></i> ADD QUESTION</span></button>
            </a>

            <table id="tbl_tc" class="table table-striped op-table E1" cellspacing="0" width="100%">
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
                        <td> <input type="hidden" name="checkme" value="0"><input disabled type="checkbox" name="checkme" value="<?php echo $row['is_new'] ?>"></td>
                        <td> <input type="hidden" name="checkme" value="0"><input disabled type="checkbox" name="checkme" value="<?php echo $row['is_repeat'] ?>"></td>
                        <td> <input type="hidden" name="checkme" value="0"><input disabled type="checkbox" name="checkme" value="<?php echo $row['is_set'] ?>"></td>
                        <td>
                            <a href="<?php echo site_url("sys/tc_question/update?quest1=".$row['question_no']."&quest=".$row['question']."&new=".$row['is_new']."&repeat=".$row['is_repeat']."&set=".$row['is_set'].""); ?>"
                               data-question="<?php echo $row['question'] ?>" data-new="<?php echo $row['is_new'] ?>" data-repeat="<?php echo $row['is_repeat'] ?>"
                               data-set="<?php echo $row['is_set'] ?>" class="open-AddBookDialog btn global-btn-blue" id="editbtn"  data-seq="1">
                                <i class="glyphicon glyphicon-pencil"></i> EDIT </a>
                        </td>
                    </tr>
                <?php   }

                ?>


            </table>
        </div>
    </div>
</div>
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>
