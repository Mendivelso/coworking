  $(function () {
    // Mostrar mensaje si el envio es correcto o tiene errores
    /*$('#usuarios').parsley().on('field:validated', function() {
      var ok = $('.parsley-error').length === 0;
      $('.bs-callout-info').toggleClass('hidden', !ok);
      $('.bs-callout-warning').toggleClass('hidden', ok);
    })*/

    $('#contact-form').on('submit', function(event){
     event.preventDefault();

     if($('#contact-form').parsley().isValid())
     {
       var vData = new FormData(document.getElementById("contact-form"));
       var Tab = $('#txtTab').val();


       if (Tab == 0) {
          var vurl = "backend/datos/controller/contactosController.php";
       }else if (Tab == 1){
          var vurl = "../backend/datos/controller/contactosController.php";
       }else{
          var vurl = "../../datos/controller/usuariosController.php";
       }

      $.ajax({
       url:vurl,
       method:"POST",
       data:vData,
       contentType: false,
       processData: false,
       beforeSend:function(){
        $('#submit').attr('disabled','disabled');
       },
       success:function(data)
       {
         if (data.success){
             // $('#usuarios')[0].reset();
             $('#contact-form').parsley().reset();
             $('#submit').removeAttr("disabled")
             // $('#submit').val('Submit');

             bootbox.confirm({
                 message: data.message,
                 callback: function (result) {
                     document.location.href = "index.php";
                 }
             });



             }
             else{
             bootbox.confirm({
                 message: data.message,
                 callback: function (result) {
                     document.location.href = "index.php";
                 }
             });
             // document.getElementById("login").reset();
             }
         }
      });
     }else{
       alert("paila");
     }
    });

  });








  $(function () {
    // Mostrar mensaje si el envio es correcto o tiene errores
    /*$('#usuarios').parsley().on('field:validated', function() {
      var ok = $('.parsley-error').length === 0;
      $('.bs-callout-info').toggleClass('hidden', !ok);
      $('.bs-callout-warning').toggleClass('hidden', ok);
    })*/

    $('#contact-form-footer').on('submit', function(event){
     event.preventDefault();

     if($('#contact-form-footer').parsley().isValid())
     {
       var vData = new FormData(document.getElementById("contact-form-footer"));
       var Tab = $('#txtTab').val();


       if (Tab == 0) {
          var vurl = "backend/datos/controller/contactosController.php";
       }else if (Tab == 1){
          var vurl = "../backend/datos/controller/contactosController.php";
       }else{
          var vurl = "../../datos/controller/usuariosController.php";
       }

      $.ajax({
       url:vurl,
       method:"POST",
       data:vData,
       contentType: false,
       processData: false,
       beforeSend:function(){
        $('#submit').attr('disabled','disabled');
       },
       success:function(data)
       {
         if (data.success){
             // $('#usuarios')[0].reset();
             $('#contact-form-footer').parsley().reset();
             $('#submit').removeAttr("disabled")
             // $('#submit').val('Submit');

             bootbox.confirm({
                 message: data.message,
                 callback: function (result) {
                     document.location.href = "index.php";
                 }
             });



             }
             else{
             bootbox.confirm({
                 message: data.message,
                 callback: function (result) {
                     document.location.href = "index.php";
                 }
             });
             // document.getElementById("login").reset();
             }
         }
      });
     }else{
       alert("paila");
     }
    });

  });