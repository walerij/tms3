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
  
  setInterval(nowclock1, 1000);
});

$("#clock1").ready( function()
{
    
     setInterval(nowclock1, 1000);
    
});

function nowclock1()
{
     $("#clock1").html(Date()); 
}

