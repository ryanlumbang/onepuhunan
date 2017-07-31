$(document).ready(function (){
    /*LOS Branch Assignment*/
    $("#branch_form").validate({
        rules: {
            emp_id: {
              required: true
            },
            branch_ids: {
                required: true
            }
        }
    });

    /*LOS TelleCaller Questions*/
    $("#add_form").validate({
        rules: {
            question: {
                required: true
            }
        }
    });

});