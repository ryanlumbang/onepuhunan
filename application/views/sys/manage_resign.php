<?php
$data['title'] = 'OnePuhunan Service Portal | Manage Role ID';
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
                    <h2>SYSTEM SETTINGS</h2>
                </div>
            </div>
        </div>
        <section id="main-section">


            <div id="tm-container" class="uk-container uk-width-5-10 uk-container-center">
                <?=form_open("", array("class" => "uk-form uk-form-horizontal"));?>
                <div class="op-title"><h1><i class="uk-icon-tags"></i> MANAGE RESIGN</h1></div>
                <?php echo validation_errors(); ?>
                <?php
                if ( isset($sp_upd_role_id) ) {
                    switch( $sp_upd_role_id) {
                        case 1:
                            echo "<div class='uk-alert uk-alert-danger uk-text-small uk-text-justify' data-uk-alert>"
                                . "      <span>"
                                .           "<big class='uk-text-bold'>Authentication Failed</big><br>"
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
                <br/>
<!--                <div class="uk-form-row tm-label">-->
<!--                    <label class="uk-text-small">-->
<!--                        Please complete the form below, all field name's followed by a <span class="tm-required-label">*</span> indicate that an input is required. <br>-->
<!--                        Once completed, please select the <b>"Update"</b> button.-->
<!--                    </label>-->
<!--                </div>-->
                <div class="uk-form-row">

                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small uk-text-bold">Employee ID<span class="tm-required-label">*</span></label>
                        <div class="uk-form-controls">
                            <input id="default_emp_id" type="hidden" name="default_emp_id" value="<?php echo $emp_id ?>" />
                            <?php
                            $employee_id =  array(
                                "id" => "employee_id",
                                "name" => "employee_id",
                                "value" =>  $emp_id,
                                "class" => "uk-width-large uk-form-small",
                                "readonly" => "true",
                                "style"=>"background-color: #faffbd; border: 1px solid #ddd"

                            );
                            echo form_input($employee_id);
                            ?>
                        </div>
                    </div>

                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small uk-text-bold">Employee Name</label>
                        <div class="uk-form-controls">
                            <?php
                            $employee_name =  array(
                                "id" => "employee_name",
                                "name" => "employee_name",
                                "value" =>  $full_name,
                                "class" => "uk-width-large uk-form-small",
                                "readonly" => "true",
                                "style"=>"background-color: #faffbd; border: 1px solid #ddd"

                            );
                            echo form_input($employee_name);
                            ?>
                        </div>
                    </div>

                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small uk-text-bold">Email</label>
                        <div class="uk-form-controls">
                            <input id="default_emp_email" type="hidden" name="default_emp_email" value="<?php echo $email ?>" />
                            <?php
                            $employee_email =  array(
                                "id" => "employee_email",
                                "name" => "employee_email",
                                "value" =>  $email,
                                "readonly" => "true",
                                "style"=>"background-color: #faffbd; border: 1px solid #ddd",
                                "class" => "uk-width-large uk-form-small",

                            );
                            echo form_input($employee_email);
                            ?>
                        </div>
                    </div>

                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small uk-text-bold">Job Title</label>
                        <div class="uk-form-controls">
                            <?php
                            $job_title =  array(
                                "id" => "job_title",
                                "name" => "job_title",
                                "value" =>  $job_title,
                                "class" => "uk-width-large uk-form-small",
                                "readonly" => "true",
                                "style"=>"background-color: #faffbd; border: 1px solid #ddd"

                            );
                            echo form_input($job_title);
                            ?>
                        </div>
                    </div>



                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small uk-text-bold">Select Role:</label>
                        <div class="uk-form-controls">
                            <select name="rolename" id="getRoleID" class = "uk-width-large uk-form-small branchcode">
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

                    <div class="uk-form-row uk-text-center uk-margin-large-bottom">
                        <button type="submit" class="uk-button uk-button-primary uk-button-small uk-width-2-10">Update</button>
                        <a href="<?php echo site_url("sys/assign_role_id"); ?>" class="uk-button uk-button-small uk-width-2-10">Cancel</a>
                    </div>
                    <?=form_close();?>

                </div>

        </section>

        <?php $this->load->view("templates/footer"); ?>
        <?php $this->load->view("templates/modal"); ?>
    </div>
</div>
<div id="loading"></div>

</body>
</html>