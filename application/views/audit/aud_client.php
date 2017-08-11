<?php
$data['title'] = 'OnePuhunan Service Portal | Manage Client';
?>
<?php $this->load->view("onepuhunan/header",$data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="form-width-small">
                <h1>DATA ENTRY</h1>
                <div class="form-group">
                    <label>
                        Select BRANCH ID to show the CLIENT TO AUDIT. All Client will be show.
                        Click the <b>AUDIT</b> to consolidate the data.
                    </label>
                </div>
                <div class="form-group">
                    <label>Select Branch<span class="tm-required-label">*</span></label>
                    <?php
                    $branchID = array(
                        "id" => "branchcode",
                        "name" => "branchcode",
                        "class" => "form-control input-lg branchcode",
                        "onchange" => "branch_list()"
                    );
                    foreach((array) $ln_branch as $row) {
                        $options[$row["BranchCode"]] = $row["BranchCode"];
                    }

                    echo form_dropdown("branchcode", $options, set_value("branchcode"), $branchID);
                    ?>
                </div>

                <div class="form-group">
                    <a href="<?php echo site_url("aud_dashboard"); ?>" class="btn input-lg form-control global-button">Cancel</a>
                </div>
            </div>

            <div id="brnchContainer">

            </div>

            <script>
                $(document).ready(function() {
                    $('#branchcode').change(function() {
                        $brnchID = $(this).val();

                        $.ajax({
                            url: "<?=base_url()?>/audit/client/"+ $brnchID,
                            data: {
                                //txtsearch:
                            },
                            type: "GET",
                            dataType: "html",
                            success: function (data) {

                                $('#brnchContainer').html(data);
                            },
                            error: function (xhr, status) {
                                $('#brnchContainer').html(data);
                            },
                            complete: function (xhr, status) {
                                //$('#showresults').slideDown('slow')
                            }
                        });
                    })
                })
            </script>
        </div>
    </div>
</div>
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>