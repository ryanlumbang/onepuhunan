//EXPORT VALIDATION IN MONTH

function myFunction()
{
    var year = document.getElementById("year").value;
    var months = document.getElementById("months").value;

    var days = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];

    if (months == days[0])
    {
        document.getElementById("text").value = year +"-"+ months +"-31";
    }

    else if (months == days[1])
    {
        if( (0 == year % 4) && (0 != year % 100) || (0 == year % 400) )
        {
            document.getElementById("text").value = year +"-"+ months +"-29";
        }
        else
        {
            document.getElementById("text").value = year +"-"+ months +"-28";
        }
    }

    else  if (months == days[2])
    {
        document.getElementById("text").value = year +"-"+ months +"-31";
    }

    else  if (months == days[3])
    {
        document.getElementById("text").value = year +"-"+ months +"-30";
    }

    else  if (months == days[4])
    {
        document.getElementById("text").value = year +"-"+ months +"-31";
    }

    else  if (months == days[5])
    {
        document.getElementById("text").value = year +"-"+ months +"-30";
    }

    else  if (months == days[6])
    {
        document.getElementById("text").value = year +"-"+ months +"-31";
    }

    else  if (months == days[7])
    {
        document.getElementById("text").value = year +"-"+ months +"-31";
    }

    else  if (months == days[8])
    {
        document.getElementById("text").value = year +"-"+ months +"-30";
    }

    else  if (months == days[9])
    {
        document.getElementById("text").value = year +"-"+ months +"-31";
    }

    else  if (months == days[10])
    {
        document.getElementById("text").value = year +"-"+ months +"-30";
    }

    else  if (months == days[11])
    {
        document.getElementById("text").value = year +"-"+ months +"-31";
    }

}

function typeLoan()
{
    var loan = document.getElementById("loan").value;

    document.getElementById("loan_text").value = loan;

}

function branchList()
{
    var branch = document.getElementById("branchCode").value;

    document.getElementById("branch_code").value = branch;

}

$(document).ready(function()
{
    var branch = document.getElementById("branchCode").value;

    document.getElementById("branch_code").value = branch;
});

//END FOR EXPORT VALIDATION FOR MONTH

//VALIDATION FOR CSV FILE

var _validFileExtensions = [".csv"];

function ValidateSingleInput(oInput)
{
    if (oInput.type == "file") {
        var sFileName = oInput.value;
        if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }

            if (!blnValid) {
                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
    return true;
}

//END VALIDATION FOR CSV FILE

//CSV VALIDATION FIELD ONLY
function model(mContent)
{
    $("#test1").on('click',function () {
        $( ".overlay" ).fadeIn();
        $('.mText').html(mContent);
        $( ".footer" ).on('click', function() {
            $( ".overlay" ).fadeOut();
        });
    });

    $("#kyc_today").on('click',function () {
        $( ".overlay" ).fadeIn();
        $('.mText').html(mContent);
        $( ".footer" ).on('click', function() {
            $( ".overlay" ).fadeOut();
        });
    });

    $("#kyc_pending").on('click',function () {
        $( ".overlay" ).fadeIn();
        $('.mText').html(mContent);
        $( ".footer" ).on('click', function() {
            $( ".overlay" ).fadeOut();
        });
    });

    $("#qa").on('click',function () {
        $( ".overlay" ).fadeIn();
        $('.mText').html(mContent);
        $( ".footer" ).on('click', function() {
            $( ".overlay" ).fadeOut();
        });
    });

    $("#alaf").on('click',function () {
        $( ".overlay" ).fadeIn();
        $('.mText').html(mContent);
        $( ".footer" ).on('click', function() {
            $( ".overlay" ).fadeOut();
        });
    });

    $("#tc").on('click',function () {
        $( ".overlay" ).fadeIn();
        $('.mText').html(mContent);
        $( ".footer" ).on('click', function() {
            $( ".overlay" ).fadeOut();
        });
    });

    $("#kyc_remarks").on('click',function () {
        $( ".overlay" ).fadeIn();
        $('.mText').html(mContent);
        $( ".footer" ).on('click', function() {
            $( ".overlay" ).fadeOut();
        });
    });

}

var bac = "heading"
var abc = '<div class="well"><h2>' + bac + '<h2></div>'
$(document).ready(function()
{
    model(abc);
});
//END OF CSV VALIDATION FILE