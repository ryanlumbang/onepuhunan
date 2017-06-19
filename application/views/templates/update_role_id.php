<?php
$data['title'] = 'OnePuhunan Service Portal | Manage Role ID';
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
                <h2>SYSTEM SETTINGS</h2>
            </div>
        </div>
    </div>
    <section id="main-section">


        <div id="tm-container" class="uk-container uk-width-5-10 uk-container-center">

            <?=form_open("", array("class" => "uk-form uk-form-horizontal"));?>
            <div class="op-title"><h1><i class="uk-icon-tags"></i> UPDATE ROLE ID</h1></div>
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
            <div class="uk-form-row tm-label">
                <label class="uk-text-small">
                    Please complete the form below, all field name's followed by a <span class="tm-required-label">*</span> indicate that an input is required. <br>
                    Once completed, please select the <b>"Update"</b> button.
                </label>
            </div>
            <div class="uk-form-row">

                <div class="uk-form-row">
                    <label class="uk-form-label uk-text-small uk-text-bold">Employee Name</label>
                    <div class="uk-form-controls">
                        <?php
                        $employee_name =  array(
                            "id" => "employee_name",
                            "name" => "employee_name",
                            "value" =>  $_GET["fullname"],
                            "class" => "uk-width-large uk-form-small",
                            "readonly" => "true",
                            "style"=>"background-color: #faffbd; border: 1px solid #ddd"

                        );
                        echo form_input($employee_name);
                        ?>
                    </div>
                </div>

            <div class="uk-form-row">
                <label class="uk-form-label uk-text-small uk-text-bold">Employee ID<span class="tm-required-label">*</span></label>
                <div class="uk-form-controls">
                    <?php
                    $employee_id =  array(
                        "id" => "employee_id",
                        "name" => "employee_id",
                        "value" =>  $_GET["emp_id"],
                        "class" => "uk-width-large uk-form-small",
                        "readonly" => "true",
                        "style"=>"background-color: #faffbd; border: 1px solid #ddd"

                    );
                    echo form_input($employee_id);
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
                            "value" =>  $_GET["job_title"],
                            "class" => "uk-width-large uk-form-small",
                            "readonly" => "true",
                            "style"=>"background-color: #faffbd; border: 1px solid #ddd"

                        );
                        echo form_input($job_title);
                        ?>
                    </div>
                </div>




            <div class="uk-form-row uk-margin-small-bottom">
                <label class="uk-form-label uk-text-small uk-text-bold">Role ID<span class="tm-required-label">*</span></label>
                <div class="uk-form-controls">
                    <?php
                    $role =  array(
                        "id" => "role",
                        "name" => "role",
                        "value" =>  $_GET["role"],
                        "class" => "uk-width-large uk-form-small",
                    );
                    echo form_input($role);
                    ?>
                </div>
            </div>
                <div class="uk-form-row">
                    <label class="uk-form-label uk-text-small uk-text-bold">Role <span class="tm-required-label">*</span></label>
                    <select class="form-control">

                        <?php

                        foreach((array) $query as $row) { ?>
                            <tr class="modal-update">
                                <td> <?php echo $row['role_id'] ?> </td>
                            </tr>
                        <?php   }

                        ?>

                    </select>
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
</body>
</html>