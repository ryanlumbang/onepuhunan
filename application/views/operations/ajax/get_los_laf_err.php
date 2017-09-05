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
<h2 class="title_los"><i class="glyphicon glyphicon-tag"></i>  CLIENT SNAPSHOT</h2>
<div class="form-group">
    <table class="table table-striped op-table E1">
        <thead>
        <tr>
            <th width="10%" class="text-center">LAF</th>
            <th width="12%" class="text-center">Applied Loan Amount</th>
            <th width="12%" class="text-center">Application Date</th>
            <th width="12%" class="text-center">Client ID</th>
            <th width="12%" class="text-center">BRNET Client ID</th>
            <th width="12%" class="text-center">Branch ID</th>
            <th width="16.7%" class="text-center">Branch Name</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="text-center"><?=$cl_info['LAF']?></td>
            <td class="text-center">&#8369; <?=number_format($cl_info['AppliedLoanAmount'], 2, '.', ',')?></td>
            <td class="text-center"><?=$cl_info['ApplicationDate']?></td>
            <td class="text-center"><?=$cl_info['ClientID']?></td>
            <td class="text-center"><?=$cl_info['BRNETClientID']?></td>
            <td class="text-center"><?=$cl_info['BranchID']?></td>
            <td class="text-center"><?=$cl_info['BranchName']?> </td>
        </tr>
        </tbody>
    </table>
</div>