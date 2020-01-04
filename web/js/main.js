
$("#messView").ready( function()
{
    
    setInterval(update, 1000);
    
});



$("[/mess/index]").onbeforeunload(function() {
  //return "Handler for .unload() called.";
  alert("Пока");
});



function update()
{
    $.ajax({
	url: '/mess/update',         /* Куда пойдет запрос */
	method: 'get',             /* Метод передачи (post или get) */
	dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
	data: {text: 'Текст'},     /* Параметры передаваемые в запросе. */
	success: function(res){   /* функция которая будет выполнена после успешного запроса.  */
		//alert(res);            /* В переменной data содержится ответ от index.php. */
                $("#messView").html(' '+res);
	},
         error: function(jqXHR, exception){
                alert('Error!'+jqXHR.responseText);
            }
});
}

