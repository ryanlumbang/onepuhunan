<?php
$data['title'] = 'OnePuhunan Service Portal | ADD Role ID';
?>
<?php $this->load->view("onepuhunan/header",$data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">

            <?=form_open("", array("class" => "form-width-small"));?>
            <h1 class="text-center">ADD ROLE ID</h1>
            <?php echo validation_errors(); ?>
            <?php

            if ( isset($sp_add_role_id) ) {
                switch( $sp_add_role_id) {
                    case 1:
                        echo "<div class='alert alert-warning'>"
                            . "      <span>"
                            .           "<strong>Adding Role Failed.!</strong><br>"
                            .           "Please make sure all field are sustain with data. "
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
                <label class="text-center">
                    Please complete the form below, all field name's followed by a <span class="tm-required-label">*</span> indicate that an input is required. <br>
                    Once completed, please select the <b>"Add Role"</b> button.
                </label>
            </div>

            <div class="form-group">
                <label>Role ID<span class="tm-required-label">*</span></label>
                <?php
                $role_id =  array(
                    "id" => "role_id",
                    "name" => "role_id",
                    "value" => "",
                    "class" => "form-control ",
                    "placeholder" => "Role ID"
                );
                echo form_input($role_id);
                ?>
            </div>
            <div class="form-group">
                <label>Role Name<span class="tm-required-label">*</span></label>
                <?php
                $role_name =  array(
                    "id" => "role_name",
                    "name" => "role_name",
                    "value" => "",
                    "class" => "form-control ",
                    "placeholder" => "Role Name"
                );
                echo form_input($role_name);
                ?>
            </div>
            <div class="form-group" style="display: none;">
                <label>Date Added<span class="tm-required-label">*</span></label>
                <?php
                $date_added =  array(
                    "id" => "date_added",
                    "name" => "date_added",
                    "value" => date("Y-m-d"),
                    "class" => "form-control ",
                    "readonly" => "true",
                    "style"=>"background-color: #faffbd; border: 1px solid #ddd"
                );
                echo form_input($date_added);
                ?>
            </div>
            <div class="form-group row">
                <div class="col-xs-6">
                    <button type="submit" class=" form-control global-button-success">Add Role</button>
                </div>
                <div class="col-xs-6">
                    <a href="<?php echo site_url("sys/assign_role_id"); ?>" class="btn  form-control global-button">Cancel</a>
                </div>
            </div>
            <?=form_close();?>

        </div>
    </div>
</div>
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>