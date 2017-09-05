<!-- repeat loan details  -->
<?php if($cl_repeat['AccountID'] != NULL) { ?>
    <h2 class="title_los"><i class="glyphicon glyphicon-tag"></i>  PREVIOUS ACCOUNT DETAILS</h2>
    <div class="form-group"><table class="table table-striped op-table E1">
            <thead>
            <tr>
                <th width="10%" class="text-center">Account ID</th>
                <th width="12%" class="text-center">Attendance Ratio</th>
                <th width="12%" class="text-center">No. of Arrear Days</th>
                <th width="12%" class="text-center">Attendance Count</th>
                <th width="12%" class="text-center">Delayed Payments</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="text-center"><?=$cl_repeat['AccountID']?></td>
                <td class="text-center">
                    <?php
                    if($cl_repeat['MeetingCnt'] != 0 ) {
                        $ans = ($cl_repeat['AttendanceCnt'] / $cl_repeat['MeetingCnt']) * 100;
                        echo round($ans,2);
                    } else {
                        echo 0;
                    }

                    ?>%
                </td>
                <td class="text-center"> <?=$cl_repeat['NoOfArrearDays']?></td>
                <td class="text-center"><?=$cl_repeat['AttendanceCnt']?></td>
                <td class="text-center"><?=$cl_repeat['DelayedPymnt']?></td>
            </tr>
            </tbody>
        </table>
        <table class="table table-striped op-table E1">
            <thead>
            <tr>
                <th width="10%" class="text-center">Meetings</th>
                <th width="12%" class="text-center">Past Due Amount</th>
                <th width="12%" class="text-center">Outstanding Principal</th>
                <th width="12%" class="text-center">Maturity Date</th>
                <th width="12%" class="text-center">Closed Date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="text-center"><?=$cl_repeat['MeetingCnt']?></td>
                <td class="text-center"><?=number_format($cl_repeat['PrinArrearAmount'], 2, '.', ',')?></td>
                <td class="text-center"><?=number_format($cl_repeat['OutstandingPrincipal'], 2, '.', ',')?></td>
                <td class="text-center"><?=$cl_repeat['MaturityDate']?></td>
                <td class="text-center"><?=$cl_repeat['ClosedDate']?></td>
            </tr>
            </tbody>
        </table>

    </div>
<?php } ?>