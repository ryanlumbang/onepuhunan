<?php
$data['title'] = 'OnePuhunan Service Portal | ADD Role ID';
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
            <div class="op-title"><h1><i class="uk-icon-tags"></i> ADD ROLE ID</h1></div>
            <?php echo validation_errors(); ?>
            <?php

            if ( isset($sp_add_role_id) ) {
                switch( $sp_add_role_id) {
                    case 1:
                        echo "<div class='uk-alert uk-alert-danger uk-text-small uk-text-justify' data-uk-alert>"
                            . "      <span>"
                            .           "<big class='uk-text-bold'>Adding Role Failed.!</big><br>"
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
            <br/>
            <div class="uk-form-row tm-label">
                <label class="uk-text-small">
                    Please complete the form below, all field name's followed by a <span class="tm-required-label">*</span> indicate that an input is required. <br>
                    Once completed, please select the <b>"ADD Role"</b> button.
                </label>
            </div>
            <div class="uk-form-row">

                <div class="uk-form-row">
                    <label class="uk-form-label uk-text-small uk-text-bold">Role ID<span class="tm-required-label">*</span></label>
                    <div class="uk-form-controls">
                        <?php
                        $role_id =  array(
                            "id" => "role_id",
                            "name" => "role_id",
                            "value" => "",
                            "class" => "uk-width-large uk-form-small",
                            "placeholder" => "Role ID"
                        );
                        echo form_input($role_id);
                        ?>
                    </div>
                </div>

                <div class="uk-form-row uk-margin-small-bottom">
                    <label class="uk-form-label uk-text-small uk-text-bold">Role Name<span class="tm-required-label">*</span></label>
                    <div class="uk-form-controls">
                        <?php
                        $role_name =  array(
                            "id" => "role_name",
                            "name" => "role_name",
                            "value" => "",
                            "class" => "uk-width-large uk-form-small",
                            "placeholder" => "Role Name"
                        );
                        echo form_input($role_name);
                        ?>
                    </div>
                </div>

                <div class="uk-form-row uk-margin-small-bottom" style="display: none;">
                    <label class="uk-form-label uk-text-small uk-text-bold">Date Added<span class="tm-required-label">*</span></label>
                    <div class="uk-form-controls">
                        <?php
                        $date_added =  array(
                            "id" => "date_added",
                            "name" => "date_added",
                            "value" => date("Y-m-d"),
                            "class" => "uk-width-large uk-form-small",
                            "readonly" => "true",
                            "style"=>"background-color: #faffbd; border: 1px solid #ddd"
                        );
                        echo form_input($date_added);
                        ?>
                    </div>
                </div>

                <div class="uk-form-row uk-text-center uk-margin-large-bottom">
                    <button type="submit" class="uk-button uk-button-primary uk-button-small uk-width-2-10">ADD Role</button>
                    <a href="<?php echo site_url("sys/assign_role_id"); ?>" class="uk-button uk-button-small uk-width-2-10">Cancel</a>
                </div>
                <?=form_close();?>



            </div>

    </section>

    <?php $this->load->view("templates/footer"); ?>
</div>
</div>
<div id="loading"></div>
</body>
</html>