<?php
$data['title'] = 'OnePuhunan Service Portal | Manage Role ID';
?>
<?php $this->load->view("onepuhunan/header",$data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <?=form_open("", array("class" => "form-width-small"));?>
            <h1>UPDATE ROLE ID</h1>
            <?php echo validation_errors(); ?>
            <?php
            if ( isset($sp_upd_role_id) ) {
                switch( $sp_upd_role_id) {
                    case 1:
                        echo "<div class='alert alert-warning'>"
                            . "      <span>"
                            .           "<strong>Authentication Failed</strong><br>"
                            .           "Sorry, we couldn't find an account with that Employee ID. "
                            . "      </span>"
                            . "   </div>";
                        break;
                    default:
                        redirect(base_url()."sys/assign_role_id");
                        break;
                }
            }
            ?>
            <div class="form-group">
                <label>
                    Please complete the form below, all field name's followed by a <span class="tm-required-label">*</span> indicate that an input is required. <br>
                    Once completed, please select the <b>"Update"</b> button.
                </label>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <label>Employee Name:</label>
                </div>
                <div class="col-md-9">
                    <?php
                    $employee_name =  array(
                        "id" => "employee_name",
                        "name" => "employee_name",
                        "value" =>  $_GET["fullname"],
                        "class" => "form-control input-lg",
                        "readonly" => "true",
                        "style"=>"background-color: #faffbd; border: 1px solid #ddd"

                    );
                    echo form_input($employee_name);
                    ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <label>Employee ID:</label>
                </div>
                <div class="col-md-9">
                    <?php
                    $emp_id =  array(
                        "id" => "emp_id",
                        "name" => "emp_id",
                        "value" =>  $_GET["emp_id"],
                        "class" => "form-control input-lg",
                        "readonly" => "true",
                        "style"=>"background-color: #faffbd; border: 1px solid #ddd"

                    );
                    echo form_input($emp_id);
                    ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <label>Job Title:</label>
                </div>
                <div class="col-md-9">
                    <?php
                    $job_title =  array(
                        "id" => "job_title",
                        "name" => "job_title",
                        "value" =>  $_GET["job_title"],
                        "class" => "form-control input-lg",
                        "readonly" => "true",
                        "style"=>"background-color: #faffbd; border: 1px solid #ddd"

                    );
                    echo form_input($job_title);
                    ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <label>Select Role:</label>
                </div>
                <div class="col-md-9">
                    <select name="rolename" id="getRoleID" class = "form-control input-lg branchcode">
                        <option value="" disabled selected hidden></option>
                        <?php  foreach($ln_rolename as $row): ?>
                            <option value="<?php echo $row['role_name'];?> " data-emp_id="<?php echo $row['role_id'];?>"><?php echo $row['role_name'];?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <label>Role ID:</label>
                </div>
                <div class="col-md-9">
                    <?php
                    $role =  array(
                        "id" => "role",
                        "name" => "role",
                        "value" =>  $_GET["role"],
                        "readonly" => "true",
                        "class" => "form-control input-lg",
                        "style"=>"background-color: #faffbd; border: 1px solid #ddd"
                    );
                    echo form_input($role);
                    ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-6">
                    <button type="submit" class="input-lg form-control global-button">Update</button>
                </div>
                <div class="col-xs-6">
                    <a href="<?php echo site_url("sys/assign_role_id"); ?>" class="btn input-lg form-control global-button">Cancel</a>
                </div>
            </div>
            <?=form_close();?>

        </div>
    </div>
</div>
<script>
    $('#getRoleID').change(function () {
        $('#role').val($(this).find(':selected').data('emp_id'));
    });
</script>
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>