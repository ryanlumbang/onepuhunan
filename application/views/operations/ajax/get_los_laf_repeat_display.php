<!-- repeat loan details  -->
<?php if($cl_repeat['AccountID'] != NULL) { ?>
    <h2 class="title_los"><i class="glyphicon glyphicon-tag"></i>  PREVIOUS ACCOUNT DETAILS</h2>
    <div class="form-group">
        <div class="row">
            <div class="col-md-3 text-bold">Account ID</div>
            <div class="col-md-3 "> <?=$cl_repeat['AccountID']?></div>
            <div class="col-md-3 text-bold">Attendance Ratio</div>
            <div class="col-md-3 ">   <?php
                if($cl_repeat['MeetingCnt'] != 0 ) {
                    echo ($cl_repeat['AttendanceCnt'] / $cl_repeat['MeetingCnt']) * 100;
                } else {
                    echo 0;
                }

                    ?>%</div>
        </div>
        <div class="row">
            <div class="col-md-3 text-bold">No. of Arrear Days</div>
            <div class="col-md-3"> <?=$cl_repeat['NoOfArrearDays']?></div>
            <div class="col-md-3 text-bold">Attendance Count</div>
            <div class="col-md-3 "> <?=$cl_repeat['AttendanceCnt']?></div>
        </div>
        <div class="row">
            <div class="col-md-3 text-bold">Delayed Payments</div>
            <div class="col-md-3"><?=$cl_repeat['DelayedPymnt']?></div>
            <div class="col-md-3 text-bold">Meetings</div>
            <div class="col-md-3 "><?=$cl_repeat['MeetingCnt']?></div>
        </div>
        <div class="row">
            <div class="col-md-3 text-bold">Past Due Amount</div>
            <div class="col-md-3"><?=number_format($cl_repeat['PrinArrearAmount'], 2, '.', ',')?></div>
            <div class="col-md-3 text-bold">Outstanding Principal</div>
            <div class="col-md-3 "><?=number_format($cl_repeat['OutstandingPrincipal'], 2, '.', ',')?></div>
        </div>
        <div class="row">
            <div class="col-md-3 text-bold">Maturity Date</div>
            <div class="col-md-3"><?=$cl_repeat['MaturityDate']?></div>
            <div class="col-md-3 text-bold">Closed Date</div>
            <div class="col-md-3 "><?=$cl_repeat['ClosedDate']?></div>
        </div>
    </div>
<?php } ?>