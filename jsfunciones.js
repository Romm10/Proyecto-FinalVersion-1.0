function MostrarPrecio(){
var valor=document.getElementsByName("ruta");
alert(document.getElementsByName("ruta").value);
}

$(document).ready(function(){
	
//alert("Hola Mundo");
	
	$(document).on('change', '#ruta', function(event) {
     //alert($("#ruta").val());
	 //alert("Has seleccionado");
	 var idruta= $("#ruta").val();
	 
	 var parametros = {
                "id" : idruta
        };
        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'MostrarPrecio.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                beforeSend: function () {
                        $("#mPrecio").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#mPrecio").html(response);
                }
        });

 var parametrosH = {
                "id" : idruta
        };
        $.ajax({
                data:  parametrosH, //datos que se envian a traves de ajax
                url:   'MostrarHorario.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                beforeSend: function () {
                        $("#mHorarios").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#mHorarios").html(response);
                }
        });

	 //$("#mPrecio").load("MostrarPrecio.php");
	 //$("#mHorarios").load("MostrarHorario.php");
	 
});
	

	
});
