<?php
$data['title'] = 'OnePuhunan Service Portal | Audit Extraction of Raw Data';
?>

<?php $this->load->view("onepuhunan/header",$data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <form class="form-width-small"  method="post" action="<?php echo site_url("audit/csv"); ?>" target="_blank">
                <h2 class="text-center">EXTRACT OF RAW DATA</h2>
                <div class="form-group">
                    <label class="text-center">
                        Please complete the form below, all field name's followed by a <span class="tm-required-label">*</span> indicate that an input is required. <br>
                        Once completed, please select the <b>"EXTRACT"</b> button.
                    </label>
                </div>
                <?php if($this->session->flashdata('message')){?>
                    <div align="center" class="alert alert-success">
                        <?php echo $this->session->flashdata('message')?>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label>Branch Code<span class="tm-required-label">*</span></label>
                    <?php
                    $branchID = array(
                        "id" => "branchcode",
                        "name" => "branchcode",
                        "class" => "form-control input-medium branchcode",
                        "onchange" => "branch_list()"
                    );
                    foreach((array) $ln_branch as $row) {
                        $options[$row["BranchCode"]] = $row["BranchCode"];
                    }

                    echo form_dropdown("branchcode", $options, set_value("branchcode"), $branchID);
                    ?>
                </div>

                <div class="form-group">
                    <label>Type Loan<span class="tm-required-label">*</span></label>
                    <select class="form-control input-medium" id="loan" name="type_loan" onchange="typeLoan()">
                        <option value="" disabled selected hidden>Type of Loan </option>
                        <option value="0">Group Loan</option>
                        <option value="1">Individual Loan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Month<span class="tm-required-label">*</span></label>
                    <select class="form-control input-medium" id="months" name="month_name" onchange="myFunction()">
                        <option value="" disabled selected hidden>Month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Year<span class="tm-required-label">*</span></label>
                    <select id="year" class="form-control input-medium" name="year_name" onchange="myFunction()">
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


                <input type="text" name="type_loan" id="loan_text" placeholder="" value="" style="display: none;">
                <input type="text" name="hidden_date" id="text" placeholder="" style="display: none;">
                <input type="text" name="branch_code" id="branch_code" placeholder="" style="display: none;">
                <div class="form-group row">
                    <div class="col-xs-6">
                        <button type="submit" class="form-control global-button">Extract</button>
                    </div>
                    <div class="col-xs-6">
                        <a href="<?php echo site_url("aud_dashboard"); ?>" class="btn form-control global-button">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
        <script>
            $(document).ready(function () {
                var branch = document.getElementById("branchcode").value;

                document.getElementById("branch_code").value = branch;
            });

        </script>
        <script>
            function test() {
                $.ajax({
                    xhr: function()
                    {
                        var xhr = new window.XMLHttpRequest();
                        //Upload progress
                        xhr.upload.addEventListener("progress", function(evt){
                            if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total;
                                //Do something with upload progress
                                console.log(percentComplete);
                            }
                        }, false);
                        //Download progress
                        xhr.addEventListener("progress", function(evt){
                            if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total;
                                //Do something with download progress
                                console.log(percentComplete);
                            }
                        }, false);
                        return xhr;
                    },
                    type: 'POST',
                    url: "<?php echo site_url("audit/csv"); ?>",
                    data: $('form').serialize(),
                    success: function(data){
                        console.log(data)
                        //Do something success-ish
                    }
                });
            }
        </script>
    </div>
</div>
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>
<script src="<?=base_url()?>js/audit_extract.js"></script>
