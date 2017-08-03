<?php
    $data['title'] = 'OnePuhunan Service Portal | Sign Up';
?>
    <?php $this->load->view("onepuhunan/head", $data); ?>
    <body>
    <style>
        body{background: #004886; padding-bottom: 0}
    </style>
        <div class="container">
            <?php echo validation_errors(); ?>
            <?php
                if ( isset($sp_ua_create_acct) ) {
                    switch( $sp_ua_create_acct ) {
                        case 1:
                            echo "<div class='alert alert-warning'> "
                            . "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"
                            . "      <span>Sorry, a user account with that employee id already exists.</span>"
                            . "   </div>";
                            break;
                        case 2:
                            echo "<div class='alert alert-warning'> "
                            . "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"
                            . "      <span>User account is already for approval by system administrator.</span>"
                            . "   </div>";
                            break;
                        case 3:
                            echo "<div class='alert alert-warning'> "
                            . "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"
                            . "      <span>Sorry, a user account with that e-mail address already exists.</span>"
                            . "   </div>";
                            break;
                        default:
                            redirect(base_url()."success", "refresh");
                            break;
                    }
                }
             ?>
            <?=form_open("", array("class" => "uk-form uk-form-horizontal", "id" => "sign_up_form",
                "style" => "width: 70%; margin: 0px auto; color: white; background: rgba(255, 255, 255, 0.1); padding: 5%;"));?>
                <img  src="<?=base_url()?>img/logo/onepuhunan_logo.png" alt="OnePuhunan" title="OnePuhunan" style="width:15em; display: block; margin: 0 auto">
                <h1 class="text-center">REGISTRATION</h1>
                <p>
                    Please complete the form below, all field name's followed by a <span class="field-required">*</span> indicate that an input is required.
                    Once completed, please select the <b>"Submit"</b> button.
                </p>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Last Name <span class="field-required">*</span></label>
                    </div>
                    <div class="col-md-9">
                        <?php
                        $lname =  array(
                            "id" => "lname",
                            "name" => "lname",
                            "value" => set_value("lname"),
                            "class" => "form-control",
                            "placeholder" => "Please enter your last name."
                        );
                        echo form_input($lname);
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>First Name <span class="field-required">*</span></label>
                    </div>
                    <div class="col-md-9">
                        <?php
                        $fname = array(
                            "id" => "fname",
                            "name" => "fname",
                            "value" => set_value("fname"),
                            "class" => "form-control",
                            "placeholder" => "Please enter your first name."
                        );
                        echo form_input($fname);
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Middle Name <span class="field-required">*</span></label>
                    </div>
                    <div class="col-md-9">
                        <?php
                        $mname = array(
                            "id" => "mname",
                            "name" => "mname",
                            "value" => set_value("mname"),
                            "class" => "form-control",
                            "placeholder" => "Please enter your middle name."
                        );
                        echo form_input($mname);
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Email Address (OnePuhunan) <span class="field-required">*</span></label>
                    </div>
                    <div class="col-md-5 col-xs-6">
                        <?php
                        $email = array(
                            "id" => "email",
                            "name" => "email",
                            "value" => set_value("email"),
                            "class" => "form-control",
                            "placeholder" => "Please enter your email address."
                        );
                        echo form_input($email);
                        ?>
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <select id="email_extension" class="form-control" name="email_extension">
                            <option value="@onepuhunan.com.ph">@onepuhunan.com.ph</option>
                            <option value="@gmail.com">@gmail.com</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <p>Please make sure your email address is correct or you will not receive your login information for our member's area(s).</p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Job Title <span class="field-required">*</span></label>
                    </div>
                    <div class="col-md-9">
                        <?php
                        $job_title = array(
                            "id" => "job_title",
                            "name" => "job_title",
                            "value" => set_value("job_title"),
                            "class" => "form-control",
                            "placeholder" => "Please enter your job title."
                        );
                        echo form_input($job_title);
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Department <span class="field-required">*</span></label>
                    </div>
                    <div class="col-md-9">
                        <?php
                        $dept = array(
                            "id" => "dept",
                            "class" => "form-control"
                        );

                        foreach((array) $query as $item) {
                            $options[$item["dept_id"]] = $item["dept_name"];
                        }
                        echo form_dropdown("dept", $options, set_value("dept"), $dept);
                        ?>
                    </div>
                </div>
                <hr class='uk-article-divider' style="margin-top: 15px;margin-bottom: 20px;">
                <div class="form-group row">
                    <div class="col-md-12">
                        <label>Password complexity requirements:</label>
                        <ul>
                            <li>Password must be at least 8 characters in length</li>
                            <li>One or more upper case letters</li>
                            <li>One or more lower case letters</li>
                            <li>One or more numbers</li>
                            <li>One or more of these special characters: !@#$%^&*</li>
                        </ul>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <p>*Note: CA  - BR(Branch Code), OPS/BM -  Employee ID</p>
                    </div>
                    <div class="col-md-3">
                        <label>Employee ID <span class="field-required">*</span></label>
                    </div>
                    <div class="col-md-9">
                        <?php
                        $emp_id = array(
                            "id" => "emp_id",
                            "name" => "emp_id",
                            "value" => set_value("emp_id"),
                            "class" => "form-control",
                            "placeholder" => "Please enter your employee id."
                        );
                        echo form_input($emp_id);
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Desired Password <span class="field-required">*</span></label>
                    </div>
                    <div class="col-md-9">
                        <?php
                        $password = array(
                            "id" => "password",
                            "name" => "password",
                            "type" => "password",
                            "value" => set_value("password"),
                            "class" => "form-control",
                            "placeholder" => "Please enter your desired password."
                        );
                        echo form_input($password);
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <p>You will use this when logging in to our member's area(s). Please see password complexity requirements above for your reference in creating your desired password. </p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Confirm Password <span class="field-required">*</span></label>
                    </div>
                    <div class="col-md-9">
                        <?php
                        $passconf = array(
                            "id" => "passconf",
                            "name" => "passconf",
                            "type" => "password",
                            "value" => set_value("passconf"),
                            "class" => "form-control",
                            "placeholder" => "Please confirm the password you entered above."
                        );
                        echo form_input($passconf);
                        ?>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-xs-6">
                        <button type="submit" class="form-control">Submit</button>
                    </div>
                    <div class="col-xs-6">
                        <button type="reset" class="form-control">Clear</button>
                    </div>
                </div>
            <?=form_close();?>
        </div>
        <?php $this->load->view("onepuhunan/footer"); ?>
