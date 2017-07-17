function toggleReport()
{

    var choice = document.getElementById("form_report").value;

    if (choice == "01"){
        $form_kyc_today = "block";
        $form_kyc_pending = "none";
        $form_kyc_remarks = "none";
        $form_kyc_revert = "none";
        $form_bmv_remarks = "none";
        $form_qa_productivity= "none"
        $form_alaf_report =  "none";
        $form_tc_report = "none";
        $buts = "none";
    }
    else if (choice == "02"){
        $form_kyc_today = "none";
        $form_kyc_pending = "block";
        $form_kyc_remarks = "none";
        $form_kyc_revert = "none";
        $form_bmv_remarks = "none";
        $form_qa_productivity= "none"
        $form_alaf_report =  "none";
        $form_tc_report = "none";
        $buts = "none";
    }
    else if (choice == "03"){
        $form_kyc_today = "none";
        $form_kyc_pending = "none";
        $form_kyc_remarks = "block";
        $form_kyc_revert = "none";
        $form_bmv_remarks = "none";
        $form_qa_productivity= "none"
        $form_alaf_report =  "none";
        $form_tc_report = "none";
        $buts = "none";
    }
    else if (choice == "04"){
        $form_kyc_today = "none";
        $form_kyc_pending = "none";
        $form_kyc_remarks = "none";
        $form_kyc_revert = "block";
        $form_bmv_remarks = "none";
        $form_qa_productivity= "none"
        $form_alaf_report =  "none";
        $form_tc_report = "none";
        $buts = "none";
    }
    else if (choice == "05"){
        $form_kyc_today = "none";
        $form_kyc_pending = "none";
        $form_kyc_remarks = "none";
        $form_kyc_revert = "none";
        $form_bmv_remarks = "block";
        $form_qa_productivity= "none"
        $form_alaf_report =  "none";
        $form_tc_report = "none";
        $buts = "none";
    }
    else if (choice == "06"){
        $form_kyc_today = "none";
        $form_kyc_pending = "none";
        $form_kyc_remarks = "none";
        $form_kyc_revert = "none";
        $form_bmv_remarks = "none";
        $form_qa_productivity= "block"
        $form_alaf_report =  "none";
        $form_tc_report = "none";
        $buts = "none";
    }
    else if (choice == "07"){
        $form_kyc_today = "none";
        $form_kyc_pending = "none";
        $form_kyc_remarks = "none";
        $form_kyc_revert = "none";
        $form_bmv_remarks = "none";
        $form_qa_productivity= "none"
        $form_alaf_report =  "block";
        $form_tc_report = "none";
        $buts = "none";
    }
    else if (choice == "08"){
        $form_kyc_today = "none";
        $form_kyc_pending = "none";
        $form_kyc_remarks = "none";
        $form_kyc_revert = "none";
        $form_bmv_remarks = "none";
        $form_qa_productivity= "none"
        $form_alaf_report =  "none";
        $form_tc_report = "block";
        $buts = "none";
    }

    else{
        $form_kyc_today = "none";
        $form_kyc_pending = "none";
        $form_kyc_remarks = "none";
        $form_kyc_revert = "none";
        $form_bmv_remarks = "none";
        $form_qa_productivity= "none"
        $form_alaf_report =  "none";
        $form_tc_report = "none";
        $buts = "block";
    }

    document.getElementById("form_kyc_today").style.display=$form_kyc_today;
    document.getElementById("form_kyc_pending").style.display=$form_kyc_pending;
    document.getElementById("form_kyc_remarks").style.display=$form_kyc_remarks;
    document.getElementById("form_kyc_revert").style.display=$form_kyc_revert;
    document.getElementById("form_bmv_remarks").style.display=$form_bmv_remarks;
    document.getElementById("form_qa_productivity").style.display=$form_qa_productivity;
    document.getElementById("form_alaf_report").style.display=$form_alaf_report;
    document.getElementById("form_tc_report").style.display=$form_tc_report;
    document.getElementById("buts").style.display=$buts;
}

// $(document).ready(function () {
//     document.getElementById("form_kyc_pending").style.display="none";
//     document.getElementById("form_kyc_today").style.display="none";
//     document.getElementById("form_qa_productivity").style.display="none";
//     document.getElementById("form_alaf_report").style.display="none";
//     document.getElementById("form_tc_report").style.display="none";
// });


//                        $("#kyc_pendi").rules('add', { greaterThan: "#StartDate" });

function datePicker_kyc_today()
{
    var kyc_pending = document.getElementById("kyc_today_date").value;

    document.getElementById("kyc_today_input").value = kyc_pending;
}

function datePicker_kyc_pending()
{
    var kyc_today = document.getElementById("kyc_pending_start_date").value;

    document.getElementById("kyc_pending_start_input").value = kyc_today;
}

function datePicker_kyc_pending_end()
{
    var kyc_today_end = document.getElementById("kyc_pending_end_date").value;

    document.getElementById("kyc_pending_end_input").value = kyc_today_end;
}

function datePicker_kyc_remarks()
{
    var kyc_remarks = document.getElementById("kyc_remarks_start_date").value;

    document.getElementById("kyc_remarks_start_input").value = kyc_remarks;
}

function datePicker_kyc_remarks_end()
{
    var kyc_remarks_end = document.getElementById("kyc_remarks_end_date").value;

    document.getElementById("kyc_remarks_end_input").value = kyc_remarks_end;
}

function datePicker_bmv_remarks()
{
    var bmv_remarks = document.getElementById("bmv_remarks_start_date").value;

    document.getElementById("bmv_remarks_start_input").value = bmv_remarks;
}

function datePicker_bmv_remarks_end()
{
    var bmv_remarks_end = document.getElementById("bmv_remarks_end_date").value;

    document.getElementById("bmv_remarks_end_input").value = bmv_remarks_end;
}

function datePicker_kyc_revert()
{
    var kyc_revert = document.getElementById("kyc_revert_start_date").value;

    document.getElementById("kyc_revert_start_input").value = kyc_revert;
}

function datePicker_kyc_revert_end()
{
    var kyc_revert_end = document.getElementById("kyc_revert_end_date").value;

    document.getElementById("kyc_revert_end_input").value = kyc_revert_end;
}

function datePicker_qa_productivity()
{
    var qa_prod = document.getElementById("qa_productivity_date").value;

    document.getElementById("qa_input").value = qa_prod;
}

function datePicker_tc_report()
{
    var tc_date = document.getElementById("tc_report_date").value;

    document.getElementById("tc_input").value = tc_date;
}