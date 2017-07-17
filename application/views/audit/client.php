<?php $this->load->view("templates/op-head"); ?>

<table id="tbl_consolidated" class="uk-text-center stripe hover op-table E1 tc-table" cellspacing="0" width="100%">
    <thead class="css3gradient">
    <tr>
        <th>BRANCH ID</th>
        <th>CLIENT ID</th>
        <th>ACCOUNT ID</th>
        <th>CLIENT NAME</th>
        <th>ACTION</th>
    </tr>
    </thead>

    <?php

    foreach((array) $query as $row) { ?>
        <tr class="modal-update">
            <td> <?php echo $row['OurBranchID'] ?> </td>
            <td> <?php echo $row['ClientID'] ?> </td>
            <td> <?php echo $row['AccountID'] ?> </td>
            <td> <?php echo $row['Name'] ?> </td>
<!--                                        <td> EDIT </td>-->
            <td>  <a href="<?php echo site_url("audit/client_info/".$row['ClientID'].""); ?>" > <i class="uk-icon-edit"></i> AUDIT </a></td>
        </tr>
    <?php   }

    ?>

</table>