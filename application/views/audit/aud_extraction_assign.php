<?php
$data['title'] = 'OnePuhunan Service Portal | Audit Extraction of Raw Data';
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
        <script src="<?=base_url()?>js/audit_extract.js"></script>
        <div class="header-bg">
            <div class="header-banner">
                <div class="uk-container op-container">
                    <h2>AUDIT EXTRACTION</h2>
                </div>
            </div>
        </div>
        <section id="main-section">


            <div id="tm-container" class="uk-container uk-width-5-10 uk-container-center">

                <form class="uk-form uk-form-horizontal"  method="post" action="<?php echo site_url("audit/csv"); ?>" target="_blank">
                    <div class="op-title"><h1><i class="uk-icon-tags"></i> EXTRACT OF RAW DATA</h1></div>
                    <br/>
                    <div class="uk-form-row tm-label">
                        <label class="uk-text-small">
                            Please complete the form below, all field name's followed by a <span class="tm-required-label">*</span> indicate that an input is required. <br>
                            Once completed, please select the <b>"EXTRACT"</b> button.
                        </label>
                    </div>
                    <?php if($this->session->flashdata('message')){?>
                        <div align="center" class="alert alert-success">
                            <?php echo $this->session->flashdata('message')?>
                        </div>
                    <?php } ?>
                    <div class="uk-form-row">

                        <div class="uk-form-row uk-margin-small-bottom">
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

                        <div class="uk-form-row uk-margin-small-bottom">
                            <label class="uk-form-label uk-text-small uk-text-bold">Type Loan<span class="tm-required-label">*</span></label>
                            <div class="uk-form-controls">
                                <select class="uk-width-large uk-form-small" id="loan" name="type_loan" onchange="typeLoan()">
                                    <option value="" disabled selected hidden>Type of Loan </option>
                                    <option value="0">Group Loan</option>
                                    <option value="1">Individual Loan</option>
                                </select>
                            </div>
                        </div>

                        <div class="uk-form-row uk-margin-small-bottom">
                            <label class="uk-form-label uk-text-small uk-text-bold">Month<span class="tm-required-label">*</span></label>
                            <div class="uk-form-controls">
                                <select class="uk-width-large uk-form-small" id="months" name="month_name" onchange="myFunction()">
                                    <option value="" disabled selected hidden>Month</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option valgue="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                        </div>

                        <div class="uk-form-row uk-margin-small-bottom">
                            <label class="uk-form-label uk-text-small uk-text-bold">Year<span class="tm-required-label">*</span></label>
                            <div class="uk-form-controls">
                                <select id="year" class="uk-width-large uk-form-small" name="year_name" onchange="myFunction()">
                                    <option value="" disabled selected hidden>Year</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                </select>
                            </div>
                        </div>

                        <input type="text" name="type_loan" id="loan_text" placeholder="" value="" style="display: none;">
                        <input type="text" name="hidden_date" id="text" placeholder="" style="display: none;">
                        <input type="text" name="branch_code" id="branch_code" placeholder="" style="display: none;">

                        <script>
                            $(document).ready(function () {
                                var branch = document.getElementById("branchcode").value;

                                document.getElementById("branch_code").value = branch;
                            });

                        </script>

                        <div class="uk-form-row uk-text-center uk-margin-large-bottom" style="margin-top: 15px;">
                            <button type="submit" class="uk-button uk-button-primary uk-button-small uk-width-2-10">Extract</button>
                            <a href="<?php echo site_url("aud_dashboard"); ?>" class="uk-button uk-button-small uk-width-2-10">Cancel</a>
                        </div>
                </form>

            </div>

        </section>
        <?php $this->load->view("templates/footer"); ?>
    </div>
</div>
<div id="loading"></div>
</body>
</html>




















