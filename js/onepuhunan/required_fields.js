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
                number: true,
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


    $(".name_validate").on("keypress", function (event) {
        var regex = new RegExp("^[a-z-A-Z._'- ]*$");
        validation(event, regex);
    });

    $(".alpha_only").on("keypress", function (event) {
        var regex = new RegExp("^[a-z-A-Z ]*$");
        validation(event, regex);
    });

    $(".number_only").on("keypress", function (event) {
        var regex = new RegExp("^[a-z-A-Z ]*$");
        validation(event, regex);
    });

    function validation(event, regex) {
        if (event.charCode != 0) {
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        }
    }
});