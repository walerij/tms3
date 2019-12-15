$("#tb").on('click', function()
       {
        
                setInterval(nowclock, 1000);
        
       });


function nowclock()
  {
       $("#clock").html(Date());
  }



$('#button2').click(function()
{
  
    upd1();
});

$("#clock1").ready( function()
{
    
     setInterval(nowclock1, 1000);
    
});

function nowclock1()
{
     $("#clock1").html(Date()); 
}

function update()
{
    
    //var data = $(this).serialize();
    var data = "name=Andrew&nickname=Aramis";
    //alert(data);
        $.ajax({
            url: '/mess/update',
            type: 'POST',
            data: data,
            success: function(res){
                alert(res);
            },
            error: function(){
                alert('Error!');
            }
        });
        return false;
}


function upd1()
{
    $.ajax({
	url: '/mess/update',         /* Куда пойдет запрос */
	method: 'get',             /* Метод передачи (post или get) */
	dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
	data: {text: 'Текст'},     /* Параметры передаваемые в запросе. */
	success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
		alert(data);            /* В переменной data содержится ответ от index.php. */
	},
         error: function(jqXHR, exception){
                alert('Error!'+jqXHR.responseText);
            }
});
}

