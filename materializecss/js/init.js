(function($){
  $(function(){

    $('.sidenav').sidenav();

  }); // end of document ready
})(jQuery); // end of jQuery name space

//para mostrar el menú desplegable
$(".dropdown-trigger").dropdown();

// para usar los tabs
$(document).ready(function(){
  $('.tabs').tabs();
});

//para mostrar el reloj timepicker
  $(document).ready(function(){
    $('.timepicker').timepicker();
  });
  
//para mostrar el calendario datepicker
$(document).ready(function(){
  $('.datepicker').datepicker();
});

 // para hacer grande la imagen
/* $(document).ready(function(){
  $('.materialboxed').materialbox();
});*/

// Para el carrusel
/*$(document).ready(function(){
  $('.carousel').carousel();
});*/

//para calcular el precio de más boletos
$(document).ready(function(){
  $("#mas").click(function(){    
    var cantidad = parseFloat($('#txtCantidadBoleto').val()) + 1;
    $('#txtCantidadBoleto').val(cantidad);
    
    var total = parseFloat($('#txtCantidadBoleto').val()) * parseFloat($('#txtPrecioBoleto').val());
    $('#txtTotal').val(total.toFixed(2));
  });
});

//para calcular el precio de menos boletos
$(document).ready(function(){
  $("#menos").click(function(){    
    var cantidad = parseFloat($('#txtCantidadBoleto').val()) - 1;
    $('#txtCantidadBoleto').val(cantidad);
    
    var total = parseFloat($('#txtCantidadBoleto').val()) * parseFloat($('#txtPrecioBoleto').val());
    $('#txtTotal').val(total.toFixed(2));
    if ($('#txtCantidadBoleto').val() <= 0) {
      alert("¡Debe comprar al menos 1 boleto!");
      $('#txtCantidadBoleto').val(1);
      
      $('#txtTotal').val($('#txtPrecioBoleto').val());
    }
  });
});


  // para el mensaje de disponible o reservado
  $(document).ready(function(){
    $('.tooltipped').tooltip();
  });
  

