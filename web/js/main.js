$("#tb").on('click', function()
       {
        
                setInterval(nowclock, 1000);
        
       });


function nowclock()
  {
       $("#clock").html(Date());
  }



$('a[href="/mess/index"]').click(function()
{
    
    alert('test');
});

$('a[href="/mess/index"]').unload(function(){ 
  alert("Пока, пользователь!"); 
});