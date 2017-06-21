function toggleReport()
{

    var choice = document.getElementById("form_report").value;

    if (choice == "01"){

        document.getElementById("form_kyc_pending").style.display="none";
        document.getElementById("form_kyc_today").style.display="block";
        document.getElementById("form_kyc_remarks").style.display="none";
        document.getElementById("form_qa_productivity").style.display="none";
        document.getElementById("form_alaf_report").style.display="none";
        document.getElementById("form_tc_report").style.display="none";

        document.getElementById("form_report").style.marginBottom="0px";
    }
    else if (choice == "02"){
        document.getElementById("form_kyc_pending").style.display="block";
        document.getElementById("form_kyc_today").style.display="none";
        document.getElementById("form_kyc_remarks").style.display="none";
        document.getElementById("form_qa_productivity").style.display="none";
        document.getElementById("form_alaf_report").style.display="none";
        document.getElementById("form_tc_report").style.display="none";

        document.getElementById("form_report").style.marginBottom="0px";
    }
    else if (choice == "03"){
        document.getElementById("form_kyc_pending").style.display="none";
        document.getElementById("form_kyc_today").style.display="none";
        document.getElementById("form_kyc_remarks").style.display="block";
        document.getElementById("form_qa_productivity").style.display="none";
        document.getElementById("form_alaf_report").style.display="none";
        document.getElementById("form_tc_report").style.display="none";

        document.getElementById("form_report").style.marginBottom="0px";
    }
    else if (choice == "04"){
        document.getElementById("form_kyc_pending").style.display="none";
        document.getElementById("form_kyc_today").style.display="none";
        document.getElementById("form_kyc_remarks").style.display="none";
        document.getElementById("form_qa_productivity").style.display="block";
        document.getElementById("form_alaf_report").style.display="none";
        document.getElementById("form_tc_report").style.display="none";

        document.getElementById("form_report").style.marginBottom="0px";
    }
    else if (choice == "05"){
        document.getElementById("form_kyc_pending").style.display="none";
        document.getElementById("form_kyc_today").style.display="none";
        document.getElementById("form_kyc_remarks").style.display="none";
        document.getElementById("form_qa_productivity").style.display="none";
        document.getElementById("form_alaf_report").style.display="block";
        document.getElementById("form_tc_report").style.display="none";

        document.getElementById("form_report").style.marginBottom="0px";
    }
    else if (choice == "06"){
        document.getElementById("form_kyc_pending").style.display="none";
        document.getElementById("form_kyc_today").style.display="none";
        document.getElementById("form_kyc_remarks").style.display="none";
        document.getElementById("form_qa_productivity").style.display="none";
        document.getElementById("form_alaf_report").style.display="none";
        document.getElementById("form_tc_report").style.display="block";

        document.getElementById("form_report").style.marginBottom="0px";
    }

    else{
        document.getElementById("form_kyc_pending").style.display="none";
        document.getElementById("form_kyc_today").style.display="none";
        document.getElementById("form_kyc_remarks").style.display="none";
        document.getElementById("form_qa_productivity").style.display="none";
        document.getElementById("form_alaf_report").style.display="none";
        document.getElementById("form_tc_report").style.display="none";
    }
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