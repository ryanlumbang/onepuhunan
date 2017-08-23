<?php
    $data['title'] = 'OnePuhunan Service Portal | Client Information';
?>
<?php $this->load->view("onepuhunan/header",$data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="form-width-small">
                <div class="row">
                    <div class="col-md-4">
                        <img class="img-rounded align-middle" src="<?=base_url()?>img/system_png/placeholder_200x200.svg" height="120" width="120">
                    </div>
                    <div class="col-md-8">
                        <h4><?=$result["Name"]?></h4>
                        <hr>
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <td class="font-weight-bold">Branch</td>
                                <td class="text-uppercase"><?="(" .$result["OurBranchID"] . ") " . $result["BranchName"]?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Client ID</td>
                                <td><?=$result["ClientID"]?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Client Since</td>
                                <td><?=date("F d, Y", strtotime($result["ClientSince"]))?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    <h2 class="title"><i class="glyphicon glyphicon-tag"></i>  PERSONAL INFORMATION</h2>
                    <hr>
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td class="font-weight-bold">Date of Birth</td>
                            <td class=""><?=date("F m, Y", strtotime($result["DateOfBirth"]))?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Mobile No.</td>
                            <td><?=$result["Mobile"]?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Address 1</td>
                            <td><?=$result["Address1"]?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Address 2</td>
                            <td><?=$result["Address2"]?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">City</td>
                            <td><?=$result["City"]?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <h2 class="title"><i class="glyphicon glyphicon-tag"></i>  BUSINESS INFORMATION</h2>
                    <hr>
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td class="font-weight-bold">No. of Loan Availed</td>
                            <td class="font-weight-bold"><?=$result["NoOfLoanAvailed"]?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Business Name</td>
                            <td><?=$result["BusName"]?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Business Address</td>
                            <td><?=$result["BusinessAdd"]?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Years in Business</td>
                            <td><?=$result["YearsInBus"]?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Business Size</td>
                            <td><?=$result["BuSizeDesc"]?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Business Type</td>
                            <td><?=$result["BTypeDesc"]?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <h2 class="title"><i class="glyphicon glyphicon-tag"></i>  ACCOUNT HISTORY</h2>
                    <hr>
                    <ul class="nav nav-tabs">
                        <?php
                        foreach((array) $acct_history as $key => $item) {
                            $active = '';
                            ($key == 0 ? $active='active' : $active='');

                            if($item["LoanAvailmentSeries"] == isset($result["NoOfLoanAvailed"])) {
                                $result = "<li data-toggle='tab' href='menu-".$key."' class='".$active."'><a href=\"#\">". $item["LoanAvailmentSeries"] . "</a></li>";
                            } else {
                                $result = "<li data-toggle='tab' href='menu-".$key."' class='".$active."'><a href=\"#\">". $item["LoanAvailmentSeries"] . "</a></li>";
                            }
                            echo $result;
                        }
                        ?>
                    </ul>
                    <div id="tab-content" class="tab-content">
                        <?php
                        foreach((array) $acct_history as $key => $item) {
                            $active = '';
                            ($key == 0 ? $active='in active' : $active=''); ?>
                            <div id='menu-<?= $key ?>' class='tab-pane fade <?= $active ?>'>
                            <?php $table = "<table class=\"table table-striped\">"
                                . "<tbody>"
                                . "<tr>"
                                . "<td class=\"font-weight-bold\">Account ID</td>"
                                . "<td class=\"\">" . $item["AccountID"] . "</td>"
                                . "</tr>"
                                . "<tr>"
                                . "<td class=\"font-weight-bold\">Product Code</td>"
                                . "<td>" . $item["ProductName"] . "</td>"
                                . "</tr>"
                                . "<tr>"
                                . "<td class=\"font-weight-bold\">Disbursed Amount</td>"
                                . "<td>" . str_replace('$', '', $item["DisbursedAmount"])  . "</td>"
                                . "</tr>"
                                . "<tr>"
                                . "<td class=\"font-weight-bold\">Loan Purpose</td>"
                                . "<td>" . $item["LoanPurpose"] . "</td>"
                                . "</tr>"
                                . "<tr>"
                                . "<td class=\"font-weight-bold\">First Disbursement Date</td>"
                                . "<td>" . ($item["FirstDisbursementDate"] == "" ? "" : date("F d, Y", strtotime($item["FirstDisbursementDate"]))) . "</td>"
                                . "</tr>"
                                . "<tr>"
                                . "<td class=\"font-weight-bold\">Last Schedule Installment Date</td>"
                                . "<td>" . ($item["LastSchedInstDate"] == "" ? "" : date("F d, Y", strtotime($item["LastSchedInstDate"]))) . "</td>"
                                . "</tr>"
                                . "<tr>"
                                . "<td class=\"font-weight-bold\">Closed Date</td>"
                                . "<td>" . ($item["ClosedDate"] == "" ? "" : date("F d, Y", strtotime($item["ClosedDate"]))) . "</td>"
                                . "</tr>"
                                . "<tr>"
                                . "<td class=\"font-weight-bold\">Loan Term Days</td>"
                                . "<td>" . $item["LoanTermDays"] . " Days</td>"
                                . "</tr>"
                                . "<tr>"
                                . "<td class=\"font-weight-bold\">Relationship Officer</td>"
                                . "<td>" . ($item["ROCode"] == "" ? "" : "(" . $item["ROCode"] . ") " . $item["ROName"] ) . "</td>"
                                . "</tr>"
                                . "<tr>"
                                . "<td class=\"font-weight-bold\">Sales Officer</td>"
                                . "<td>" . ($item["SOCode"] == "" ? "" : "(" . $item["SOCode"] . ") " . $item["SOName"] ) . "</td>"
                                . "</tr>"
                                . "<tr>"
                                . "<td class=\"font-weight-bold\">Group</td>"
                                . "<td>" . ($item["GroupID"] == "" ? "" : "(" . $item["GroupID"] . ") " . $item["GroupName"] ) . "</td>"
                                . "</tr>"
                                . "<tr>"
                                . "<td class=\"font-weight-bold\">Nominee Name</td>"
                                . "<td>" . $item["NomineeName"] . "</td>"
                                . "</tr>"
                                . "<tr>"
                                . "<td class=\"font-weight-bold\">Relationship</td>"
                                . "<td>" . $item["Relationship"] . "</td>"
                                . "</tr>"
                                . "<tr>"
                                . "<td class=\"font-weight-bold\">No. of Arrear Days</td>"
                                . "<td>" . $item["NoOfArrearDays"] . "</td>"
                                . "</tr>"
                                . "<tr>"
                                . "<td class=\"font-weight-bold\">Attendance Counts</td>"
                                . "<td>" . $item["AttendanceCnt"] . "</td>"
                                . "</tr>"
                                . "<tr>"
                                . "<td class=\"font-weight-bold\">Meeting Counts</td>"
                                . "<td>" . $item["MeetingCnt"] . "</td>"
                                . "</tr>"
                                . "<tr>"
                                . "<td class=\"font-weight-bold\">Delayed Payments</td>"
                                . "<td>" . $item["DelayedPymnt"] . "</td>"
                                . "</tr>"
                                . "<tr>"
                                . "<td class=\"font-weight-bold\">Past Due Amount</td>"
                                . "<td>" . str_replace('$', '', $item["PrinArrearAmount"]) . "</td>"
                                . "</tr>"
                                . "<tr>"
                                . "<td class=\"font-weight-bold\">Outstanding Amount</td>"
                                . "<td>" . str_replace('$', '', $item["OutstandingPrincipal"]) . "</td>"
                                . "</tr>"
                                . "</tbody>"
                                . "</table>";
                            echo $table;
                        }
                        ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>