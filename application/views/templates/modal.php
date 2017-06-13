<div id="userModal">
    <form action="" method="post" class="add_form modal" id="btnAdd" style="display:none;">
        <h3>Add Question</h3>
        <p><label>Question:</label><input type="text" name="question" id="question" /></p>
        <p class="op-check">
            <label><input type="checkbox" name="is_new" id="is_new"> New Loan</label>
            <label><input type="checkbox" name="is_repeat" id="is_new"> Repeat Loan</label>
            <label><input type="checkbox" name="is_set" id="is_set"> Set for TC</label>
        </p>
        <input type="submit" value="ADD" class="uk-button  succes-btn " name="action" id="addrow"  />
    </form>

</div>

<form method="post" action="<?php echo base_url() . "sys/tc_question"?>" class="add_form modal" id="btnEdit" style="display:none;">
    <input type="hidden" id="hide" name="did" >
    <h3>Update Question</h3>
    <p><label>Question:</label><input type="text" id="inputQuestion"  /></p>
    <p class="op-check">
        <label><input type="checkbox" id="inputNew" name="is_new"> New Loan</label>
        <label><input type="checkbox" id="inputRepeat" name="is_repeat"> Repeat Loan</label>
        <label><input type="checkbox" id="inputSet" name="is_set"> Set for TC</label>
    </p>
    <input type="button" value="CANCEL" class="uk-button  cancel-btn " />
    <input type="submit" value="UPDATE" class="uk-button  succes-btn" />
</form>
