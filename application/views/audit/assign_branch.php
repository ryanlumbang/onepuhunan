<?php
$data['title'] = 'OnePuhunan Service Portal | Manage Branch Handle';
?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("templates/op-head", $data); ?>
<body id="losbody">
<div id="page">
    <div id="page-wrapper">
        <?php $this->load->view("templates/op-header"); ?>
        <?php $this->load->view("templates/subheader"); ?>
        <div class="header-bg">
            <div class="header-banner">
                <div class="uk-container op-container">
                    <h2>AUDIT SETTINGS</h2>
                </div>
            </div>
        </div>
        <section id="main-section">


            <div class="uk-container table-wrap op-container tc-container">  <!-- Modal HTML embedded directly into document -->
                <div class="uk-container uk-width-5-10 uk-container-center">
                <?=form_open("", array("class" => "uk-form uk-form-horizontal"));?>
                <legend class="uk-text-muted uk-text-bold tm-form-legend">BRANCH HANDLE</legend>
                <?php echo validation_errors(); ?>
                <?php

                $employee_id = $this->input->post("emp_id");
                $branch_ids = $this->input->post("branch_ids");

                if ( isset($sp_upd_assign_branch) ) {
                    switch( $sp_upd_assign_branch) {
                        case 1:
                            echo "<div class='uk-alert uk-alert-danger uk-text-small uk-text-justify' data-uk-alert>"
                                . "      <span>"
                                .           "<big class='uk-text-bold'>Authentication Failed</big><br>"
                                .           "Sorry, we couldn't assign Branch in that Employee"
                                . "      </span>"
                                . "   </div>";
                            break;
                        default:
                            echo "<div class='uk-alert uk-alert-success uk-text-small uk-text-justify' data-uk-alert>"
                                . "      <span>"
                                .           "<big class='uk-text-bold'>Branch Successfully Assign.!</big><br>"
                                .           "Employee ".$employee_id." has now handled branch of the following: "
                                .            $branch_ids
                                . "      </span>"
                                . "   </div>";
                            break;
                    }
                }
                ?>
                <br/>
                <div class="uk-form-row tm-label">
                    <label class="uk-text-small">
                        Please complete the form below, all field name's followed by a <span class="tm-required-label">*</span> indicate that an input is required. <br>
                        Once completed, please select the <b>"Update"</b> button.
                    </label>
                </div>
                <div class="uk-form-row">
                    <label class="uk-form-label uk-text-small uk-text-bold">Employee ID <span class="tm-required-label">*</span></label>
                    <div class="uk-form-controls">
                        <?php
                        $emp_id =  array(
                            "id" => "emp_id",
                            "name" => "emp_id",
                            "value" => set_value("emp_id"),
                            "class" => "uk-width-large uk-form-small",
                            "placeholder" => "Please enter employee id."
                        );
                        echo form_input($emp_id);
                        ?>
                    </div>
                </div>
                <div class="uk-form-row">
                    <label class="uk-form-label uk-text-small uk-text-bold">Branch ID's <span class="tm-required-label">*</span></label>
                    <div class="uk-form-controls">
                        <?php
                        $branch_ids = array(
                            "id" => "branch_ids",
                            "name" => "branch_ids",
                            "value" => set_value("branch_ids"),
                            "class" => "uk-width-large uk-form-small",
                            "placeholder" => "Please enter branch id's."
                        );
                        echo form_input($branch_ids);
                        ?>

                        <?php
                        $branchID = array(
                            "id" => "branchCode",
                            "class" => "branchcode"
                        );
                        foreach((array) $ln_branch as $row) {
                            $options[$row["BranchCode"]] = $row["BranchCode"];
                        }
                        echo form_dropdown("branchCode", $options, set_value("branchCode"), $branchID);
                        ?>


                    </div>
                </div>
                <div class="uk-form-row uk-text-center uk-margin-large-bottom">
                    <button type="submit" class="uk-button uk-button-primary uk-button-small uk-width-2-10">Update</button>
                    <a href="<?php echo site_url("dashboard"); ?>" class="uk-button uk-button-small uk-width-2-10">Cancel</a>
                </div>
                <?=form_close();?>
            </div>
            </div>
        </section>
        <?php $this->load->view("templates/footer"); ?>
    </div>
</div>
<div id="loading"></div>
</body>
</html>
