<?php
$data['title'] = 'OnePuhunan Service Portal | Manage TelleCaller Questions';
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
                    <h2>LOS SETTINGS</h2>
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
                if ( isset($sp_upd_emp_branch) ) {
                    switch( $sp_upd_emp_branch) {
                        case 1:
                            echo "<div class='uk-alert uk-alert-danger uk-text-small uk-text-justify' data-uk-alert>"
                                . "      <span>"
                                .           "<big class='uk-text-bold'>Authentication Failed</big><br>"
                                .           "Sorry, we couldn't find an account with that Employee ID. "
                                . "      </span>"
                                . "   </div>";
                            break;
                        default:
                            redirect(base_url()."operations/success_branch_assign");
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
                        <div style="position: relative;"><i class="uk-icon-times-circle" style="position: absolute; top: 0px; bottom: 0; right: 0; margin-right: 5px; margin-top: 6px;" id="clear"></i></div>
                        <?php
                        $branch_ids = array(
                            "id" => "branch_ids",
                            "name" => "branch_ids",
                            "value" => set_value("branch_ids"),
                            "class" => "uk-width-large uk-form-small",
                            "readonly" => "true",
                            "placeholder" => "Branch ID",
                            "style"=>"background-color: #faffbd; border: 1px solid #ddd"
                        );
                        echo form_input($branch_ids);
                        ?>
                    </div>
                </div>

                <div class="uk-form-row uk-margin-small-bottom">
                        <label class="uk-form-label uk-text-small uk-text-bold">Select Branch</label>
                        <div class="uk-form-controls">

                            <?php
                            $branchID = array(
                                "id" => "branchCode",
                                "class" => "uk-width-large uk-form-small branchcode",
                                "onchange" => "myFunction()",
                            );
                            foreach((array) $ln_branch as $row) {
                                $options[$row["BranchCode"]] = $row["BranchCode"];
                            }

                            echo form_dropdown("branchCode", $options, set_value("branchCode"), $branchID);
                            ?>

                            <script>
                                var temp_array = [];
                                var status = '';
                                function myFunction() {
                                    var x = document.getElementById("branchCode");
                                    var y = document.getElementById("branch_ids");
                                    var option = document.createElement("option");
                                    option.text = document.getElementById("branchCode").value;


                                    for(var i=0; i < temp_array.length; i++){
                                        var name = temp_array[i];

                                        if(name == option.text){
                                            status = 'Exist';
                                            break;
                                        }else{
                                            status = '';
                                        }
                                    }

                                    if(status == ''){
                                        if(temp_array.length == 0){
                                            y.value=option.text;
                                        }else{
                                            y.value=y.value + ', ' + option.text;
                                        }
                                    }

                                    temp_array.push(option.text);
                                }

                                $("#clear").click(function () {
                                    $('#branch_ids').val('');
                                    temp_array=[];
                                });
                            </script>

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
        <?php $this->load->view("templates/modal"); ?>
    </div>
</div>
<div id="loading"></div>
</body>
</html>
