<?php
$data['title'] = 'OnePuhunan Service Portal | Manage TelleCaller Questions';
?>
<?php $this->load->view("onepuhunan/header",$data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <?=form_open("", array("id" => "add_form" ,"class" => "form-width-small text-center"));?>
            <h1><i class="uk-icon-tags "></i> ADD TELLECALLER QUESTIONS</h1>
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
            <div class="form-group">
                <label>
                    Please complete the form below, all field name's followed by a <span class="tm-required-label">*</span> indicate that an input is required. <br>
                    Once completed, please select the <b>"Add"</b> button.
                </label>
            </div>
            <div class="form-group">
                <label>Question<span class="tm-required-label">*</span></label>
                <?php
                $question =  array(
                    "id" => "question",
                    "name" => "question",
                    "value" => set_value("question"),
                    "class" => "form-control global-button",
                    "placeholder" => "Please enter a question"
                );
                echo form_input($question);
                ?>
            </div>
            <div class="form-group">
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
            </div>
            <div class="form-group row">
                <div class="col-xs-6">
                    <button type="submit" class="form-control input-lg global-button" id="add_tc">Add</button>
                </div>
                <div class="col-xs-6">
                    <a href="<?php echo site_url("sys/tc_question"); ?>" class="btn form-control input-lg global-button">Cancel</a>
                </div>

            </div>
            <?=form_close();?>
        </div>
    </div>
</div>
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>