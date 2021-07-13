
var inicio=function () {
	$(".cantidad").keyup(function(e){
		if($(this).val()!=''){
			if(e.keyCode==13){
				var id=$(this).attr('data-id');
				var precio=$(this).attr('data-precio');
				var cantidad=$(this).val();
				//alert(""+cantidad);
				//$(this).parentsUntil('.producto').find('.subtotal').text((precio*cantidad));
					$.post('js1/modificarDatos.php',{
						Id:id,
						Precio:precio,
						Cantidad:cantidad
					},function(e){
							//$("#total").text(e);
							location.href="./carrito.php";
					});
			}
		}
	});
	$(".eliminar").click(function(e){
		e.preventDefault();
		var id=$(this).attr('data-id');
		$(this).parentsUntil('.producto').remove();
		$.post('js1/eliminar.php',{
			Id:id
		},function(a){
			
			if(a=='0'){
				location.href="./Principal1.php";
			}
			else
			{
				location.href="./carrito.php";
			}
		});

	});
	$("#formulario").submit(function(evento){
		//alert("se omitio el evento");
		$.get('./compras/compras.php',function(e){
			alert("");
		}).fail(function (){
			evento.preventDefault();	
		});
	});
}	
$(document).on('ready',inicio);