<?php
$data['title'] = 'OnePuhunan Service Portal | Manage TelleCaller Questions';
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

            <?=form_open("", array("id" => "add_form" ,"class" => "uk-form uk-form-horizontal"));?>
            <div class="op-title"><h1><i class="uk-icon-tags"></i> ADD TELLECALLER QUESTIONS</h1></div>
            <?php echo validation_errors(); ?>
            <?php
            if ( isset($sp_tc_add) ) {
                switch( $sp_tc_add) {
                    case 1:
                        echo "<div class='uk-alert uk-alert-danger uk-text-small uk-text-justify' data-uk-alert>"
                            . "      <span>"
                            .           "<big class='uk-text-bold'>Authentication Failed</big><br>"
                            .           "Sorry, we couldn't find an account with that Employee ID. "
                            . "      </span>"
                            . "   </div>";
                        break;
                    default:
                        redirect(base_url()."sys/tc_question");
                        break;
                }
            }
            ?>
            <br/>
            <div class="uk-form-row tm-label">
                <label class="uk-text-small">
                    Please complete the form below, all field name's followed by a <span class="tm-required-label">*</span> indicate that an input is required. <br>
                    Once completed, please select the <b>"Add"</b> button.
                </label>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label uk-text-small uk-text-bold">Question<span class="tm-required-label">*</span></label>
                <div class="uk-form-controls">
                    <?php
                    $question =  array(
                        "id" => "question",
                        "name" => "question",
                        "value" => set_value("question"),
                        "class" => "uk-width-large uk-form-small",
                        "placeholder" => "Please enter a question"
                    );
                    echo form_input($question);
                    ?>
                </div>
            </div>
            <p class="op-check">
                <label>
                    <input type="hidden" name="is_new" value="0" />
                    <?php
                    $new = array(
                        "id" => "is_new",
                        "name" => "is_new",
                        "value" => "1",
                        "type" => "checkbox"
                    );
                    echo form_input($new);
                    ?>
                    New Loan
                </label>
                <label>
                    <input type="hidden" name="is_repeat" value="0" />
                    <?php
                    $repeat = array(
                        "id" => "is_repeat",
                        "name" => "is_repeat",
                        "value" => "1",
                        "type" => "checkbox"
                    );
                    echo form_input($repeat);
                    ?>
                    Repeat Loan
                </label>
                <label>
                    <input type="hidden" name="is_set" value="0" />
                    <?php
                    $set = array(
                        "id" => "is_set",
                        "name" => "is_set",
                        "value" => "1",
                        "type" => "checkbox"
                    );
                    echo form_input($set);
                    ?>Set for TC
                </label>
            </p>
            <div class="uk-form-row uk-text-center uk-margin-large-bottom">
                <button type="submit" class="uk-button uk-button-primary uk-button-small uk-width-2-10" id="add_tc">Add</button>
                <a href="<?php echo site_url("sys/tc_question"); ?>" class="uk-button uk-button-small uk-width-2-10">Cancel</a>
            </div>
            <?=form_close();?>
        </div>
    </section>
    <?php $this->load->view("templates/footer"); ?>
    <?php $this->load->view("templates/modal"); ?>
</div>
</body>
</html>