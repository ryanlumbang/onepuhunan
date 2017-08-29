<?php
$data['title'] = 'OnePuhunan Service Portal | Manage TelleCaller Questions';
?>
<?php $this->load->view("onepuhunan/header",$data); ?>
    <div class="main">
        <div class="main-inner">
            <div class="container">

                <?=form_open("", array("class" => "form-width-small"));?>
                <h1 class="text-center">UPDATE TELLECALLER QUESTIONS</h1>
                <?php echo validation_errors(); ?>
                <?php
                if ( isset($sp_tc_update) ) {
                    switch( $sp_tc_update) {
                        case 1:
                            echo "<div class='alert alert-danger fade in alert-dismissable'>"
                                ."<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">&times;</a>"
                                ."<strong>Authentication Failed</strong><br/>Sorry, we couldn't find an account with that Employee ID."
                                ."</div>";
                            break;
                        default:
                            redirect(base_url()."sys/tc_question");
                            break;
                    }
                }
                ?>
                <br/>
                <div class="form-group">
                    <label class="text-center">
                        Please complete the form below, all field name's followed by a <span class="tm-required-label">*</span> indicate that an input is required. <br>
                        Once completed, please select the <b>"Update"</b> button.
                    </label>
                    <?php
                    $question =  array(
                        "id" => "question_no",
                        "name" => "question_no",
                        "value" =>  $_GET["quest1"],
                        "class" => "form-control ",
                        "placeholder" => "Please enter a question",
                        "type" => "hidden",
                    );
                    echo form_input($question);
                    ?>
                </div>

                <div class="form-group">
                    <label>Question<span class="tm-required-label">*</span></label>
                    <?php
                    $question =  array(
                        "id" => "question",
                        "name" => "question",
                        "value" =>  $_GET["quest"],
                        "class" => "form-control ",
                        "placeholder" => "Please enter a question"
                    );
                    echo form_input($question);
                    ?>
                </div>
                <p class="op-check">
                    <label>
                        <input <?php echo ($_GET["new"] ==1) ? 'checked' : '' ?> id="is_new" type="checkbox" name="is_new" value="<?php echo $_GET["new"] ?>">
                        New Loan
                    </label>
                    <label>
                        <input <?php echo ($_GET["repeat"] ==1) ? 'checked' : '' ?> id="is_repeat" type="checkbox" name="is_repeat" value="<?php echo $_GET["repeat"] ?>">
                        Repeat Loan
                    </label>
                    <label>
                        <input <?php echo ($_GET["set"] ==1) ? 'checked' : '' ?> id="is_set" type="checkbox" name="is_set" value="<?php echo $_GET["set"] ?>">
                        Set for TC
                    </label>
                </p>
                <div class="form-group row">
                    <div class="col-xs-6">
                        <button type="submit" class=" form-control global-button-success">Update</button>
                    </div>
                    <div class="col-xs-6">
                        <a href="<?php echo site_url("sys/tc_question"); ?>" class="btn  form-control global-button">Cancel</a>
                    </div>
                </div>
                <?=form_close();?>

            </div>

            </section>
        </div>
    </div>
<?php $this->load->view("onepuhunan/copyright"); ?>


    <script>
        $(document).ready(function(){
            $("#is_new").change(function() {
                if($(this).prop("checked")) {
                    $(this).val(1);
                } else {
                    $(this).val(0);
                }
            });

            $("#is_repeat").change(function() {
                if($(this).prop("checked")) {
                    $(this).val(1);
                } else {
                    $(this).val(0);
                }
            });

            $("#is_set").change(function() {
                if($(this).prop("checked")) {
                    $(this).val(1);
                } else {
                    $(this).val(0);
                }
            });
        });
    </script>
<?php $this->load->view("onepuhunan/footer"); ?>