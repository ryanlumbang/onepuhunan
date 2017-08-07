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

                <!--BMV PENDING-->
                <form class="uk-form uk-form-horizontal" id="form_bmv_pending_qa" name="form_bmv_pending_qa" method="post" action="<?php echo site_url("operations/report_bmv_pending_qa"); ?>" target="_blank">
                    <div class="uk-form-row">
                        <div class="uk-width-large" style="text-align: center; padding-bottom: 2%">
                            <label style="font-size: 20px; font-weight: bold;">BMV PENDING REPORT</label>
                        </div>

                        <div  style="font-size: 13px; text-align: center;">
                           Select Branch and Loan Type To Generate BMV Pending, After Selecting<br/>
                            Click <b>Generate Report</b> to generate EXCEL File.
                        </div>

                        <div class="uk-form-row uk-margin-small-bottom" style="margin-top: 15px;">
                            <label class="uk-form-label uk-text-small uk-text-bold">Branch Code<span class="tm-required-label">*</span></label>
                            <div class="uk-form-controls">
                                <?php
                                $branchID = array(
                                    "id" => "branchcode",
                                    "name" => "branchcode",
                                    "class" => "uk-width-large uk-form-small branchcode",
                                    "onchange" => "branch_list()"
                                );
                                foreach((array) $ln_branch as $row) {
                                    $options[$row["BranchCode"]] = $row["BranchCode"];
                                }

                                echo form_dropdown("branchcode", $options, set_value("branchcode"), $branchID);
                                ?>
                            </div>
                        </div>

                        <input type="text" name="branch_code" id="branch_code" placeholder="" style="display: none;">

                        <div class="uk-form-row">
                            <label class="uk-form-label uk-text-small uk-text-bold">Loan Type<span class="tm-required-label">*</span></label>
                            <div class="uk-form-controls">
                                <select class="uk-width-large uk-form-small" id="loan_type" name="loan_type">
                                    <option value="" disabled selected hidden>Loan Type</option>
                                    <option value="N">New Loan</option>
                                    <option value="R">Repeat Loan</option>
                                </select>
                            </div>

                            <div class="uk-form-row uk-text-center uk-margin-large-bottom" style="margin-top: 15px;">
                                <button type="submit" class="uk-button uk-button-primary uk-button-small uk-width-2-10" form="form_bmv_pending_qa" id="bmv_pending_qa">Extract Report</button>
                                <a href="<?php echo site_url("dashboard"); ?>" class="uk-button uk-button-small uk-width-2-10">Cancel</a>
                            </div>
                         </div>
                    </div>
                </form>

            </div>

            <script>
                function branch_list()
                {
                    var branch = document.getElementById("branchcode").value;

                    document.getElementById("branch_code").value = branch;

                }

                $(document).ready(function () {
                    var branch = document.getElementById("branchcode").value;

                    document.getElementById("branch_code").value = branch;
                });

            </script>


        </section>
        <?php $this->load->view("templates/footer"); ?>
    </div>
</div>
<div id="loading"></div>
</body>
</html>




















