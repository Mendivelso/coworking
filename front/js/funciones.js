

function NavActive($Id= ""){

    var vId = $Id;

    var URLactual = window.location;

    if(URLactual == 'http://localhost/2020/work/espacios/'){
        $('#espacio').addClass('active');
    }else if (URLactual == 'http://localhost/2020/work/tarifas/'){
        $('#tarifa').addClass('active');
    }else if (URLactual == 'http://localhost/2020/work/servicios/'){
        $('#oferta').addClass('active');
    }else if (URLactual == 'http://localhost/2020/work/eventos/'){
        $('#evento').addClass('active');
    }else if (URLactual == 'http://localhost/2020/work/blog/'){
        $('#bl').addClass('active');
    }


    



}





$(document).ready(function(){

    NavActive();
  
  });


