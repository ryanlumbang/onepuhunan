<!-- repeat loan details  -->
<?php if($cl_repeat['AccountID'] != NULL) { ?>
    <h2 class="title_los"><i class="glyphicon glyphicon-tag"></i>  PREVIOUS ACCOUNT DETAILS</h2>
    <div class="form-group">
        <div class="row">
            <div class="col-md-3 text-bold">Account ID</div>
            <div class="col-md-3 "> <mark><?=$cl_repeat['AccountID']?></mark></div>
            <div class="col-md-3 text-bold">Attendance Ratio</div>
            <div class="col-md-3 ">   <mark><?php
                if($cl_repeat['MeetingCnt'] != 0 ) {
                    echo ($cl_repeat['AttendanceCnt'] / $cl_repeat['MeetingCnt']) * 100;
                } else {
                    echo 0;
                }

                    ?>%</mark></div>
        </div>
        <div class="row">
            <div class="col-md-3 text-bold">No. of Arrear Days</div>
            <div class="col-md-3"> <mark><?=$cl_repeat['NoOfArrearDays']?></mark></div>
            <div class="col-md-3 text-bold">Attendance Count</div>
            <div class="col-md-3 "> <mark><?=$cl_repeat['AttendanceCnt']?></mark></div>
        </div>
        <div class="row">
            <div class="col-md-3 text-bold">Delayed Payments</div>
            <div class="col-md-3"><mark><?=$cl_repeat['DelayedPymnt']?></mark></div>
            <div class="col-md-3 text-bold">Meetings</div>
            <div class="col-md-3 "><mark><?=$cl_repeat['MeetingCnt']?></mark></div>
        </div>
        <div class="row">
            <div class="col-md-3 text-bold">Past Due Amount</div>
            <div class="col-md-3"><mark><?=number_format($cl_repeat['PrinArrearAmount'], 2, '.', ',')?></mark></div>
            <div class="col-md-3 text-bold">Outstanding Principal</div>
            <div class="col-md-3 "><mark><?=number_format($cl_repeat['OutstandingPrincipal'], 2, '.', ',')?></mark></div>
        </div>
        <div class="row">
            <div class="col-md-3 text-bold">Maturity Date</div>
            <div class="col-md-3"><mark><?=$cl_repeat['MaturityDate']?></mark></div>
            <div class="col-md-3 text-bold">Closed Date</div>
            <div class="col-md-3 "><mark><?=$cl_repeat['ClosedDate']?></mark></div>
        </div>
    </div>
<?php } ?>