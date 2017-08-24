<?php
$data['title'] = 'OnePuhunan Service Portal | Loan Origination System';
$err = '&nbsp;&nbsp;<div class="uk-badge uk-badge-danger" data-uk-tooltip="{pos:\'right\'}" title="';
?>
<?php $this->load->view("onepuhunan/header",$data); ?>
<?php //$this->load->view("templates/head", $data); ?>
    <div class="main">
        <div class="main-inner client-bg">
            <div class="container">
                <div class="row client-container">
                    <div class="col-md-3">
                        <img id="los-info-pic" class="uk-border-rounded uk-thumbnail" src="<?=base_url()?>img/system_png/mvph-pic.png" alt="">
                    </div>
                    <div class="col-md-9">
                        <h1 id="hrtitle"><?=$cl_info['C_Name']?></h1>
                        <h4 class="badge"><?=$cl_tags['DestProcess']?></h4>
                    </div>
                </div>

                <div id="get_los_laf_err">
                    <!-- error messages -->

                        <div class='alert alert-warning'>
                            <ul style="margin-top: 1px">
                                <div class="ret">Retrieving..</div>
                            </ul>
                        </div>


                    <!-- client's snapshot -->
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
                </div>

                <div id="get_los_laf_repeat_display">
                    <!-- repeat loan details  -->
                        <h2 class="title"><i class="glyphicon glyphicon-tag"></i>  PREVIOUS ACCOUNT DETAILS</h2>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-bold">Account ID</div>
                                <div class="col-md-8">
                                    <span><div class="ret">Retrieving..</div></span>
                                    <span class="font-weight-bold">Attendance Ratio</span>
                                    <span>
                                   <div class="ret">Retrieving..</div>
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 text-bold">No. of Arrear Days</div>
                                <div class="col-md-8">
                                    <span><div class="ret">Retrieving..</div></span>
                                    <span class="font-weight-bold">Attendance Count</span>
                                    <span><div class="ret">Retrieving..</div></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 text-bold">Delayed Payments</div>
                                <div class="col-md-8">
                                    <span><div class="ret">Retrieving..</div></span>
                                    <span class="font-weight-bold">Meetings</span>
                                    <span><div class="ret">Retrieving..</div></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 text-bold">Past Due Amount</div>
                                <div class="col-md-8"><span>&#8369; <div class="ret">Retrieving..</div></span>
                                    <span class="font-weight-bold">Outstanding Principal</span>
                                    <span>&#8369; <div class="ret">Retrieving..</div></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 text-bold">Maturity Date</div>
                                <div class="col-md-8">
                                    <span><div class="ret">Retrieving..</div></span>
                                    <span class="font-weight-bold">Closed Date</span>
                                    <span><div class="ret">Retrieving..</div></span>
                                </div>
                            </div>
                        </div>
                </div>

                    <!-- personal details -->
                    <h2 class="title"><i class="glyphicon glyphicon-tag"></i>  PERSONAL DETAILS</h2>
                    <div class="row">
                        <div class="col-md-4 text-bold">Name</div>
                        <div class="col-md-8"><?=$cl_info['C_Name']?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-bold">Present Address</div>
                        <div class="col-md-8"><?=$cl_info['C_PresentAdd']?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-bold">Permanent Address</div>
                        <div class="col-md-8"><?=$cl_info['C_PermanentAdd']?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-bold">BirthDate</div>
                        <div class="col-md-8">
                            <span><?=$cl_info['C_DOB']?></span>
                            <span class="font-weight-bold">Age</span>
                            <span>
                                <?php
                                if ($cl_info['C_Age'] > 65) {
                                    echo $cl_info['C_Age'] . $err . 'Borrower is over the age of 65">!</div>';
                                } else if ($cl_info['C_Age'] < 18) {
                                    echo $cl_info['C_Age'] . $err . 'Borrower is under the age of 18">!</div>';
                                } else {
                                    echo $cl_info['C_Age'];
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-bold">Contact Number</div>
                        <div class="col-md-8">
                            <span>
                                <?php
                                if (strlen($cl_info['C_ContactNo']) < 11) {
                                    echo $cl_info['C_ContactNo'] . $err . 'Contact number must be at least 11 characters long">!</div>';
                                } else {
                                    echo $cl_info['C_ContactNo'];
                                }
                                ?>
                            </span>
                            <span class="font-weight-bold">Residence Ownership</span>
                            <span><?=$cl_info['ResidenceOwnership']?></span>
                        </div>
                    </div>

                    <!-- co-borrower details -->
                    <h2 class="title"><i class="glyphicon glyphicon-tag"></i>  CO-BORROWER DETAILS</h2>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 text-bold">Co-Borrower Name</div>
                            <div class="col-md-8"><?=$cl_info['B_Name']?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-bold">Co-Borrower Birthdate</div>
                            <div class="col-md-8">
                                <span><?=$cl_info['B_DOB']?></span>
                                <span class="font-weight-bold">Age</span>
                                <span>
                                    <?php
                                    if ($cl_info['B_Age'] > 65) {
                                        echo $cl_info['B_Age'] . $err . 'Co-Borrower is over the age of 65"">!</div>';
                                    } else if ($cl_info['B_Age'] < 18) {
                                        echo $cl_info['B_Age'] . $err . 'Co-Borrower is under the age of 18">!</div>';
                                    } else {
                                        echo $cl_info['B_Age'];
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-bold">Employer / Business Name</div>
                            <div class="col-md-8"><?=$cl_info['B_EmployerName']?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-bold">Work / Business Address</div>
                            <div class="col-md-8"><?=$cl_info['B_BusinessAdd']?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-bold">Contact Number</div>
                            <div class="col-md-8">
                                <?php
                                if (strlen($cl_info['B_ContactNo']) < 11) {
                                    echo $cl_info['B_ContactNo'] . $err . 'Contact number must be at least 11 characters long">!</div>';
                                } else {
                                    echo $cl_info['B_ContactNo'];
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <!-- business information -->
                    <h2 class="title"><i class="glyphicon glyphicon-tag"></i>  BUSINESS INFORMATION</h2>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 text-bold">Name of Business</div>
                            <div class="col-md-8"><?=$cl_info['BusinessName']?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-bold">Business Address</div>
                            <div class="col-md-8"><?=$cl_info['BusinessAdd']?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-bold">Business Type</div>
                            <div class="col-md-8">
                                <span><?=$cl_info['BusinessType']?></span>
                                <span class="font-weight-bold">Contact Number</span>
                                <span><?=$cl_info['BusinessContactNo']?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-bold">Business Size</div>
                            <div class="col-md-8">
                                <span><?=$cl_info['BusinessSize']?></span>
                                <span class="font-weight-bold">Years in Business</span>
                                <span id="txt_dbr" name="txt_dbr">
                                        <?php
                                        if($cl_info['YrsInBusiness'] < 1) {
                                            echo $cl_info['YrsInBusiness'] . $err . 'Business must be at least 1 year older">!</div>';
                                        } else {
                                            echo $cl_info['YrsInBusiness'];
                                        }
                                        ?>
                                    </span>
                            </div>
                        </div>
                    </div>

                    <!-- cashflow assessment (monthly) -->
                    <h2 class="title"><i class="glyphicon glyphicon-tag"></i>  CASHFLOW ASSESSMENT</h2>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 text-bold">Gross Sales</div>
                            <div class="col-md-8">
                                <span>&#8369; <?=number_format($cl_info['GrossSalesAmt'], 2, '.', ',')?></span>
                                <span class="font-weight-bold">Loan Installment</span>
                                <span>&#8369; <?=number_format($cl_info['LoanInstallmentAmt'], 2, '.', ',')?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-bold">Net Business Income</div>
                            <div class="col-md-8">
                                <span>&#8369; <?=number_format($cl_info['NetBusinessIncome'], 2, '.', ',')?></span>
                                <span class="font-weight-bold">Debt Burden Ratio</span>
                                <span><b>
                                        <?php
                                        if($cl_info['DBR'] > 40) {
                                            echo $cl_info['DBR'] . '%' . $err . 'Calculated Debt Burden Ratio (DBR) must be less than 40%">!</div>';
                                        } else {
                                            echo $cl_info['DBR'] . '%';
                                        }
                                        ?>

                                </b></span><br/>
                                <span></span>
                                <span class="font-weight-bold">Debt Burden Ratio 2</span>
                                <span><b>
                                        <?php
                                        if($cl_dbr2['DBR2'] > 40) {
                                            echo $cl_dbr2['DBR2'] . '%' . $err . 'Calculated Debt Burden Ratio (DBR2) must be less than 40%">!</div>';
                                        } else {
                                            echo $cl_dbr2['DBR2'] . '%';
                                        }
                                        ?>
                                    </b></span>
                            </div>
                        </div>
                    </div>

                    <!-- liabilities and assets -->
                    <h2 class="title"><i class="glyphicon glyphicon-tag"></i>  LIABILITIES AND ASSETS</h2>
                    <div class="form-group">
                            <table class="table table-striped op-table E1">
                                <thead>
                                <tr>
                                    <th width="33.4%">Name of Creditor</th>
                                    <th width="33.3%">Loan Amount</th>
                                    <th width="33.3%">Installment Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (count($cl_asset) > 0) {
                                    foreach((array) $cl_asset as $row) {
                                        $result = '<tr>'
                                            . '<td>' . $row['InstName'] . '</td>'
                                            . '<td>&#8369; ' . number_format($row['LoanAmount'], 2, '.', ',') . '</td>'
                                            . '<td>&#8369; ' . number_format($row['InstallmentAmt'], 2, '.', ',') . '</td>'
                                            . '</tr>';
                                        echo $result;
                                    }
                                }  else {
                                    $result = '<tr><td colspan="3" class="text-center">No data</td></tr>';
                                    echo $result;
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>

                    <!-- beneficiary's details -->
                    <h2 class="title"><i class="glyphicon glyphicon-tag"></i>  BENEFICIARY'S DETAILS</h2>
                    <div class="form-group">
                            <table class="table table-striped op-table E1">
                                <thead>
                                <tr>
                                    <th width="33.4%">Name</th>
                                    <th width="33.3%">Birthdate</th>
                                    <th width="33.3%">Relationship</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?=$cl_info['BN_Name']?></td>
                                    <td><?=$cl_info['BN_DOB']?></td>
                                    <td><?=$cl_info['BN_Relationship']?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    <!-- tellecaller question -->
                    <?php if($this->session->role_id == 'tc') { ?>
                    <h2 class="title"><i class="glyphicon glyphicon-tag"></i>  TELLECALLER</h2>
                    <div class="form-group">
                        <form id="los_tc_form" class="uk-form" method="post" action="<?=$cl_info['LAF']?>/submit">
                            <table class="table table-striped table-fix op-table E1">
                                <thead>
                                <tr>
                                    <th>Questions</th>
                                    <th>Answer</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach((array) $cl_tc as $row) {
                                    $result = '<tr>'
                                        . '<td>' . $row['question'] . '</td>'
                                        . '<td class="hidden"><input name="tc_q[]" class="form-control" type="text" value="' . $row['question'] . '"> </td>'
                                        . '<td>' . '<input name="tc[]" type="text" class="form-control">' . '</td>'
                                        . '</tr>';
                                    echo $result;
                                }
                                ?>
                                </tbody>
                            </table>
                            <input class="Approval_hidden" name="Approval_hidden" type="hidden" value="">
                            <input name="txt_tc_fileno" type="text" class="hidden" value="<?=$cl_info['LAF']?>" />
                        </form>
                    </div>
                    <?php } ?>

                    <!-- sanction (cpu) -->
                    <?php if($this->session->role_id == 'cpu' && count($cl_tc_display) > 0) { ?>
                    <h2 class="title"><i class="glyphicon glyphicon-tag"></i>  TELLECALLER</h2>
                    <div class="form-group">
                        <table class="table table-striped table-fix op-table E1">
                            <thead>
                            <tr>
                                <th width="10%">Date Processed</th>
                                <th width="30%">Question</th>
                                <th width="20%">Value</th>
                                <th width="20%">Processed By</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach((array) $cl_tc_display as $row) {
                                $result = '<tr>'
                                    . '<td>' . $row['DateProcessed'] . '</td>'
                                    . '<td>' . $row['Question'] . '</td>'
                                    . '<td><i>' . $row['ProcessValue'] . '</i></td>'
                                    . '<td>' . $row['ProcessedBy'] . '</td>'
                                    . '</tr>';
                                echo $result;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <?php } ?>


                    <h2 class="title"><i class="glyphicon glyphicon-tag"></i>  REMARKS/ COMMENTS</h2>
                    <?php if (count($cl_remarks) > 0) { ?>
                        <div class="form-group">
                            <table class="table table-striped table-fix op-table E1">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="10%">Date Processed</th>
                                    <th width="10%">Value</th>
                                    <th width="40%">Remarks</th>
                                    <th width="20%">Processed By</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach((array) $cl_remarks as $row) {
                                    $result = '<tr>'
                                        . '<td>' . $row['ProcessNo'] . '</td>'
                                        . '<td>' . $row['DateProcessed'] . '</td>';

                                    $result = $result
                                        . '<td>'
                                        . '<span class="uk-badge uk-badge-success width-51">' . $row['PrevProcess'] . '</span> ';

                                    if($row['ProcessValue'] === 'APR') {
                                        $result = $result . '<span class="uk-badge uk-badge-success">APR</span></td>';
                                    } elseif($row['ProcessValue'] === 'REJ') {
                                        $result = $result . '<span class="uk-badge uk-badge-danger">REJ</span></td>';
                                    } elseif($row['ProcessValue'] === 'REV') {
                                        $result = $result . '<span class="uk-badge uk-badge-warning">REV</span></td>';
                                    }

                                    $result = $result
                                        . '<td><i>' . $row['Remarks'] . '</i></td>'
                                        . '<td>' . $row['Processor'] . '</td>'
                                        . '</tr>';

                                    echo $result;
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    <?php if($this->session->role_id != 'tc') { ?>
                            <div class="form-group">
                                <form id="los_form" class="uk-form" style="margin-top: 3px" method="post" action="<?=$cl_info['LAF']?>/submit">
                                    <textarea name="txt_remarks" class="form-control" cols="" rows="" placeholder="Enter Remarks/Comments Here"></textarea>
                                    <input name="txt_fileno" type="text" class="hidden" value="<?=$cl_info['LAF']?>" />
                                    <input class="Approval_hidden" name="Approval_hidden" type="hidden" value="">
                                </form>
                            </div>
                        <?php } ?>

                    <!-- controls -->
                    <div class="form-group text-center">
                            <?php if($cl_tags['ProcessValue'] !== 'REJ') { ?>
                                <input type="submit" name="btn_approve" value="Approve" id="BtnApprove" class="btn global-btn-blue btn-min-width " form="<?=($this->session->role_id != 'tc' ? "los_form" : "los_tc_form");?>" />
                            <?php } else { ?>
                                <input type="submit" name="btn_approve" value="Approve"   id="BtnApprove" class="btn global-btn-blue btn-min-width " form="los_form" disabled />
                            <?php } ?>

                            <input type="submit" name="btn_reject"  value="Reject"  id="BtnReject"  class="btn global-btn-red btn-min-width " form="<?=($this->session->role_id != 'tc' ? "los_form" : "los_tc_form");?>" />
                            <?php if(($this->session->role_id != 'qa') || ($cl_tags['DestProcess'] != 'KYC')) { ?>
                                <input type="submit" name="btn_revert"  value="Revert"  id="BtnRevert" class="btn global-btn-grey btn-min-width " form="<?=($this->session->role_id != 'tc' ? "los_form" : "los_tc_form");?>" />

                            <?php } ?>
                    </div>

                </div>
        </div>
    </div>
<?php $this->load->view("onepuhunan/copyright"); ?>

 <script>
    $(document).ready(function(){
        $.get( "<?php echo base_url(); ?>/get_los_laf_repeat_display/<?php echo $input; ?>", function( data ) {
            $( "#get_los_laf_repeat_display" ).html( data );
        });

        $.get( "<?php echo base_url(); ?>/get_los_laf_err/<?php echo $input; ?>", function( data ) {
            $( "#get_los_laf_err" ).html( data );
        });
    });
</script>
<?php $this->load->view("onepuhunan/footer"); ?>