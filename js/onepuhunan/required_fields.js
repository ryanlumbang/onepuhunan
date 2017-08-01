$(document).ready(function (){
    /*LOS Branch Assignment*/
    $("#branch_form").validate({
        rules: {
            emp_id: {
              required: true,
                number: true
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

    /*Registration*/
    $("#sign_up_form").validate({
        rules: {
            lname: {
                required: true
            },
            fname: {
                required: true
            },
            email: {
                required: true
            },
            job_title: {
                required: true
            },
            dept: {
                required: true
            },
            emp_id: {
                required: true
            },
            password: {
                required: true
            },
            passconf: {
                equalTo: "#password"
            }
        }
    });

});