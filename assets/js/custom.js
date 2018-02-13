$('#form-template').submit(function( event ) {
  event.preventDefault();
  requestData();

});
function requestData(){
    var numbers = [];
    var dates = [];
    $(".numbers").each(function(){
                numbers.push($(this).val());
    });
    $(".dates").each(function(){
                dates.push($(this).val());
    });
    $.ajax({
            type: "POST",  
            dataType: 'json',
            url: "/fechas/form_process",  
            data: {
                dates : dates,
                numbers:numbers
            },
            success:function(data) {
                $('#result').empty();

                if(typeof data == 'string'){
                    $('#result').append("<li class='data_view'>"+data+"</li>");
                }else{
                   data = [data];
                   $('.content').css("display", "block");
                   $.each(data[0], function(key, value){
                     $('#result').append("<li class='data_view'>"+value+"</li>");
                   });
                }
                $("#modal").modal();
            }
        }); 
}
