<!-- error messages -->
<?php if (count($cl_error) > 0) { ?>
    <div class='alert alert-warning'><b>This account contains the following error(s):</b>
        <ul style="margin-top: 1px">
            <?php
            foreach((array) $cl_error as $row) {
                $error = '<li>' . $row['ErrorDesc'] . '</li>';
                echo $error;
            }
            ?>
        </ul>
    </div>
<?php } ?>

<!-- client's snapshot -->
<?php if (count($cl_error) > 0) { ?>

<?php } else { ?>
<?php } ?>
<h2 class="title"><i class="glyphicon glyphicon-tag"></i>  CLIENT SNAPSHOT</h2>
<div class="form-group">
    <table class="table table-striped op-table E1">
        <thead>
        <tr>
            <th width="10%">LAF</th>
            <th width="12%">Applied Loan Amount</th>
            <th width="12%">Application Date</th>
            <th width="12%">Client ID</th>
            <th width="12%">BRNET Client ID</th>
            <th width="12%">Branch ID</th>
            <th width="16.7%">Branch Name</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?=$cl_info['LAF']?></td>
            <td>&#8369; <?=number_format($cl_info['AppliedLoanAmount'], 2, '.', ',')?></td>
            <td><?=$cl_info['ApplicationDate']?></td>
            <td><?=$cl_info['ClientID']?></td>
            <td><?=$cl_info['BRNETClientID']?></td>
            <td><?=$cl_info['BranchID']?></td>
            <td><?=$cl_info['BranchName']?> </td>
        </tr>
        </tbody>
    </table>
</div>