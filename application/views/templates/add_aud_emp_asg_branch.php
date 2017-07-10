<?php
$data['title'] = 'OnePuhunan Service Portal | Add Employee Branch Handle';
?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("templates/op-head", $data); ?>
<body id="losbody">
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


        <div id="tm-container" class="uk-container uk-width-5-10 uk-container-center">

            <?=form_open("", array("class" => "uk-form uk-form-horizontal"));?>
            <div class="op-title"><h1><i class="uk-icon-tags"></i> ADD NEW EMPLOYEE ASSIGN</h1></div>
            <?php echo validation_errors(); ?>
            <?php
            if ( isset($sp_upd_assign_branch) ) {
                switch( $sp_upd_assign_branch) {
                    case 1:
                        echo "<div class='uk-alert uk-alert-danger uk-text-small uk-text-justify' data-uk-alert>"
                            . "      <span>"
                            .           "<big class='uk-text-bold'>Authentication Failed</big><br>"
                            .           "Sorry, we couldn't find an account with that Employee ID. "
                            . "      </span>"
                            . "   </div>";
                        break;
                    default:
                        redirect(base_url()."audit/assign_branch");
                        break;
                }
            }
            ?>
            <br/>
            <div class="uk-form-row tm-label">
                <label class="uk-text-small">
                    Please complete the form below, all field name's followed by a <span class="tm-required-label">*</span> indicate that an input is required. <br>
                    Once completed, please select the <b>"ADD"</b> button.
                </label>
            </div>

            <div class="uk-form-row">

            <div class="uk-form-row uk-margin-small-bottom">
                    <label class="uk-form-label uk-text-small uk-text-bold">Select Employee</label>
                    <div class="uk-form-controls">
                        <select name="empname" id="getEmpCode" class = "uk-width-large uk-form-small branchcode">
                            <option value="" disabled selected hidden></option>
                            <?php  foreach($ln_employee as $row): ?>
                                <option value="<?php echo $row['fullname'];?>" data-emp_id="<?php echo $row['emp_id'];?>"><?php echo $row['fullname'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
            </div>

                <script>
                    $('#getEmpCode').change(function () {
                        $('#employee_id').val($(this).find(':selected').data('emp_id'));
                    });
                </script>


            <div class="uk-form-row" style="margin-top: 15px;">
                <label class="uk-form-label uk-text-small uk-text-bold">Employee ID<span class="tm-required-label">*</span></label>
                <div class="uk-form-controls">
                    <?php
                    $employee_id =  array(
                        "id" => "employee_id",
                        "name" => "employee_id",
                        "class" => "uk-width-large uk-form-small",
                        "readonly" => "true",
                        "style"=>"background-color: #faffbd; border: 1px solid #ddd"

                    );
                    echo form_input($employee_id);
                    ?>
                </div>
            </div>

            <div class="uk-form-row uk-margin-small-bottom">
                <label class="uk-form-label uk-text-small uk-text-bold">Assign Branch<span class="tm-required-label">*</span></label>
                <div class="uk-form-controls">
                    <div style="position: relative;"><i class="uk-icon-times-circle" style="position: absolute; top: 0px; bottom: 0; right: 0; margin-right: 5px; margin-top: 6px;" id="clear"></i></div>
                    <?php
                    $role =  array(
                        "id" => "branch_id",
                        "name" => "branch_id",
                        "class" => "uk-width-large uk-form-small",
                        "readonly" => "true",
                        "style"=>"background-color: #faffbd; border: 1px solid #ddd"
                    );
                    echo form_input($role);
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
                            "onchange" => "myFunction()"
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
                                var y = document.getElementById("branch_id");
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
                                $('#branch_id').val('');
                                temp_array=[];
                            });
                        </script>

                    </div>
                </div>

                <div class="uk-form-row uk-text-center uk-margin-large-bottom">
                <button type="submit" class="uk-button uk-button-primary uk-button-small uk-width-2-10">Add</button>
                <a href="<?php echo site_url("audit/assign_branch"); ?>" class="uk-button uk-button-small uk-width-2-10">Cancel</a>
            </div>
            <?=form_close();?>

        </div>

    </section>

    <?php $this->load->view("templates/footer"); ?>
</div>
</body>
</html>