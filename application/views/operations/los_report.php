<?php
$data['title'] = 'OnePuhunan Service Portal | Sign Up';
?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("templates/head", $data); ?>
    <body>
        <?php $this->load->view("templates/header"); ?>
            <div class="page-wrap">
                <?php $this->load->view("templates/subheader"); ?>
                <script src="<?=base_url()?>js/los_report.js"></script>
                <div class="uk-container uk-width-5-10 uk-container-center">

                    <div class="uk-form" >
                        <legend class="uk-text-muted uk-margin-large-top"><b>LOAN ORIGINATION SYSTEM</b> EXTRACTION OF DATA</legend>
                        <div class="uk-form-row uk-margin-top-remove div">

                            <div class="uk-form-row tm-label">
                                <label class="uk-text-small">
                                    <p>Choose what TYPE OF REPORT want to generate.<br/>
                                        After chose what REPORT TYPE click <b>"GENERATE REPORT"</b>.
                                    </p>

                                </label>
                            </div>

                            <select class="type" id="form_report" name="form_report" onchange="toggleReport()">
                                <option value="" disabled selected hidden>Type of Report</option>
                                <option value="01">KYC Today</option>
                                <option value="02">KYC Pending</option>
                                <option value="03">QA Productivity</option>
                                <option value="04">ALAF Report</option>
                                <option value="05">TC Report</option>
                            </select>

                            <!--KYC TODAY-->


                            <form class="uk-form" id="form_kyc_today" name="form_kyc_today" method="post" action="<?php echo site_url("operations/report_kyc_today"); ?>">

                                <div style="text-align: center; margin-top: 20px; margin-bottom: -10px;">
                                    <label class="report_text">KYC Today</>
                                </div>

                                <div style="text-align: center; margin-top: 20px;">

                                        <input type="text" data-uk-datepicker="{format:'MMM DD, YYYY'}" id="kyc_today_date" readonly="readonly" placeholder="Select Date" onchange="datePicker_kyc_today()">

                                    <div style="text-align: center; margin-top: 20px;">
                                        <button type="submit" class="uk-button uk-button-primary uk-width-3-10" form="form_kyc_today" id="kyc_today">Generate Report</button>
                                    </div>

                                    <input type="text" class="input-text" name="hidden_date" id="kyc_today_input" placeholder="" value="">

                                </div>
                            </form>

                            <!--KYC PENDING-->

                            <form class="uk-form" id="form_kyc_pending" name="form_kyc_pending" method="post" action="<?php echo site_url("operations/report_kyc_pending"); ?>">

                                <div style="text-align: center; margin-top: 20px; margin-bottom: -10px;">
                                    <label class="report_text">KYC Pending</>
                                </div>

                                <div style="text-align: center; margin-top: 20px;">

                                    <input type="text" data-uk-datepicker="{format:'MMM DD, YYYY'}" id="kyc_pending_start_date" readonly="readonly" placeholder="Start Date" onchange="datePicker_kyc_pending()">
                                    <br/>
                                    <input type="text" class="uk-margin-small-top" data-uk-datepicker="{format:'MMM DD, YYYY'}" id="kyc_pending_end_date" readonly="readonly" placeholder="End Date" onchange="datePicker_kyc_pending_end()">

                                    <div style="text-align: center; margin-top: 20px;">
                                        <button type="submit" class="uk-button uk-button-primary uk-width-3-10" form="form_kyc_pending" id="kyc_pending">Generate Report</button>
                                    </div>

                                    <input type="text" class="input-text" name="start_date" id="kyc_pending_start_input" placeholder="" value="">
                                    <input type="text" class="input-text" name="end_date" id="kyc_pending_end_input" placeholder="" value="">


                                </div>
                            </form>

                            <!--QA PRODUCTIVITY-->


                            <form class="uk-form" id="form_qa_productivity" name="form_qa_productivity" method="post" action="<?php echo site_url("operations/report_qa_productivity"); ?>">

                                <div style="text-align: center; margin-top: 20px; margin-bottom: -10px;">
                                    <label class="report_text">QA Productivity Report</label>
                                </div>

                                <div style="text-align: center; margin-top: 20px;">

                                    <input type="text" data-uk-datepicker="{format:'YYYY-MM-DD'}" id="qa_productivity_date" readonly="readonly" placeholder="Select Date" onchange="datePicker_qa_productivity()">

                                    <div style="text-align: center; margin-top: 20px;">
                                        <button type="submit" class="uk-button uk-button-primary uk-width-3-10" form="form_qa_productivity" id="qa">Generate Report</button>
                                    </div>

                                    <input type="text" class="input-text" name="select_date_qa" id="qa_input" placeholder="" value="">

                                </div>
                            </form>

                            <!--ALAF REPORT-->


                            <form class="uk-form" id="form_alaf_report" name="form_alaf_report" method="post" action="<?php echo site_url("operations/report_alaf"); ?>">

                                <div style="text-align: center; margin-top: 20px; margin-bottom: -10px;">
                                    <label class="report_text">ALAF Report</>
                                </div>

                                <div style="text-align: center; margin-top: 20px;">

                                    All data from ALAF REPORT will be EXTRACTED. <br/>
                                    Click <b>Generate Report</b> to generate EXCEL File.

                                    <div style="text-align: center; margin-top: 20px;">
                                        <button type="submit" class="uk-button uk-button-primary uk-width-3-10" form="form_alaf_report" id="alaf">Generate Report</button>
                                    </div>

                                </div>
                            </form>

                            <!--TC REPORT-->


                            <form class="uk-form" id="form_tc_report" name="form_tc_report" method="post" action="<?php echo site_url("operations/report_tc"); ?>">

                                <div style="text-align: center; margin-top: 20px; margin-bottom: -10px;">
                                    <label class="report_text">TeleCaller Report</>
                                </div>

                                <div style="text-align: center; margin-top: 20px;">

                                    <input type="text" data-uk-datepicker="{format:'YYYY-MM-DD'}" id="tc_report_date" readonly="readonly" placeholder="Select Date" onchange="datePicker_tc_report()">

                                    <div style="text-align: center; margin-top: 20px;">
                                        <button type="submit" class="uk-button uk-button-primary uk-width-3-10" form="form_tc_report" id="tc">Generate Report</button>
                                    </div>

                                    <input type="text" class="input-text" name="select_date_tc" id="tc_input" placeholder="" value="">

                                </div>
                            </form>

                            <div class="uk-form">
                                <a href="<?php echo site_url("dashboard"); ?>" class="uk-button uk-button-default uk-width-3-10 uk-margin-small-top">Cancel</a>
                            </div>

                        </div>
                    </div>

                    <div class="overlay">
                        <div class="modelBox">
                            <div class="modal-header">
                                <h2 class="header">LOADING DATA!</h2>
                            </div>

                            <div class="modal-header-done">
                                <h2 class="header">SUCCESS!</h2>
                            </div>

                            <div class="modal-body">
                                                    <span class ="modal-body-text">
                                                        <div class="extraction-success">
                                                            <div class="loading">
                                                                <img src="<?=base_url()?>img/system_png/loader.gif" class="loader"/>
                                                                <p class="dot text-loading">Please Wait <span>.</span><span>.</span><span>.</span></p>
                                                            </div>
                                                        </div>

                                                         <div class="extraction-done">
                                                                <div class="loading">
                                                                    <img src="<?=base_url()?>img/system_png/done.gif" class="icon-done"/>
                                                                </div>
                                                         </div>

                                                    </span>
                            </div>
                            <div class="modal-footer">
                                <button class="uk-button uk-button-success footer close">
                                    <a href="<?php echo site_url("operations/los_report"); ?>" style="text-decoration: none; color: white;">OK</a>
                                </button>
                            </div>
                        </div>
                    </div>

                    <style>
                        .extraction-success, .extraction-done{
                            text-align: center;
                        }

                        .loader{
                            width: 15%;
                            padding-top: 5%;
                        }

                        .icon-done{
                            width: 25%;
                            padding-top: 1%;
                            padding-bottom: 11%;
                        }

                        .text-loading{
                            font-size: 20px;
                            padding-top: 5px;
                        }

                        .text-done{
                            font-size: 20px;
                            padding-top: 5px;
                        }

                        @keyframes blink {
                            0% {
                                opacity: .2;
                            }
                            20% {
                                opacity: 1;
                            }
                            100% {
                                opacity: .2;
                            }
                        }

                        .dot span {
                            animation-name: blink;
                            animation-duration: 1.4s;
                            animation-iteration-count: infinite;
                            animation-fill-mode: both;
                        }

                        .dot span:nth-child(2) {
                            animation-delay: .2s;
                        }

                        .dot span:nth-child(3) {
                            animation-delay: .4s;
                        }
                    </style>

                    <script>
                        $(document).ready(function() {
                            $(".extraction-done").hide();
                            $(".modal-footer").hide();
                            $(".modal-header-done").hide();


                            $("#kyc_today").click(function() {
                                $(".overlay").show();
                                $("body").css("overflow", "hidden");

                                setTimeout(function() {
                                    $(".extraction-success").hide();
                                    $(".modal-header").hide();
                                    $(".extraction-done").show();
                                    $(".modal-footer").show();
                                    $(".modal-header-done").show();
                                }, 60000);
                            });

                            $("#kyc_pending").click(function() {
                                $(".overlay").show();
                                $("body").css("overflow", "hidden");

                                setTimeout(function() {
                                    $(".extraction-success").hide();
                                    $(".modal-header").hide();
                                    $(".extraction-done").show();
                                    $(".modal-footer").show();
                                    $(".modal-header-done").show();
                                }, 60000);
                            });

                            $("#qa").click(function() {
                                $(".overlay").show();
                                $("body").css("overflow", "hidden");

                                setTimeout(function() {
                                    $(".extraction-success").hide();
                                    $(".modal-header").hide();
                                    $(".extraction-done").show();
                                    $(".modal-footer").show();
                                    $(".modal-header-done").show();
                                }, 1000);
                            });

                            $("#alaf").click(function() {
                                $(".overlay").show();
                                $("body").css("overflow", "hidden");

                                setTimeout(function() {
                                    $(".extraction-success").hide();
                                    $(".modal-header").hide();
                                    $(".extraction-done").show();
                                    $(".modal-footer").show();
                                    $(".modal-header-done").show();
                                }, 60000);
                            });

                            $("#tc").click(function() {
                                $(".overlay").show();
                                $("body").css("overflow", "hidden");

                                setTimeout(function() {
                                    $(".extraction-success").hide();
                                    $(".modal-header").hide();
                                    $(".extraction-done").show();
                                    $(".modal-footer").show();
                                    $(".modal-header-done").show();
                                }, 500);
                            });
                        });
                    </script>


                    <hr class='uk-article-divider' style="margin-top: 15px; margin-bottom: 15px;">
                </div>

            </div>
        <?php $this->load->view("templates/footer"); ?>
    </body>
</html>