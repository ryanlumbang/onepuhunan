<?php
$data['title'] = 'OnePuhunan Service Portal | LOS Report';
?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("templates/op-head", $data); ?>
<body id="losbody">
<div id="page">
    <div id="page-wrapper">
        <?php $this->load->view("templates/op-header"); ?>
        <?php $this->load->view("templates/subheader"); ?>
        <!--    <link rel="stylesheet" href="--><?//=base_url()?><!--css/audit_extract.css">-->
        <script src="<?=base_url()?>js/los_report.js"></script>
        <link rel="stylesheet" href="<?=base_url()?>css/components/datepicker.css">
        <script src="<?=base_url()?>js/components/datepicker.js"></script>
        <div class="header-bg">
            <div class="header-banner">
                <div class="uk-container op-container">
                    <h2>LOAN ORIGINATION SYSTEM REPORT</h2>
                </div>
            </div>
        </div>
        <section id="main-section">


            <div id="tm-container" class="uk-container uk-width-5-10 uk-container-center">

                <div class="op-title"><h1><i class="uk-icon-tags"></i> EXTRACTION OF REPORT</h1></div>
                <br/>
                <div class="uk-form-row tm-label">
                    <label class="uk-text-small">
                        Choose what TYPE OF REPORT you want to generate.<br>
                        After you chose what REPORT TYPE click, <b>"EXTRACT REPORT"</b>.
                    </label>
                </div>

                <div class="uk-form-row uk-margin-small-bottom">
                    <div class="uk-form uk-form-horizontals">
                        <select class="uk-width-large uk-form-small" id="form_report" name="form_report" onchange="toggleReport()">
                            <option value="" disabled selected hidden>Type of Report</option>
                            <option value="01">KYC Today</option>
                            <option value="02">KYC Pending</option>
                            <option value="03">KYC Remarks</option>
                            <option value="04">KYC Revert Application</option>
                            <option value="05">BMV Remarks</option>
                            <option value="06">QA Productivity</option>
                            <option value="07">ALAF Report</option>
                            <option value="08">TC Report</option>
                        </select>
                    </div>
                </div>
                <div style="text-align: center;">
                    <hr style="box-sizing: content-box; height: 0; margin: auto; border: 0; border-top: 1px solid #ddd; margin-top: 3%; margin-bottom: 2%; " width="80%">
                 </div>

                <!--KYC TODAY-->
                <form class="uk-form uk-form-horizontal"  id="form_kyc_today" name="form_kyc_today" method="post" action="<?php echo site_url("operations/report_kyc_today"); ?>" target="_blank">
                    <div class="uk-form-row">
                        <div class="uk-width-large" style="text-align: center; padding-bottom: 2%">
                            <label style="font-size: 20px; font-weight: bold;">KYC TODAY</label>
                        </div>
                            <label class="uk-form-label uk-text-small uk-text-bold">Select Date<span class="tm-required-label">*</span></label>
                            <div class="uk-form-controls">
                                <input type="text" class="uk-width-large uk-form-small" data-uk-datepicker="{format:'YYYY-MM-DD'}" id="kyc_today_date" readonly="readonly" placeholder="Select Date" onchange="datePicker_kyc_today()">
                                <input type="text" style="display: none" name="hidden_date" id="kyc_today_input" placeholder="" value="">
                            </div>
                        <div class="uk-form-row uk-text-center uk-margin-large-bottom" style="margin-top: 15px;">
                            <button type="submit" class="uk-button uk-button-primary uk-button-small uk-width-2-10" form="form_kyc_today" id="kyc_today">Extract Report</button>
                            <a href="<?php echo site_url("dashboard"); ?>" class="uk-button uk-button-small uk-width-2-10">Cancel</a>
                        </div>
                    </div>
                </form>

                <!--KYC PENDING-->
                <form class="uk-form uk-form-horizontal"  id="form_kyc_pending" name="form_kyc_pending" method="post" action="<?php echo site_url("operations/report_kyc_pending"); ?>" target="_blank">
                    <div class="uk-form-row">
                        <div class="uk-width-large" style="text-align: center; padding-bottom: 2%">
                            <label style="font-size: 20px; font-weight: bold;">KYC PENDING</label>
                        </div>
                        <label class="uk-form-label uk-text-small uk-text-bold">Start Date<span class="tm-required-label">*</span></label>
                        <div class="uk-form-controls">
                            <input type="text" class="uk-width-large uk-form-small" data-uk-datepicker="{format:'YYYY-MM-DD'}" id="kyc_pending_start_date" readonly="readonly" placeholder="Start Date" onchange="datePicker_kyc_pending()">
                        </div>
                    </div>

                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small uk-text-bold">End Date<span class="tm-required-label">*</span></label>
                        <div class="uk-form-controls">
                            <input type="text" class="uk-width-large uk-form-small" data-uk-datepicker="{format:'YYYY-MM-DD'}" id="kyc_pending_end_date" readonly="readonly" placeholder="End Date" onchange="datePicker_kyc_pending_end()">

                            <input type="text" style="display: none"  name="start_date" id="kyc_pending_start_input" placeholder="" value="">
                            <input type="text" style="display: none" name="end_date" id="kyc_pending_end_input" placeholder="" value="">
                        </div>
                        <div class="uk-form-row uk-text-center uk-margin-large-bottom" style="margin-top: 15px;">
                            <button type="submit" class="uk-button uk-button-primary uk-button-small uk-width-2-10" form="form_kyc_pending" id="kyc_pending">Extract Report</button>
                            <a href="<?php echo site_url("dashboard"); ?>" class="uk-button uk-button-small uk-width-2-10">Cancel</a>
                        </div>
                    </div>
                </form>

                <!--KYC Remarks-->
                <form class="uk-form uk-form-horizontal"  id="form_kyc_remarks" name="form_kyc_remarks" method="post" action="<?php echo site_url("operations/report_kyc_remarks"); ?>" target="_blank">
                    <div class="uk-form-row">
                        <div class="uk-width-large" style="text-align: center; padding-bottom: 2%">
                            <label style="font-size: 20px; font-weight: bold;">KYC REMARKS</label>
                        </div>
                        <label class="uk-form-label uk-text-small uk-text-bold">Start Date<span class="tm-required-label">*</span></label>
                        <div class="uk-form-controls">
                            <input type="text" class="uk-width-large uk-form-small" data-uk-datepicker="{format:'YYYY-MM-DD'}" id="kyc_remarks_start_date" readonly="readonly" placeholder="Start Date" onchange="datePicker_kyc_remarks()">
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small uk-text-bold">End Date<span class="tm-required-label">*</span></label>
                        <div class="uk-form-controls">
                            <input type="text" class="uk-width-large uk-form-small" data-uk-datepicker="{format:'YYYY-MM-DD'}" id="kyc_remarks_end_date" readonly="readonly" placeholder="End Date" onchange="datePicker_kyc_remarks_end()">

                            <input type="text" style="display: none"  name="start_date_remarks" id="kyc_remarks_start_input" placeholder="" value="">
                            <input type="text" style="display: none"  name="end_date_remarks" id="kyc_remarks_end_input" placeholder="" value="">
                        </div>
                        <div class="uk-form-row uk-text-center uk-margin-large-bottom" style="margin-top: 15px;">
                            <button type="submit" class="uk-button uk-button-primary uk-button-small uk-width-2-10" form="form_kyc_remarks" id="kyc_remarks">Extract Report</button>
                            <a href="<?php echo site_url("dashboard"); ?>" class="uk-button uk-button-small uk-width-2-10">Cancel</a>
                        </div>
                    </div>
                </form>

                <!--KYC Revert-->
                <form class="uk-form uk-form-horizontal"  id="form_kyc_revert" name="form_kyc_revert" method="post" action="<?php echo site_url("operations/report_kyc_reverted"); ?>" target="_blank">
                    <div class="uk-form-row">
                        <div class="uk-width-large" style="text-align: center; padding-bottom: 2%">
                            <label style="font-size: 20px; font-weight: bold;">KYC REVERTED APPLICATION</label>
                        </div>
                        <label class="uk-form-label uk-text-small uk-text-bold">Start Date<span class="tm-required-label">*</span></label>
                        <div class="uk-form-controls">
                            <input type="text" class="uk-width-large uk-form-small" data-uk-datepicker="{format:'YYYY-MM-DD'}" id="kyc_revert_start_date" readonly="readonly" placeholder="Start Date" onchange="datePicker_kyc_revert()">
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small uk-text-bold">End Date<span class="tm-required-label">*</span></label>
                        <div class="uk-form-controls">
                            <input type="text" class="uk-width-large uk-form-small" data-uk-datepicker="{format:'YYYY-MM-DD'}" id="kyc_revert_end_date" readonly="readonly" placeholder="End Date" onchange="datePicker_kyc_revert_end()">

                            <input type="text" style="display: none"  name="start_date_rvrt" id="kyc_revert_start_input" placeholder="" value="">
                            <input type="text" style="display: none"  name="end_date_rvrt" id="kyc_revert_end_input" placeholder="" value="">
                        </div>
                        <div class="uk-form-row uk-text-center uk-margin-large-bottom" style="margin-top: 15px;">
                            <button type="submit" class="uk-button uk-button-primary uk-button-small uk-width-2-10" form="form_kyc_revert" id="kyc_revert">Extract Report</button>
                            <a href="<?php echo site_url("dashboard"); ?>" class="uk-button uk-button-small uk-width-2-10">Cancel</a>
                        </div>
                    </div>
                </form>

                <!--BMV Remarks-->
                <form class="uk-form uk-form-horizontal"  id="form_bmv_remarks" name="form_bmv_remarks" method="post" action="<?php echo site_url("operations/report_bmv_remarks"); ?>" target="_blank">
                    <div class="uk-form-row">
                        <div class="uk-width-large" style="text-align: center; padding-bottom: 2%">
                            <label style="font-size: 20px; font-weight: bold;">BMV REMARKS</label>
                        </div>
                        <label class="uk-form-label uk-text-small uk-text-bold">Start Date<span class="tm-required-label">*</span></label>
                        <div class="uk-form-controls">
                            <input type="text" class="uk-width-large uk-form-small" data-uk-datepicker="{format:'YYYY-MM-DD'}" id="bmv_remarks_start_date" readonly="readonly" placeholder="Start Date" onchange="datePicker_bmv_remarks()">
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small uk-text-bold">End Date<span class="tm-required-label">*</span></label>
                        <div class="uk-form-controls">
                            <input type="text" class="uk-width-large uk-form-small" data-uk-datepicker="{format:'YYYY-MM-DD'}" id="bmv_remarks_end_date" readonly="readonly" placeholder="End Date" onchange="datePicker_bmv_remarks_end()">

                            <input type="text" style="display: none"  name="start_date_bmv_remarks" id="bmv_remarks_start_input" placeholder="" value="">
                            <input type="text" style="display: none"  name="end_date_bmv_remarks" id="bmv_remarks_end_input" placeholder="" value="">
                        </div>
                        <div class="uk-form-row uk-text-center uk-margin-large-bottom" style="margin-top: 15px;">
                            <button type="submit" class="uk-button uk-button-primary uk-button-small uk-width-2-10" form="form_bmv_remarks" id="bmv_remarks">Extract Report</button>
                            <a href="<?php echo site_url("dashboard"); ?>" class="uk-button uk-button-small uk-width-2-10">Cancel</a>
                        </div>
                    </div>
                </form>

                <!--QA PRODUCTIVITY-->
                <form class="uk-form uk-form-horizontal"  id="form_qa_productivity" name="form_qa_productivity" method="post" action="<?php echo site_url("operations/report_qa_productivity"); ?>" target="_blank">
                    <div class="uk-form-row">
                        <div class="uk-width-large" style="text-align: center; padding-bottom: 2%">
                            <label style="font-size: 20px; font-weight: bold;">KYC PRODUCTIVITY</label>
                        </div>
                        <label class="uk-form-label uk-text-small uk-text-bold">Select Date<span class="tm-required-label">*</span></label>
                        <div class="uk-form-controls">
                            <input type="text" class="uk-width-large uk-form-small" data-uk-datepicker="{format:'YYYY-MM-DD'}" id="qa_productivity_date" readonly="readonly" placeholder="Select Date" onchange="datePicker_qa_productivity()">
                            <input type="text" style="display: none" name="select_date_qa" id="qa_input" placeholder="" value="">
                        </div>
                        <div class="uk-form-row uk-text-center uk-margin-large-bottom" style="margin-top: 15px;">
                            <button type="submit" class="uk-button uk-button-primary uk-button-small uk-width-2-10" form="form_qa_productivity" id="qa">Extract Report</button>
                            <a href="<?php echo site_url("dashboard"); ?>" class="uk-button uk-button-small uk-width-2-10">Cancel</a>
                        </div>
                    </div>
                </form>

                <!--ALAF REPORT-->
                <form class="uk-form uk-form-horizontal" id="form_alaf_report" name="form_alaf_report" method="post" action="<?php echo site_url("operations/report_alaf"); ?>" target="_blank">
                    <div class="uk-form-row">
                        <div class="uk-width-large" style="text-align: center; padding-bottom: 2%">
                            <label style="font-size: 20px; font-weight: bold;">ALAF REPORT</label>
                        </div>
                        <div  style="font-size: 13px; text-align: center;">
                            All data from ALAF REPORT will be EXTRACTED. <br/>
                            Click <b>Generate Report</b> to generate EXCEL File.
                        </div>
                        <div class="uk-form-row uk-text-center uk-margin-large-bottom" style="margin-top: 15px;">
                            <button type="submit" class="uk-button uk-button-primary uk-button-small uk-width-2-10" form="form_alaf_report" id="alaf">Extract Report</button>
                            <a href="<?php echo site_url("dashboard"); ?>" class="uk-button uk-button-small uk-width-2-10">Cancel</a>
                        </div>
                    </div>
                </form>


                <!--TC REPORT-->
                <form class="uk-form uk-form-horizontal"  id="form_tc_report" name="form_tc_report" method="post" action="<?php echo site_url("operations/report_tc"); ?>" target="_blank">
                    <div class="uk-form-row">
                        <div class="uk-width-large" style="text-align: center; padding-bottom: 2%">
                            <label style="font-size: 20px; font-weight: bold;">TELECALLER REPORT</label>
                        </div>
                        <label class="uk-form-label uk-text-small uk-text-bold">Select Date<span class="tm-required-label">*</span></label>
                        <div class="uk-form-controls">
                            <input type="text" class="uk-width-large uk-form-small"data-uk-datepicker="{format:'YYYY-MM-DD'}" id="tc_report_date" readonly="readonly" placeholder="Select Date" onchange="datePicker_tc_report()">
                            <input type="text" style="display: none" name="select_date_tc" id="tc_input" placeholder="" value="">
                        </div>
                        <div class="uk-form-row uk-text-center uk-margin-large-bottom" style="margin-top: 15px;">
                            <button type="submit" class="uk-button uk-button-primary uk-button-small uk-width-2-10" form="form_tc_report" id="tc">Extract Report</button>
                            <a href="<?php echo site_url("dashboard"); ?>" class="uk-button uk-button-small uk-width-2-10">Cancel</a>
                        </div>
                    </div>
                </form>

                <div style="text-align: center;">
                    <a href="<?php echo site_url("dashboard"); ?>" class="uk-button uk-button-small uk-width-2-10" id="buts">Cancel</a>
                </div>
            </div>

            <style>
                #form_kyc_today, #form_kyc_pending, #form_qa_productivity, #form_alaf_report, #form_tc_report, #form_kyc_remarks,  #form_kyc_revert, #form_bmv_remarks{
                    display: none;
                }
            </style>

        </section>
        <?php $this->load->view("templates/footer"); ?>
    </div>
</div>
<div id="loading"></div>
</body>
</html>




















