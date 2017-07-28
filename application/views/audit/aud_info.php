<?php
$data['title'] = 'OnePuhunan Service Portal | Consolidate Data';
?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("templates/op-head", $data); ?>
<body id="losbody">
    <link rel="stylesheet" href="<?=base_url()?>css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="<?=base_url()?>css/bootstrap.css">
    <link rel="stylesheet" href="<?=base_url()?>css/vill.css">

    <link rel="stylesheet" href="<?=base_url()?>css/bootstrap-datetimepicker-standalone.min.css">
    <script src="<?=base_url()?>js/moment.js"></script>
    <script src="<?=base_url()?>js/transition.js"></script>
    <script src="<?=base_url()?>js/collapse.js"></script>
    <script src="<?=base_url()?>js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?=base_url()?>js/tether.min.js"></script>
    <script src="<?=base_url()?>js/bootstrap.js"></script>

    <script src="<?=base_url()?>js/vill.js"></script>
<div id="page-wrapper">
    <?php $this->load->view("templates/op-header"); ?>
    <?php $this->load->view("templates/subheader"); ?>
    <div class="header-bg">
        <div class="header-banner">
            <div class="uk-container op-container">
                <h2>COSOLIDATION OF DATA</h2>
            </div>
        </div>
    </div>  
    <br>
    <div class="container">
    <br>
        <div class="consolidation_form">
            <form id="consolidationForm" action="" method="post">
                <?php 
                $this->load->view('audit/consolidation_form/step1');
                $this->load->view('audit/consolidation_form/step2'); 
                $this->load->view('audit/consolidation_form/step3');  
                $this->load->view('audit/consolidation_form/step4');  
                $this->load->view('audit/consolidation_form/step5');  
                $this->load->view('audit/consolidation_form/step6');  
                $this->load->view('audit/consolidation_form/step7');  
                $this->load->view('audit/consolidation_form/step8');  
                $this->load->view('audit/consolidation_form/step9');  
                $this->load->view('audit/consolidation_form/step10');  
                $this->load->view('audit/consolidation_form/step11'); 
                $this->load->view('audit/consolidation_form/consolidation_header'); 
                ?>
            </form>
        </div>
    </div>
    <section id="main-section"> 
        <?php  foreach($query as $row): ?>
        <div id="tm-container" class="uk-container uk-width-5-10 uk-container-center" style="display: none;">

            <?=form_open("", array("class" => "uk-form uk-form-horizontal"));?>
            <div class="op-title"><h1><i class="uk-icon-tags"></i> <?=$row["Name"]?> - <?=$row["ClientID"]?></h1></div>
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
<!--            <div class="uk-form-row tm-label">-->
<!--                <label class="uk-text-small">-->
<!--                    Please complete the form below, all field name's followed by a <span class="tm-required-label">*</span> indicate that an input is required. <br>-->
<!--                    Once completed, please select the <b>"Update"</b> button.-->
<!--                </label>-->
<!--            </div>-->
            <div class="uk-form-row">

                <div class="uk-form-row">
                    <label class="uk-form-label uk-text-small uk-text-bold">Reference No.</label>
                    <div class="uk-form-controls">
                        <?php
                        $aud_ref =  array(
                            "id" => "aud_ref",
                            "name" => "aud_ref",
                            "value" => date("yd").$row["ClientID"],
                            "class" => "uk-width-large uk-form-small",
                            "readonly" => "true",
                            "style"=>"background-color: #faffbd; border: 1px solid #ddd"
                        );
                        echo form_input($aud_ref);
                        ?>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label uk-text-small uk-text-bold">Date Audit</label>
                    <div class="uk-form-controls">
                        <?php
                        $audit_date =  array(
                            "id" => "audit_date",
                            "name" => "audit_date",
                            "value" => date("Y-m-d"),
                            "class" => "uk-width-large uk-form-small",
                            "readonly" => "true",
                            "style"=>"background-color: #faffbd; border: 1px solid #ddd"
                        );
                        echo form_input($audit_date);
                        ?>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label uk-text-small uk-text-bold">Client Name</label>
                    <div class="uk-form-controls">
                        <?php
                        $client_name =  array(
                            "id" => "client_name",
                            "name" => "client_name",
                            "value" =>  $row["Name"],
                            "class" => "uk-width-large uk-form-small",
                            "readonly" => "true",
                            "style"=>"background-color: #faffbd; border: 1px solid #ddd"

                        );
                        echo form_input($client_name);
                        ?>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label uk-text-small uk-text-bold">Client ID</label>
                    <div class="uk-form-controls">
                        <?php
                        $client_id =  array(
                            "id" => "client_id",
                            "name" => "client_id",
                            "value" =>  $row["ClientID"],
                            "class" => "uk-width-large uk-form-small",
                            "readonly" => "true",
                            "style"=>"background-color: #faffbd; border: 1px solid #ddd"

                        );
                        echo form_input($client_id);
                        ?>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label uk-text-small uk-text-bold">Account ID</label>
                    <div class="uk-form-controls">
                        <?php
                        $account_id =  array(
                            "id" => "account_id",
                            "name" => "account_id",
                            "value" =>  $row["AccountID"],
                            "class" => "uk-width-large uk-form-small",
                            "readonly" => "true",
                            "style"=>"background-color: #faffbd; border: 1px solid #ddd"

                        );
                        echo form_input($account_id);
                        ?>
                    </div>
                </div>

                <div class="uk-form-row uk-text-center uk-margin-large-bottom">
                    <button type="submit" class="uk-button uk-button-primary uk-button-small uk-width-2-10">Update</button>
                    <a href="<?php echo site_url("audit/aud_client"); ?>" class="uk-button uk-button-small uk-width-2-10">Cancel</a>
                </div>
                <?=form_close();?>

            </div>
            <?php endforeach; ?>
    </section>

    <?php $this->load->view("templates/footer"); ?>
</div>
</body>
</html>
