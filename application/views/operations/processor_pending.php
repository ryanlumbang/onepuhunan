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

                <div class="op-title"><h1><i class="uk-icon-tags"></i> QA OPERATORS</h1></div>

                <!-- Trigger/Open The Modal -->
                <table id="tbl_pp" class="uk-text-center stripe hover op-table E1 tc-table" cellspacing="0" width="100%">
                    <thead class="css3gradient">
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
                <br/>
                <br/>
                <br/>

                <div class="op-title"><h1><i class="uk-icon-tags"></i> BMV OPERATORS</h1></div>

                <!-- Trigger/Open The Modal -->
                <table id="tbl_pbm" class="uk-text-center stripe hover op-table E1 tc-table" cellspacing="0" width="100%">
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

                <br/>
                <br/>
                <br/>

                <div class="op-title"><h1><i class="uk-icon-tags"></i> TC OPERATORS</h1></div>

                <!-- Trigger/Open The Modal -->
                <table id="tbl_ptc" class="uk-text-center stripe hover op-table E1 tc-table" cellspacing="0" width="100%">
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
                <br/>
                <br/>
                <br/>

                <div class="op-title"><h1><i class="uk-icon-tags"></i> SANCTION OPERATORS</h1></div>

                <!-- Trigger/Open The Modal -->
                <table id="tbl_ps" class="uk-text-center stripe hover op-table E1 tc-table" cellspacing="0" width="100%">
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
        </section>
        <?php $this->load->view("templates/footer"); ?>
        <?php $this->load->view("templates/modal"); ?>
    </div>
</div>
<div id="loading"></div>
</body>
</html>