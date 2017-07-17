<?php
$data['title'] = 'OnePuhunan Service Portal | Manage Client';
?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("templates/op-head", $data); ?>

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
<body id="losbody">
<div id="page">
    <div id="page-wrapper">
        <?php $this->load->view("templates/op-header"); ?>
        <?php $this->load->view("templates/subheader"); ?>
        <div class="header-bg">
            <div class="header-banner">
                <div class="uk-container op-container">
                    <h2>CONSOLIDATION OF RAW DATA</h2>
                </div>
            </div>
        </div>
        <section id="main-section">
            <div class="uk-container table-wrap op-container tc-container">

                <div class="op-title"><h1><i class="uk-icon-tags"></i> CONSOLIDATE DATA</h1></div>
                <div class="uk-container uk-width-5-10 uk-container-center">
                    <div class="uk-form-row tm-label">
                        <label class="uk-text-small">
                            Select BRANCH ID to show the CLIENT TO AUDIT. All Client will be show.<br>
                            Click the <b>AUDIT</b> to consolidate the data.
                        </label>
                    </div>
                    <div class="uk-form-row uk-margin-small-bottom">
                        <label class="uk-form-label uk-text-small uk-text-bold">Select Branch<span class="tm-required-label">*</span></label>
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
                </div>

                <div id="brnchContainer">

            </div>

                <div class="uk-form-row uk-text-center uk-margin-small-top uk-margin-small-bottom">
                    <a href="<?php echo site_url("aud_dashboard"); ?>" class="uk-button uk-button-small uk-width-2-10">Cancel</a>
                </div>

        </section>
        <?php $this->load->view("templates/footer"); ?>
    </div>
</div>
<div id="loading"></div>
</body>
</html>