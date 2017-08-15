<?php
$data['title'] = 'OnePuhunan Service Portal | LOS Report';
?>

<?php $this->load->view("onepuhunan/header",$data); ?>
<div class="main">
    <div class="main-inner">


            <div class="container">

                <div class="form-width-small">
                    <h1 class="text-center">EXTRACTION OF REPORT</h1>
                    <div class="form-group">
                        <label class="text-center">
                            Choose what TYPE OF REPORT you want to generate.<br>
                            After you chose what REPORT TYPE click, <b>"EXTRACT REPORT"</b>.
                        </label>
                    </div>

                    <div class="form-group">
                        <select class="form-control input-lg" id="form_report" name="form_report" onchange="toggleReport()">
                            <option value="" disabled selected hidden>Type of Report</option>
                            <option value="01">KYC Today</option>
                            <option value="02">KYC Pending</option>
                            <option value="03">KYC Remarks</option>
                            <option value="04">KYC Revert Application</option>
                            <option value="05">BMV Remarks</option>
                            <option value="06">BMV Pending</option>
                            <option value="07">QA Productivity</option>
                            <option value="08">ALAF Report</option>
                            <option value="09">TC Report</option>
                            <option value="10">Sanction Report</option>
                        </select>
                    </div>
                    <div>
                        <a href="<?php echo site_url("dashboard"); ?>" class="btn input-lg form-control global-button" id="buts">Cancel</a>
                    </div>


                    <!--KYC TODAY-->
                    <form id="form_kyc_today" name="form_kyc_today" method="post" action="<?php echo site_url("operations/report_kyc_today"); ?>" target="_blank">
                        <div class="form-group">
                            <h3 class="text-center">KYC TODAY</h3 class="text-center">
                        </div>
                        <div class="form-group">
                            <label>Select Date<span class="tm-required-label">*</span></label>
                            <input type="text" class="form-control input-lg datepicker" id="kyc_today_date" readonly="readonly" placeholder="Select Date" onchange="datePicker_kyc_today()">
                            <input type="hidden" name="hidden_date" id="kyc_today_input" placeholder="" value="">
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <button type="submit" class="input-lg form-control global-button" form="form_kyc_today" id="kyc_today">Extract Report</button>
                            </div>
                            <div class="col-xs-6">
                                <a href="<?php echo site_url("dashboard"); ?>" class="btn input-lg form-control global-button">Cancel</a>
                            </div>
                        </div>
                    </form>

                    <!--KYC PENDING-->
                    <form id="form_kyc_pending" name="form_kyc_pending" method="post" action="<?php echo site_url("operations/report_kyc_pending"); ?>" target="_blank">
                        <div class="form-group">
                            <h3 class="text-center">KYC PENDING</h3 class="text-center">
                        </div>
                        <div class="form-group">
                            <label>Start Date<span class="tm-required-label">*</span></label>
                            <input type="text" class="datepicker form-control input-lg" id="kyc_pending_start_date" readonly="readonly" placeholder="Start Date" onchange="datePicker_kyc_pending()">

                        </div>

                        <div class="form-group">
                            <label>End Date<span class="tm-required-label">*</span></label>
                            <input type="text" class="datepicker form-control input-lg" id="kyc_pending_end_date" readonly="readonly" placeholder="End Date" onchange="datePicker_kyc_pending_end()">

                            <input type="hidden"  name="start_date" id="kyc_pending_start_input" placeholder="" value="">
                            <input type="hidden" name="end_date" id="kyc_pending_end_input" placeholder="" value="">
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <button type="submit" class="input-lg form-control global-button" form="form_kyc_pending" id="kyc_pending">Extract Report</button>
                            </div>
                            <div class="col-xs-6">
                                <a href="<?php echo site_url("dashboard"); ?>" class="btn input-lg form-control global-button">Cancel</a>
                            </div>
                        </div>
                    </form>

                    <!--KYC Remarks-->
                    <form id="form_kyc_remarks" name="form_kyc_remarks" method="post" action="<?php echo site_url("operations/report_kyc_remarks"); ?>" target="_blank">
                        <div class="form-group">
                            <h3 class="text-center">KYC REMARKS</h3 class="text-center">
                        </div>
                        <div class="form-group">
                            <label>Start Date<span class="tm-required-label">*</span></label>
                            <input type="text" class="datepicker form-control input-lg" id="kyc_remarks_start_date" readonly="readonly" placeholder="Start Date" onchange="datePicker_kyc_remarks()">
                        </div>
                        <div class="form-group">
                            <label>End Date<span class="tm-required-label">*</span></label>
                            <input type="text" class="datepicker form-control input-lg" id="kyc_remarks_end_date" readonly="readonly" placeholder="End Date" onchange="datePicker_kyc_remarks_end()">

                            <input type="hidden" name="start_date_remarks" id="kyc_remarks_start_input" placeholder="" value="">
                            <input type="hidden" name="end_date_remarks" id="kyc_remarks_end_input" placeholder="" value="">
                        </div>

                        <div class="form-group">
                            <label>Loan Type<span class="tm-required-label">*</span></label>
                            <select class="form-control input-lg" id="loan_type" name="loan_type">
                                <option value="" disabled selected hidden>Loan Type</option>
                                <option value="N">New Loan</option>
                                <option value="R">Repeat Loan</option>
                            </select>
                        </div>

                        <div class="form-group row">
                            <div class="col-xs-6">
                                <button type="submit" class="input-lg form-control global-button" form="form_kyc_remarks" id="kyc_remarks">Extract Report</button>
                            </div>
                            <div class="col-xs-6">
                                <a href="<?php echo site_url("dashboard"); ?>" class="btn input-lg form-control global-button">Cancel</a>
                            </div>
                        </div>
                    </form>

                    <!--KYC Revert-->
                    <form id="form_kyc_revert" name="form_kyc_revert" method="post" action="<?php echo site_url("operations/report_kyc_reverted"); ?>" target="_blank">
                        <div class="form-group">
                            <h3 class="text-center">KYC REVERTED APPLICATION</h3 class="text-center">
                        </div>
                        <div class="form-group">
                            <label>Start Date<span class="tm-required-label">*</span></label>
                            <input type="text" class="datepicker form-control input-lg" id="kyc_revert_start_date" readonly="readonly" placeholder="Start Date" onchange="datePicker_kyc_revert()">

                        </div>
                        <div class="form-group">
                            <label>End Date<span class="tm-required-label">*</span></label>
                            <input type="text" class="datepicker form-control input-lg" id="kyc_revert_end_date" readonly="readonly" placeholder="End Date" onchange="datePicker_kyc_revert_end()">

                            <input type="hidden" name="start_date_rvrt" id="kyc_revert_start_input" placeholder="" value="">
                            <input type="hidden" name="end_date_rvrt" id="kyc_revert_end_input" placeholder="" value="">
                        </div>

                        <div class="form-group row">
                            <div class="col-xs-6">
                                <button type="submit" class="input-lg form-control global-button" form="form_kyc_revert" id="kyc_revert">Extract Report</button>
                            </div>
                            <div class="col-xs-6">
                                <a href="<?php echo site_url("dashboard"); ?>" class="btn input-lg form-control global-button">Cancel</a>
                            </div>
                        </div>
                    </form>

                    <!--BMV Remarks-->
                    <form id="form_bmv_remarks" name="form_bmv_remarks" method="post" action="<?php echo site_url("operations/report_bmv_remarks"); ?>" target="_blank">
                        <div class="form-group">
                            <h3 class="text-center">BMV REMARKS</h3 class="text-center">
                        </div>
                        <div class="form-group">
                            <label>Start Date<span class="tm-required-label">*</span></label>
                            <input type="text" class="datepicker form-control input-lg" id="bmv_remarks_start_date" readonly="readonly" placeholder="Start Date" onchange="datePicker_bmv_remarks()">
                        </div>
                        <div class="form-group">
                            <label>End Date<span class="tm-required-label">*</span></label>
                            <input type="text" class="datepicker form-control input-lg" id="bmv_remarks_end_date" readonly="readonly" placeholder="End Date" onchange="datePicker_bmv_remarks_end()">

                            <input type="hidden" style="display: none"  name="start_date_bmv_remarks" id="bmv_remarks_start_input" placeholder="" value="">
                            <input type="hidden" style="display: none"  name="end_date_bmv_remarks" id="bmv_remarks_end_input" placeholder="" value="">
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <button type="submit" class="input-lg form-control global-button" form="form_bmv_remarks" id="bmv_remarks">Extract Report</button>
                            </div>
                            <div class="col-xs-6">
                                <a href="<?php echo site_url("dashboard"); ?>" class="btn input-lg form-control global-button">Cancel</a>
                            </div>
                        </div>
                    </form>

                    <!--BMV PENDING-->
                    <form id="form_bmv_pending" name="form_bmv_pending" method="post" action="<?php echo site_url("operations/report_bmv_pending"); ?>" target="_blank">
                        <div class="form-group">
                            <h3 class="text-center">BMV PENDING REPORT</h3 class="text-center">
                            <p class="text-center">
                                All data from BMV PENDING REPORT will be EXTRACTED. <br/>
                                Click <b>Generate Report</b> to generate EXCEL File.
                            </p>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <button type="submit" class="input-lg form-control global-button" form="form_bmv_pending" id="bmv_pending">Generate Report</button>
                            </div>
                            <div class="col-xs-6">
                                <a href="<?php echo site_url("dashboard"); ?>" class="btn input-lg form-control global-button">Cancel</a>
                            </div>
                        </div>
                    </form>

                    <!--QA PRODUCTIVITY-->
                    <form id="form_qa_productivity" name="form_qa_productivity" method="post" action="<?php echo site_url("operations/report_qa_productivity"); ?>" target="_blank">
                        <div class="form-group">
                            <h3 class="text-center">KYC PRODUCTIVITY</h3 class="text-center">
                        </div>
                        <div class="form-group">
                            <label>Select Date<span class="tm-required-label">*</span></label>
                            <input type="text" class="datepicker form-control input-lg" id="qa_productivity_date" readonly="readonly" placeholder="Select Date" onchange="datePicker_qa_productivity()">
                            <input type="hidden" name="select_date_qa" id="qa_input" placeholder="" value="">
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <button type="submit" class="input-lg form-control global-button" form="form_qa_productivity" id="qa">Extract Report</button>
                            </div>
                            <div class="col-xs-6">
                                <a href="<?php echo site_url("dashboard"); ?>" class="btn input-lg form-control global-button">Cancel</a>
                            </div>
                        </div>
                    </form>

                    <!--ALAF REPORT-->
                    <form id="form_alaf_report" name="form_alaf_report" method="post" action="<?php echo site_url("operations/report_alaf"); ?>" target="_blank">
                        <div class="form-group">
                            <h3 class="text-center">ALAF REPORT</h3 class="text-center">
                            <p class="text-center">
                                All data from ALAF REPORT will be EXTRACTED. <br/>
                                Click <b>Generate Report</b> to generate EXCEL File.
                            </p>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <button type="submit" class="input-lg form-control global-button" form="form_alaf_report" id="alaf">Extract Report</button>
                            </div>
                            <div class="col-xs-6">
                                <a href="<?php echo site_url("dashboard"); ?>" class="btn input-lg form-control global-button">Cancel</a>
                            </div>
                        </div>
                    </form>

                    <!--TC REPORT-->
                    <form id="form_tc_report" name="form_tc_report" method="post" action="<?php echo site_url("operations/report_tc"); ?>" target="_blank">
                        <div class="form-group">
                            <h3 class="text-center">TELECALLER REPORT</h3 class="text-center">
                        </div>
                        <div class="form-group">
                            <label>Select Date<span class="tm-required-label">*</span></label>
                            <input type="text" class="datepicker form-control input-lg" id="tc_report_date" readonly="readonly" placeholder="Select Date" onchange="datePicker_tc_report()">
                            <input type="hidden" name="select_date_tc" id="tc_input" placeholder="" value="">
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <button type="submit" class="input-lg form-control global-button" form="form_tc_report" id="tc">Extract Report</button>
                            </div>
                            <div class="col-xs-6">
                                <a href="<?php echo site_url("dashboard"); ?>" class="btn input-lg form-control global-button">Cancel</a>
                            </div>
                        </div>
                    </form>

                    <!--SANCTION REPORT-->
                    <form id="form_sanction_report" name="form_sanction_report" method="post" action="<?php echo site_url("operations/report_sanction"); ?>" target="_blank">
                        <div class="form-group">
                            <h3 class="text-center">SANCTION REPORT</h3 class="text-center">
                            <p class="text-center">
                                All data from SANCTION REPORT will be EXTRACTED. <br/>
                                Click <b>Generate Report</b> to generate EXCEL File.
                            </p>
                        </div>

                        <div class="form-group row">
                            <div class="col-xs-6">
                                <button type="submit" class="input-lg form-control global-button" form="form_sanction_report" id="sanction">Generate Report</button>
                            </div>
                            <div class="col-xs-6">
                                <a href="<?php echo site_url("dashboard"); ?>" class="btn input-lg form-control global-button">Cancel</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <style>
                #form_kyc_today, #form_kyc_pending, #form_qa_productivity, #form_alaf_report, #form_tc_report, #form_kyc_remarks,  #form_kyc_revert, #form_bmv_remarks, #form_bmv_pending, #form_sanction_report{
                    display: none;
                }
            </style>

    </div>
</div>

<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>
<script src="<?=base_url()?>js/los_report.js"></script>
