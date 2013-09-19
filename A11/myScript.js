
$(document).ready(function(){
    $('dd').hide();
    
       $('dt').on('click',function(){
           $(this).next().slideToggle();
      });

                  

});

