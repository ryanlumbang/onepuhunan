<!-- repeat loan details  -->
<?php if($cl_repeat['AccountID'] != NULL) { ?>
    <h2 class="title"><i class="glyphicon glyphicon-tag"></i>  PREVIOUS ACCOUNT DETAILS</h2>
    <div class="form-group">
        <div class="row">
            <div class="col-md-4 text-bold">Account ID</div>
            <div class="col-md-8">
                <span><?=$cl_repeat['AccountID']?></span>
                <span class="font-weight-bold">Attendance Ratio</span>
                <span>
                                    <?php
                                    if($cl_repeat['MeetingCnt'] != 0 ) {
                                        echo ($cl_repeat['AttendanceCnt'] / $cl_repeat['MeetingCnt']) * 100;
                                    } else {
                                        echo 0;
                                    }

                                    ?>%
                                    </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-bold">No. of Arrear Days</div>
            <div class="col-md-8">
                <span><?=$cl_repeat['NoOfArrearDays']?></span>
                <span class="font-weight-bold">Attendance Count</span>
                <span><?=$cl_repeat['AttendanceCnt']?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-bold">Delayed Payments</div>
            <div class="col-md-8">
                <span><?=$cl_repeat['DelayedPymnt']?></span>
                <span class="font-weight-bold">Meetings</span>
                <span><?=$cl_repeat['MeetingCnt']?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-bold">Past Due Amount</div>
            <div class="col-md-8"><span>&#8369; <?=number_format($cl_repeat['PrinArrearAmount'], 2, '.', ',')?></span>
                <span class="font-weight-bold">Outstanding Principal</span>
                <span>&#8369; <?=number_format($cl_repeat['OutstandingPrincipal'], 2, '.', ',')?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-bold">Maturity Date</div>
            <div class="col-md-8">
                <span><?=$cl_repeat['MaturityDate']?></span>
                <span class="font-weight-bold">Closed Date</span>
                <span><?=$cl_repeat['ClosedDate']?></span>
            </div>
        </div>
    </div>
<?php } ?>