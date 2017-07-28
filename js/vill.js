/*$(document).ready(function(){
    var counter = 0;
    last_counter = $('#form-vill .step').length -1;

    backNext(counter)
    function backNext(counter){
        $('#form-vill .step').removeClass('active');
        $('#form-vill .step').eq(counter).addClass('active');  

        if(counter == last_counter){
            $('#step-next-save').text('Save');
        }else if(counter <= last_counter){
            $('#step-next-save').text('Next');
        }
    }
    
    $('#step-next-save').click(function(){
        if(counter < last_counter){
            counter = counter+1;
        }
        backNext(counter);
    });

    $('#step-back').click(function(){
        if(counter > 0){
            counter = counter-1;
        }
        backNext(counter); 
    });
});*/

$(document).ready(function(){
    $(".datetimepicker").datetimepicker({
        format: "dd MM yyyy",
        autoclose: true,
        todayBtn: true,
        minView : 2,
        pickerPosition: "bottom-left"
    });

    $('.collapse-minus').click(function(){
        if($(this).text() == '-'){
            $(this).parent().next('.step').hide();   
            $(this).text('+'); 
        }else{
            $(this).parent().next('.step').show();
            $(this).text('-');    
        }
    });

    $("#consolidationForm").validate();
});