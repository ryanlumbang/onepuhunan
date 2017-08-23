<?php
$data['title'] = 'OnePuhunan Service Portal | Manage TelleCaller Questions';
?>
<?php $this->load->view("onepuhunan/header",$data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <?=form_open("", array("class" => "form-width-small", "id" => "branch_form"));?>
            <h1 class="text-center">BRANCH HANDLE</h1>
            <?php echo validation_errors(); ?>
            <?php
            if ( isset($sp_upd_emp_branch) ) {
                switch( $sp_upd_emp_branch) {
                    case 1:
                        echo "<div class='alert alert-danger fade in alert-dismissable'>"
                            ."<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">&times;</a>"
                            ."<strong>Authentication Failed</strong><br/>Sorry, we couldn't find an account with that Employee ID."
                            ."</div>";
                        break;
                    default:
                        redirect(base_url()."operations/success_branch_assign");
                        break;
                }
            }
            ?>
            <div class="form-group">
                <label class="text-center">
                    Please complete the form below, all field name's followed by a <span class="tm-required-label">*</span> indicate that an input is required. <br>
                    Once completed, please select the <b>"Update"</b> button.
                </label>
            </div>
            <div class="form-group">
                <label>Employee ID <span class="tm-required-label">*</span></label>
                <?php
                $emp_id =  array(
                    "id" => "emp_id",
                    "name" => "emp_id",
                    "value" => set_value("emp_id"),
                    "class" => "form-control ",
                    "placeholder" => "Please enter employee id."
                );
                echo form_input($emp_id);
                ?>
            </div>
            <div class="form-group">
                <label>Branch ID's <span class="tm-required-label">*</span></label>
                <?php
                $branch_ids = array(
                    "id" => "branch_ids",
                    "name" => "branch_ids",
                    "value" => set_value("branch_ids"),
                    "class" => "form-control ",
                    "placeholder" => "Please enter branch id's."
                );
                echo form_input($branch_ids);
                ?>
            </div>
            <div class="form-group row">
                <div class="col-xs-6">
                    <button type="submit" class=" form-control global-button-success">Update</button>
                </div>
                <div class="col-xs-6">
                    <a href="<?php echo site_url("dashboard"); ?>" class="btn  form-control global-button">Cancel</a>
                </div>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>