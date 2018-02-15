var numfechas = 4;
$('#form-template').submit(function( event ) {
  event.preventDefault();
  requestData();

});
$('#more').click(function( event ) {
 event.preventDefault();    
 numfechas++;
 $('#data').append('<div id="date-'+numfechas+'" class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><div class="form-group"><label class="control-label">Fecha '+numfechas+'</label><input type="date" class="dates form-control" name="date-'+numfechas+'" required></input></div></div>');
 $('#data').append('<div id="number-'+numfechas+'" class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><div class="form-group"><label class="control-label">Días a sumar</label><input type="number" class="numbers form-control" name="number-'+numfechas+'" required></input></div></div>');
});
$('#delete').click(function( event ) {
    event.preventDefault();
    $('#date-'+numfechas).remove();
    $('#number-'+numfechas).remove();
    if(numfechas>4){
        numfechas--;    
    }
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

    if(validate(dates, numbers)){
        send_request(dates, numbers);
    }
}
function validate(d, n){
    if(d.length != n.length){
        alert('error, debe ingresar la misma cantidad de números que fechas');
        return false;
    }
    for(i =0; i<n.length; i++){
      if (isNaN(n[i])){
        alert("error, por favor solo ingrese numeros en los campos a sumar");
        return false;
        }
    }
    for(i =0; i<d.length; i++){
       var RegExPattern = /^\d{2,4}\-\d{1,2}\-\d{1,2}$/;
      if (!(d[i].match(RegExPattern)) || (d[i] == '')) {
        alert('error, ingrese un campo de fecha válido '+d[i]);
        return false;
      } 
}
     

 return true;   
}

function send_request(dates, numbers){
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
                   $('.content').css("display", "block");
                   $.each(data.dates, function(key, value){
                     $('#result').append("<li class='data_view'>"+value+"</li>");
                   });
                }
                $("#modal").modal();
            }
        }); 
}
    

