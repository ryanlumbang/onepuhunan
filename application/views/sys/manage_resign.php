<?php
$data['title'] = 'OnePuhunan Service Portal | Manage Role ID';
?>
<?php $this->load->view("onepuhunan/header",$data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <?=form_open("", array("class" => "form-width-small"));?>
            <h1 class="text-center">MANAGE RESIGN</h1>
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


            <div class="form-group row">
                <div class="col-md-3">
                    <label>Employee ID:</label>
                </div>
                <div class="col-md-9">
                    <input id="default_emp_id" type="hidden" name="default_emp_id" value="<?php echo $emp_id ?>" />
                    <?php
                    $employee_id =  array(
                        "id" => "employee_id",
                        "name" => "employee_id",
                        "value" =>  $emp_id,
                        "class" => "form-control input-lg",
                        "readonly" => "true",
                        "style"=>"background-color: #faffbd; border: 1px solid #ddd"

                    );
                    echo form_input($employee_id);
                    ?>
                </div>
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
                        "value" =>  $full_name,
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
                    <label>Email:</label>
                </div>
                <div class="col-md-9">
                    <input id="default_emp_email" type="hidden" name="default_emp_email" value="<?php echo $email ?>" />
                    <?php
                    $employee_email =  array(
                        "id" => "employee_email",
                        "name" => "employee_email",
                        "value" =>  $email,
                        "readonly" => "true",
                        "style"=>"background-color: #faffbd; border: 1px solid #ddd",
                        "class" => "form-control input-lg",

                    );
                    echo form_input($employee_email);
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
                        "value" =>  $job_title,
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
                        <!--                                <option value="" disabled selected hidden></option>-->
                        <?php  foreach($ln_rolename as $row): ?>
                            <?php if($row['role_id'] == $role_id){ ?>
                                <option selected value="<?php echo $row['role_id'] ;?>" data-role_name="<?php echo $row['role_name'];?>"><?php echo $row['role_name'];?></option>

                            <?php } else { ?>
                                <option value="<?php echo $row['role_id'] ;?>" data-role_name="<?php echo $row['role_name'];?>"><?php echo $row['role_name'];?></option>
                            <?php } ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xs-6">
                    <button type="submit" class="input-lg form-control global-button-success">Update</button>
                </div>
                <div class="col-xs-6">
                    <a href="<?php echo site_url("sys/assign_role_id"); ?>" class="btn input-lg form-control global-button">Cancel</a>
                </div>
            </div>
            <?=form_close();?>

        </div>
    </div>
</div>
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>
