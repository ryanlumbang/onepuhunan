<?php
    $data['title'] = 'OnePuhunan Service Portal | Update Personal Information';
?>
<?php $this->load->view("onepuhunan/header",$data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <?php echo validation_errors(); ?>
            <?php
                if ( isset($sp_ua_upd_user_acct) ) {
                    switch($sp_ua_upd_user_acct) {
                        case 1:
                            echo "<div class='uk-alert uk-alert-warning uk-text-small' data-uk-alert> "
                            . "      <a href='' class='uk-alert-close uk-close'></a>"
                            . "      <span>Sorry, a user account with that employee id already exists.</span>"
                            . "   </div>";
                            break;
                        case 2:
                            echo "<div class='uk-alert uk-alert-warning uk-text-small' data-uk-alert> "
                            . "      <a href='' class='uk-alert-close uk-close'></a>"
                            . "      <span>Sorry, a user account with that e-mail address already exists.</span>"
                            . "   </div>";
                            break;
                        default:
                            echo "<div class='uk-alert uk-alert-success uk-text-small' data-uk-alert> "
                            . "       <a href='' class='uk-alert-close uk-close'></a>"
                            . "       <span>Your profile has been successfully updated.</span>"
                            . "   </div>";
                            break;
                    }
                }
             ?>
            <?=form_open("", array("class" => "form-width-small"));?>
                <h1 class="text-center">MY PROFILE</h1>
                <div class="form-group">
                    <label class="text-center">
                        Please complete the form below, all field name's followed by a <span class="tm-required-label">*</span> indicate that an input is required.
                        Once completed, please select the <b>"Submit"</b> button.
                    </label>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label>Employee ID</label>
                    </div>
                    <div class="col-md-8">
                        <?php
                            $emp_id =  array(
                                "id" => "emp_id",
                                "name" => "emp_id",
                                "value" => set_value("emp_id", $result["emp_id"]),
                                "class" => "form-control input-medium",
                                "disabled" => "disabled"
                            );
                            echo form_input($emp_id);
                         ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label>Last Name <span class="tm-required-label">*</span></label>
                    </div>
                    <div class="col-md-8">
                        <?php
                            $lname =  array(
                                "id" => "lname",
                                "name" => "lname",
                                "value" => set_value("lname", $result["lname"]),
                                "class" => "form-control input-medium",
                                "placeholder" => "Please enter your last name."
                            );
                            echo form_input($lname);
                         ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label>First Name <span class="tm-required-label">*</span></label>
                    </div>
                    <div class="col-md-8">
                        <?php
                            $fname = array(
                                "id" => "fname",
                                "name" => "fname",
                                "value" => set_value("fname", $result["fname"]),
                                "class" => "form-control input-medium",
                                "placeholder" => "Please enter your first name."
                            );
                            echo form_input($fname);
                         ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label>Middle Name</label>
                    </div>
                    <div class="col-md-8">
                        <?php
                            $mname = array(
                                "id" => "mname",
                                "name" => "mname",
                                "value" => set_value("mname", $result["mname"]),
                                "class" => "form-control input-medium",
                                "placeholder" => "Please enter your middle name."
                            );
                            echo form_input($mname);
                         ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label>Email Address (OnePuhunan) <span class="tm-required-label">*</span></label>
                    </div>
                    <div class="col-md-8">
                        <?php
                            $email = array(
                                "id" => "email",
                                "name" => "email",
                                "value" => set_value("email", $result["email"]),
                                "class" => "form-control input-medium",
                                "placeholder" => "Please enter your email address."
                            );
                            echo form_input($email);
                         ?>

                    </div>
                </div>
                <div class="form-group tm-form-note">
                    <label>Please make sure your email address is correct or you will not receive your login information for our member's area(s).</label>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label>Job Title <span class="tm-required-label">*</span></label>
                    </div>
                    <div class="col-md-8">
                        <?php
                            $job_title = array(
                                "id" => "job_title",
                                "name" => "job_title",
                                "value" => set_value("job_title", $result["job_title"]),
                                "class" => "form-control input-medium",
                                "placeholder" => "Please enter your job title."
                            );
                            echo form_input($job_title);
                         ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label>Department <span class="tm-required-label">*</span></label>
                    </div>
                    <div class="col-md-8">
                        <?php
                            $dept = array(
                                "id" => "dept",
                                "class" => "form-control input-medium"
                            );

                            foreach((array) $query as $item) {
                                $options[$item["dept_id"]] = $item["dept_name"];
                            }
                            echo form_dropdown("dept", $options, set_value("dept", $result["dept"]), $dept);
                        ?>
                    </div>
                </div>
                <hr class='uk-article-divider' style="margin-top: 15px;margin-bottom: 20px;">
                <div class="form-group row">
                    <div class="col-md-4">
                        <label>Date Registered</label>
                    </div>
                    <div class="col-md-8">
                        <?php
                            $date_reg = array(
                                "id" => "date_reg",
                                "name" => "date_reg",
                                "value" => set_value("date_reg", $result["date_reg"]),
                                "class" => "form-control input-medium",
                                "disabled" => "disabled"
                            );
                            echo form_input($date_reg);
                         ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label>Application Role</label>
                    </div>
                    <div class="col-md-8">
                        <?php
                            $role_id = array(
                                "id"       => "role_id",
                                "name"     => "role_id",
                                "value"    => set_value("role_id", $result["role_id"]),
                                "class"    => "form-control input-medium",
                                "disabled" => "disabled"
                            );
                            echo form_input($role_id);
                         ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label>Date Approved</label>
                    </div>
                    <div class="col-md-8">
                        <?php
                            $date_apr = array(
                                "id"       => "date_apr",
                                "name"     => "date_apr",
                                "value"    => set_value("date_apr", $result["date_apr"]),
                                "class"    => "form-control input-medium",
                                "disabled" => "disabled"
                            );
                            echo form_input($date_apr);
                         ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label>Approved By</label>
                    </div>
                    <div class="col-md-8">
                        <?php
                            $approver = array(
                                "id"       => "approver",
                                "name"     => "approver",
                                "value"    => set_value("approver", $result["approver"]),
                                "class"    => "form-control input-medium",
                                "disabled" => "disabled"
                            );
                            echo form_input($approver);
                         ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xs-6">
                        <button type="submit" class=" form-control global-button-success">Submit</button>
                    </div>
                    <div class="col-xs-6">
                        <a class="btn  form-control global-button" href="<?php echo site_url("index.php"); ?>">Back</a>
                    </div>
                </div>
            <?=form_close();?>
        </div>
    </div>
</div>
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>