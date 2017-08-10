<?php
$data['title'] = 'OnePuhunan Service Portal | Manage TelleCaller Questions';
?>
<?php $this->load->view("onepuhunan/header",$data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">

            <h1><i class="glyphicon glyphicon-tag"></i> QA OPERATORS</h1>

            <!-- Trigger/Open The Modal -->
            <table id="tbl_pp" class="table table-striped" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>DATE</th>
                    <th>EMPLOYEE ID</th>
                    <th  class="uk-text-left">NAME</th>
                    <th>PENDING</th>
                </tr>
                </thead>

                <?php
                foreach((array) $pro_pending_qa as $row) { ?>
                    <tr class="modal-update">
                        <td class="match"><?php echo $row['as_of_date'] ?></td>
                        <td><?php echo $row['emp_id'] ?></td>
                        <td  class="uk-text-left"><?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?></td>
                        <td><?php echo $row['count'] ?></td>
                    </tr>
                <?php   }

                ?>


            </table>
            <h1><i class="glyphicon glyphicon-tag"></i> BMV OPERATORS</h1>

            <!-- Trigger/Open The Modal -->
            <table id="tbl_pbm" class="table table-striped" cellspacing="0" width="100%">
                <thead class="css3gradient">
                <tr>
                    <th>DATE</th>
                    <th>EMPLOYEE ID</th>
                    <th  class="uk-text-left">NAME</th>
                    <th>PENDING</th>
                </tr>
                </thead>

                <?php
                foreach((array) $pro_pending_bm as $row) { ?>
                    <tr class="modal-update">
                        <td class="match"><?php echo $row['as_of_date'] ?></td>
                        <td><?php echo $row['emp_id'] ?></td>
                        <td  class="uk-text-left"><?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?></td>
                        <td><?php echo $row['count'] ?></td>
                    </tr>
                <?php   }

                ?>


            </table>

            <h1><i class="glyphicon glyphicon-tag"></i> TC OPERATORS</h1>

            <!-- Trigger/Open The Modal -->
            <table id="tbl_ptc" class="table table-striped" cellspacing="0" width="100%">
                <thead class="css3gradient">
                <tr>
                    <th>DATE</th>
                    <th>EMPLOYEE ID</th>
                    <th  class="uk-text-left">NAME</th>
                    <th>PENDING</th>
                </tr>
                </thead>

                <?php
                foreach((array) $pro_pending_tc as $row) { ?>
                    <tr class="modal-update">
                        <td class="match"><?php echo $row['as_of_date'] ?></td>
                        <td><?php echo $row['emp_id'] ?></td>
                        <td  class="uk-text-left"><?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?></td>
                        <td><?php echo $row['count'] ?></td>
                    </tr>
                <?php   }

                ?>
            </table>

            <h1><i class="glyphicon glyphicon-tag"></i> SANCTION OPERATORS</h1>

            <!-- Trigger/Open The Modal -->
            <table id="tbl_ps" class="table table-striped" cellspacing="0" width="100%">
                <thead class="css3gradient">
                <tr>
                    <th>DATE</th>
                    <th>EMPLOYEE ID</th>
                    <th  class="uk-text-left">NAME</th>
                    <th>PENDING</th>
                </tr>
                </thead>

                <?php
                foreach((array) $pro_pending_sanction as $row) { ?>
                    <tr class="modal-update">
                        <td class="match"><?php echo $row['as_of_date'] ?></td>
                        <td><?php echo $row['emp_id'] ?></td>
                        <td  class="uk-text-left"><?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?></td>
                        <td><?php echo $row['count'] ?></td>
                    </tr>
                <?php   }

                ?>


            </table>
        </div>
    </div>
</div>
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>
