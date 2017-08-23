<?php
$data['title'] = 'OnePuhunan Service Portal | LOS Report';
?>
<?php $this->load->view("onepuhunan/header", $data); ?>
<div class="main">
    <div class="main-inner">
        <div id="tm-container" class="container">
                <!--BMV PENDING-->
                <form class="form-width-small" id="form_bmv_pending_qa" name="form_bmv_pending_qa" method="post" action="<?php echo site_url("operations/report_bmv_pending_qa"); ?>" target="_blank">
                    <h1 class="text-center">EXTRACTION OF REPORT</h1>

                    <div class="form-group text-center">
                        <h3>BMV PENDING REPORT</h3>
                        <p>Select Branch and Loan Type To Generate BMV Pending, After Selecting<br/>
                            Click <b>Generate Report</b> to generate EXCEL File.</p>
                    </div>
                    <div class="form-group">
                        <label>Branch Code<span class="tm-required-label">*</span></label>
                        <?php
                        $branchID = array(
                            "id" => "branchcode",
                            "name" => "branchcode",
                            "class" => "form-control  branchcode",
                            "onchange" => "branch_list()"
                        );
                        foreach((array) $ln_branch as $row) {
                            $options[$row["BranchCode"]] = $row["BranchCode"];
                        }

                        echo form_dropdown("branchcode", $options, set_value("branchcode"), $branchID);
                        ?>
                        <input type="hidden" name="branch_code" id="branch_code" placeholder="">

                    </div>
                    <div class="form-group">
                        <label>Loan Type<span class="tm-required-label">*</span></label>
                        <select class="form-control " id="loan_type" name="loan_type">
                            <option value="" disabled selected hidden>Loan Type</option>
                            <option value="N">New Loan</option>
                            <option value="R">Repeat Loan</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-6">
                            <button type="submit" class="btn form-control  global-button-success" form="form_bmv_pending_qa" id="bmv_pending_qa">Extract Report</button>
                        </div>
                        <div class="col-xs-6">
                            <a href="<?php echo site_url("dashboard"); ?>" class="btn form-control  global-button">Cancel</a>
                        </div>
                    </div>
                </form>
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
        </div>
    </div>
</div>
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>
<script src="<?=base_url()?>js/los_report.js"></script>


















