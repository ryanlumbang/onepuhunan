$(document).ready(function(){
    var counter = 0;
    last_counter = $('#form-vill .step').length -1;
    $('.datepicker').datetimepicker();

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
});