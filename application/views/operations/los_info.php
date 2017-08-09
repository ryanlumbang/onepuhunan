<?php
    $data['title'] = 'OnePuhunan Service Portal | Loan Origination System';
    $err = '&nbsp;&nbsp;<div class="uk-badge uk-badge-danger" data-uk-tooltip="{pos:\'right\'}" title="';
?>
<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view("templates/head", $data); ?>

    <body id="losbody" class="uk-height-1-1">
    <div id="page">
        <?php $this->load->view("templates/header"); ?>
        
        <div class="page-wrap">
            <?php $this->load->view("templates/subheader"); ?>
            <div class="bg-middle" style="padding-top: 100px;">
                <div class="uk-container uk-container-center" style="margin-bottom: -4px;">
                    <img id="los-info-pic" class="uk-border-rounded uk-thumbnail" src="<?=base_url()?>img/system_png/mvph-pic.png" alt="">
                    <span id="hrtitle" class="uk-margin-large-left"><?=$cl_info['C_Name']?></span>
                    <span class="uk-badge los-info-tags"><?=$cl_tags['DestProcess']?></span>
                </div>
            </div>
            <div class="bg-middle bg-shadow2">
                <div class="uk-container uk-container-center bg-lower">
                    
                    <!-- error messages -->
                    <?php if (count($cl_error) > 0) { ?>
                        <div class="los-container los-margin-top clear">
                            <div class="uk-alert uk-alert-danger"><b>This account contains the following error(s):</b>
                                <ul style="margin-top: 1px">
                                    <?php 
                                        foreach((array) $cl_error as $row) {
                                            $error = '<li>' . $row['ErrorDesc'] . '</li>';
                                            echo $error;
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                    
                    <!-- client's snapshot -->
                    <?php if (count($cl_error) > 0) { ?>
                    <div class="los-container clear" style="margin-top: 25px;">
                    <?php } else { ?>
                    <div class="los-container los-margin-top clear">
                    <?php } ?>
                        <div class="los-header">
                            <h1><span class="uk-icon-tags uk-margin-small-left uk-margin-small-right"></span> CLIENT SNAPSHOT</h1>
                        </div>
                        <div class="los-content">
                            <table class="uk-table uk-table-striped uk-table-condensed uk-margin-small-top">
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

                    <!-- repeat loan details  -->
                    <?php if($cl_repeat['AccountID'] != NULL) { ?>
                    <div class="los-container clear">
                        <div class="los-header">
                            <h1><span class="uk-icon-archive uk-margin-small-left uk-margin-small-right"></span> PREVIOUS ACCOUNT DETAILS</h1>
                        </div>
                        <div class="los-content">
                            <dl class="uk-description-list-horizontal uk-margin-small-top">
                                <dt>Account ID</dt>
                                <dd>
                                    <span><?=$cl_repeat['AccountID']?></span>
                                    <span class="uk-text-bold">Attendance Ratio</span>
                                    <span>
                                        <?php
                                            if($cl_repeat['MeetingCnt'] != 0 ) {
                                                echo ($cl_repeat['AttendanceCnt'] / $cl_repeat['MeetingCnt']) * 100; 
                                            } else {
                                                echo 0;
                                            }
                                            
                                        ?>%
                                    </span>
                                </dd>
                                
                                <dt class="dt-even">No. of Arrear Days</dt>
                                <dd class="dd-even">
                                    <span><?=$cl_repeat['NoOfArrearDays']?></span>
                                    <span class="uk-text-bold">Attendance Count</span>
                                    <span><?=$cl_repeat['AttendanceCnt']?></span>
                                </dd>
                                <dt>Delayed Payments</dt>
                                <dd>
                                    <span><?=$cl_repeat['DelayedPymnt']?></span>
                                    <span class="uk-text-bold">Meetings</span>
                                    <span><?=$cl_repeat['MeetingCnt']?></span>
                                </dd>
                                <dt class="dt-even">Past Due Amount</dt>
                                <dd class="dd-even">
                                    <span>&#8369; <?=number_format($cl_repeat['PrinArrearAmount'], 2, '.', ',')?></span>
                                    <span class="uk-text-bold">Outstanding Principal</span>
                                    <span>&#8369; <?=number_format($cl_repeat['OutstandingPrincipal'], 2, '.', ',')?></span>
                                </dd>
                                <dt>Maturity Date</dt>
                                <dd>
                                    <span><?=$cl_repeat['MaturityDate']?></span>
                                    <span class="uk-text-bold">Closed Date</span>
                                    <span><?=$cl_repeat['ClosedDate']?></span>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <?php } ?>    
                    
                    <!-- personal details -->
                    <div class="los-container clear">
                        <div class="los-header">
                            <h1><span class="uk-icon-user uk-margin-small-left uk-margin-small-right"></span> PERSONAL DETAILS</h1>
                        </div>
                        <div class="los-content">
                            <dl class="uk-description-list-horizontal uk-margin-small-top">
                                <dt>Name</dt>
                                <dd><?=$cl_info['C_Name']?></dd>
                                <dt class="dt-even">Present Address</dt>
                                <dd class="dd-even"><?=$cl_info['C_PresentAdd']?></dd>
                                <dt>Permanent Address</dt>
                                <dd><?=$cl_info['C_PermanentAdd']?></dd>
                                <dt class="dt-even">BirthDate</dt>
                                <dd class="dd-even">
                                    <span><?=$cl_info['C_DOB']?></span>
                                    <span class="uk-text-bold">Age</span>
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
                                </dd>
                                <dt>Contact Number</dt>
                                <dd>
                                    <span>
                                        <?php
                                            if (strlen($cl_info['C_ContactNo']) < 11) {
                                               echo $cl_info['C_ContactNo'] . $err . 'Contact number must be at least 11 characters long">!</div>';
                                            } else {
                                                echo $cl_info['C_ContactNo'];
                                            }
                                        ?>
                                    </span>
                                    <span class="uk-text-bold">Residence Ownership</span>
                                    <span><?=$cl_info['ResidenceOwnership']?></span>
                                </dd>
                            </dl>  
                        </div>
                    </div>
                    
                    <!-- co-borrower details -->
                    <div class="los-container clear">
                        <div class="los-header">
                            <h1><span class="uk-icon-group uk-margin-small-left uk-margin-small-right"></span> CO-BORROWER DETAILS</h1>
                        </div>
                        <div class="los-content">
                            <dl class="uk-description-list-horizontal uk-margin-small-top">
                                <dt>Co-Borrower Name</dt>
                                <dd><?=$cl_info['B_Name']?></dd>
                                <dt class="dt-even">Co-Borrower Birthdate</dt>
                                <dd class="dd-even">
                                    <span><?=$cl_info['B_DOB']?></span>
                                    <span class="uk-text-bold">Age</span>
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
                                </dd>
                                <dt>Employer / Business Name</dt>
                                <dd><?=$cl_info['B_EmployerName']?></dd>
                                <dt class="dt-even">Work / Business Address</dt>
                                <dd class="dd-even"><?=$cl_info['B_BusinessAdd']?></dd>
                                <dt>Contact Number</dt>
                                <dd>
                                    <?php
                                        if (strlen($cl_info['B_ContactNo']) < 11) {
                                           echo $cl_info['B_ContactNo'] . $err . 'Contact number must be at least 11 characters long">!</div>';
                                        } else {
                                            echo $cl_info['B_ContactNo'];
                                        }
                                    ?>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    
                    <!-- business information -->
                    <div class="los-container clear">
                        <div class="los-header">
                            <h1><span class="uk-icon-building uk-margin-small-left uk-margin-small-right"></span> BUSINESS INFORMATION</h1>
                        </div>
                        <div class="los-content">
                            <dl class="uk-description-list-horizontal uk-margin-small-top">
                                <dt>Name of Business</dt>
                                <dd><?=$cl_info['BusinessName']?></dd>
                                <dt class="dt-even">Business Address</dt>
                                <dd class="dd-even"><?=$cl_info['BusinessAdd']?></dd>
                                <dt>Business Type</dt>
                                <dd>
                                    <span><?=$cl_info['BusinessType']?></span>
                                    <span class="uk-text-bold">Contact Number</span>
                                    <span><?=$cl_info['BusinessContactNo']?></span>
                                </dd>
                                <dt class="dt-even">Business Size</dt>
                                <dd class="dd-even">
                                    <span><?=$cl_info['BusinessSize']?></span>
                                    <span class="uk-text-bold">Years in Business</span>
                                    <span id="txt_dbr" name="txt_dbr">
                                        <?php
                                            if($cl_info['YrsInBusiness'] < 1) {
                                                echo $cl_info['YrsInBusiness'] . $err . 'Business must be at least 1 year older">!</div>';
                                            } else {
                                                echo $cl_info['YrsInBusiness'];
                                            }
                                        ?>
                                    </span>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    
                    <!-- cashflow assessment (monthly) -->
                    <div class="los-container clear">
                        <div class="los-header">
                            <h1><span class="uk-icon-bar-chart uk-margin-small-left uk-margin-small-right"></span> CASHFLOW ASSESSMENT</h1>
                        </div>
                        <div class="los-content">
                            <dl class="uk-description-list-horizontal uk-margin-small-top">
                                <dt>Gross Sales</dt>
                                <dd>
                                    <span>&#8369; <?=number_format($cl_info['GrossSalesAmt'], 2, '.', ',')?></span>
                                    <span class="uk-text-bold">Loan Installment</span>
                                    <span>&#8369; <?=number_format($cl_info['LoanInstallmentAmt'], 2, '.', ',')?></span>
                                </dd>
                                <dt class="dt-even">Net Business Income</dt>
                                <dd class="dd-even">
                                    <span>&#8369; <?=number_format($cl_info['NetBusinessIncome'], 2, '.', ',')?></span>
                                    <span class="uk-text-bold">Debt Burden Ratio</span>
                                    <span><b>
                                        <?php
                                        if($cl_info['DBR'] > 40) {
                                            echo $cl_info['DBR'] . '%' . $err . 'Calculated Debt Burden Ratio (DBR) must be less than 40%">!</div>';
                                        } else {
                                            echo $cl_info['DBR'] . '%';
                                        }
                                        ?>

                                    </b></span>
                                </dd>
                                <dd class="dd-even">
                                    <span></span>
                                    <span class="uk-text-bold">Debt Burden Ratio 2</span>
                                    <span><b>
                                        <?php
                                        if($cl_dbr2['DBR2'] > 40) {
                                            echo $cl_dbr2['DBR2'] . '%' . $err . 'Calculated Debt Burden Ratio (DBR2) must be less than 40%">!</div>';
                                        } else {
                                            echo $cl_dbr2['DBR2'] . '%';
                                        }
                                        ?>
                                    </b></span>
                                </dd>

                            </dl>
                        </div>
                    </div>
                    
                    <!-- liabilities and assets -->
                    <div class="los-container clear">
                        <div class="los-header">
                            <h1><span class="uk-icon-bank uk-margin-small-left uk-margin-small-right"></span> LIABILITIES AND ASSETS</h1>
                        </div>
                        <div class="los-content">
                            <table class="uk-table uk-table-striped uk-table-condensed uk-margin-small-top">
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
                                            $result = '<tr><td colspan="3" class="uk-text-center">--- Nothing ---</td></tr>';
                                            echo $result;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!-- beneficiary's details -->
                    <div class="los-container clear">
                        <div class="los-header">
                            <h1><span class="uk-icon-child uk-margin-small-left uk-margin-small-right"></span> BENEFICIARY'S DETAILS</h1>
                        </div>
                        <div class="los-content">
                            <table class="uk-table uk-table-striped uk-table-condensed uk-margin-small-top">
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
                    </div>  
                    
                    <!-- tellecaller question -->
                    <?php if($this->session->role_id == 'tc') { ?>
                    <div class="los-container clear">
                        <div class="los-header" style="background: #529B9C;">
                            <h1><span class="uk-icon-phone uk-margin-small-left uk-margin-small-right"></span> TELLECALLER</h1>
                        </div>
                        <div class="los-content">
                            <form id="los_tc_form" class="uk-form" method="post" action="<?=$cl_info['LAF']?>/submit">
                                <table class="uk-table uk-table-striped uk-table-condensed uk-margin-small-top table-fix">
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
                                                        . '<td class="uk-hidden"><input name="tc_q[]" type="text" value="' . $row['question'] . '"> </td>'
                                                        . '<td>' . '<input name="tc[]" type="text" class="uk-form-small uk-form-width-large">' . '</td>'
                                                        . '</tr>';
                                                echo $result;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <input class="Approval_hidden" name="Approval_hidden" type="hidden" value="">
                                <input name="txt_tc_fileno" type="text" class="uk-hidden" value="<?=$cl_info['LAF']?>" />
                            </form>
                        </div>
                    </div>
                    <?php } ?>
                    
                    <!-- sanction (cpu) -->
                    <?php if($this->session->role_id == 'cpu' && count($cl_tc_display) > 0) { ?>
                    <div class="los-container clear">
                        <div class="los-header">
                            <h1><span class="uk-icon-phone uk-margin-small-left uk-margin-small-right"></span> TELLECALLER</h1>
                        </div>
                        <div class="los-content">
                            <table class="uk-table uk-table-striped uk-table-condensed uk-margin-small-top table-fix">
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
                    </div>
                    <?php } ?>
                    
                    
                    <div class="los-container clear">
                        <div class="los-header" style="border-radius: 0;">
                            <h1><span class="uk-icon-pencil uk-margin-small-left uk-margin-small-right"></span> REMARKS / COMMENTS</h1>
                        </div>
                        <?php if (count($cl_remarks) > 0) { ?>
                            <div class="los-content">
                                <table class="uk-table uk-table-striped uk-table-condensed uk-margin-small-top table-fix">
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
                        <div class="los-content darkbg">
                            <form id="los_form" class="uk-form" style="margin-top: 3px" method="post" action="<?=$cl_info['LAF']?>/submit">
                                <textarea name="txt_remarks" class="uk-width-1-1" cols="" rows="" placeholder="Enter Remarks/Comments Here"></textarea>
                                <input name="txt_fileno" type="text" class="uk-hidden" value="<?=$cl_info['LAF']?>" />
                                <input class="Approval_hidden" name="Approval_hidden" type="hidden" value="">
                            </form>
                        </div>
                        <?php } ?>
                    </div>
                    
                    <!-- controls -->
                    <div class="los-container clear ctrl">
                        <div class="los-content">
                            <?php if($cl_tags['ProcessValue'] !== 'REJ') { ?>
                                    <input type="submit" name="btn_approve" value="Approve" id="BtnApprove" class="uk-button" form="<?=($this->session->role_id != 'tc' ? "los_form" : "los_tc_form");?>" />
                            <?php } else { ?>
                                    <input type="submit" name="btn_approve" value="Approve"   id="BtnApprove" class="uk-button" form="los_form" disabled />
                            <?php } ?>
                            
                            <input type="submit" name="btn_reject"  value="Reject"  id="BtnReject"  class="uk-button" form="<?=($this->session->role_id != 'tc' ? "los_form" : "los_tc_form");?>" />
                            <?php if(($this->session->role_id != 'qa') || ($cl_tags['DestProcess'] != 'KYC')) { ?>
                                <input type="submit" name="btn_revert"  value="Revert"  id="BtnRevert" class="uk-button" form="<?=($this->session->role_id != 'tc' ? "los_form" : "los_tc_form");?>" />
                                
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php $this->load->view("templates/footer"); ?>
        </div>
        <div id="loading"></div>
    </body>
</html>