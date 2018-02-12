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
               alert(data);
            }
        }); 
}
