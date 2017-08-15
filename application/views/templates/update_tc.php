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
                        "class" => "form-control input-lg",
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
                        "class" => "form-control input-lg",
                        "placeholder" => "Please enter a question"
                    );
                    echo form_input($question);
                    ?>
                </div>
                <p class="op-check">
                    <label>
                        <input type="hidden" name="is_new" value="0" />
                        <?php
                        $new = array(
                            "id" => "is_new",
                            "name" => "checkme",
                            "value" =>  $_GET["new"],
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
                            "name" => "checkme",
                            "value" =>  $_GET["repeat"],
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
                            "name" => "checkme",
                            "value" =>  $_GET["set"],
                            "type" => "checkbox"
                        );
                        echo form_input($set);
                        ?>Set for TC
                    </label>
                </p>
                <input type="text" name="new" id="new" style="display: none"/>
                <input type="text" name="rep" id="rep" style="display: none"/>
                <input type="text" name="set" id="set" style="display: none"/>
                <div class="form-group row">
                    <div class="col-xs-6">
                        <button type="submit" class="input-lg form-control global-button">Update</button>
                    </div>
                    <div class="col-xs-6">
                        <a href="<?php echo site_url("sys/tc_question"); ?>" class="btn input-lg form-control global-button">Cancel</a>
                    </div>
                </div>
                <?=form_close();?>

            </div>

            </section>

            <script>
                $(document).ready(function(){

                    $("#is_new").val(function() {
                        if($(this).prop("checked")) {
                            $("#new").val(1);
                        } else {
                            $("#new").val(0);
                        }
                    });

                    $("#is_repeat").val(function() {
                        if($(this).prop("checked")) {
                            $("#rep").val(1);
                        } else {
                            $("#rep").val(0);
                        }
                    });

                    $("#is_set").val(function() {
                        if($(this).prop("checked")) {
                            $("#set").val(1);
                        } else {
                            $("#set").val(0);
                        }
                    });

                });

                $("#is_new").change(function() {
                    if($(this).prop("checked")) {
                        $("#new").val(1);
                    } else {
                        $("#new").val(0);
                    }
                });

                $("#is_repeat").change(function() {
                    if($(this).prop("checked")) {
                        $("#rep").val(1);
                    } else {
                        $("#rep").val(0);
                    }
                });

                $("#is_set").change(function() {
                    if($(this).prop("checked")) {
                        $("#set").val(1);
                    } else {
                        $("#set").val(0);
                    }
                });
            </script>
        </div>
    </div>
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>