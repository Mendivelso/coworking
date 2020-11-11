  $(function () {

    // Mostrar mensaje si el envio es correcto o tiene errores
    /*$('#usuarios').parsley().on('field:validated', function() {
      var ok = $('.parsley-error').length === 0;
      $('.bs-callout-info').toggleClass('hidden', !ok);
      $('.bs-callout-warning').toggleClass('hidden', ok);
    })*/

    $('#Lugares').on('submit', function(event){



     event.preventDefault();
     if($('#Lugares').parsley().isValid())
     {
       var vData = new FormData(document.getElementById("Lugares"));
       var Tab = $('#txtTab').val();


       if (Tab == 0) {
          var vurl = "backend/datos/controller/LugaresController.php";

       }else if (Tab == 1){
          var vurl = "../../datos/controller/LugaresController.php";
       }else{
          var vurl = "../../datos/controller/LugaresController.php";
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
             $('#Lugares').parsley().reset();
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

  /***************************************************************/
  /*               CARGA DATOS DE USUARIO                          */
  /***************************************************************/
  function perfil(Id,Tab){
    /* Realiza conexión con el servidor */
    var vId = Id;
    var vTab = Tab;

    var vurl = "";
    if (vTab == 0) {
      var vurl = "../../datos/controller/usuariosController.php";
    }else{
      var vurl = "../../datos/controller/usuariosController.php";
    }
    if(vId != 0){

      $.ajax({
        data: {"accion":"single", "pId":vId},
        type: "POST",
        datatype: "json",
        url: vurl,
      })

      .done(function(data){
        if (data.success) {
          $('#txtDoc').val(data.Cedula);
          $('#txtName').val(data.Nombre);
          $('#txtDir').val(data.Direccion);
          $('#txtTel').val(data.Telefono);
          $('#txtEml').val(data.Email);
          $('#txtUser').val(data.Usuario);
          $("#upd").empty();
          $("#upd").append('<input type="hidden" id="img" name="accion" class="form-control" value="upd">');
          $('#txtId').val(vId);
        }
      })
      .fail(function(){
          alert("Ha ocurrido un problema");
      });
    }
  }


  /* VALIDACION PARA NUEVA CONTRASENA  */
  $(function () {
    // Mostrar mensaje si el envio es correcto o tiene errores


    $('#NuevaContrasena').on('submit', function(event){
     event.preventDefault();
     if($('#NuevaContrasena').parsley().isValid())
     {

      var vPass =  $('#txtPassU2').val();
      var vUserId =  $('#txtUserId').val();

      vData = {"accion": "chg", "pPass":vPass, "pId":vUserId}
      var vurl = "../../datos/controller/usuariosController.php";

      $.ajax({
       url:vurl,
       method:"POST",
       data:vData,
       beforeSend:function(){
        $('#submit').attr('disabled','disabled');
       },
       success:function(data)
       {
         if (data.success){
             // $('#usuarios')[0].reset();
             $('#usuarios').parsley().reset();
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


  /***************************************************************/
  /*               CARGA DATOS DE USUARIO                          */
  /***************************************************************/
  function VerUsuario(Id){
    /* Realiza conexión con el servidor */
    var vId = Id;
    var text = "";var text2 = "";
    var vurl = "";

    var vurl = "../../datos/controller/LugaresController.php";

    if(vId != 0){

      $.ajax({
        data: {"accion":"single", "pId":vId},
        type: "POST",
        datatype: "json",
        url: vurl,
      })

      .done(function(data){
        if (data.success) {
          $('#verUsuario').modal({keyboard: false});
          $("#ft").append('<img src="../../datos/'+data.Portada+'" width="90px">');

            if (data.Posicion == 1) {
                text = "PRINCIPAL";
            }else if(data.Posicion == 2){
              text = "GENERAL";
            }

            if (data.Status == 1) {
                text2 = "ACTIVO";
            }else if(data.Status == 0){
              text2 = "INACTIVO";
            }


          $('#st').html(text2);
          $('#nombre').html(data.Titulo);
          $('#tip').html(data.Tipo);
          $('#tel').html(data.Ubicacion);
          $('#des').html(data.Descripcion);
          $('#fot1').append('<img src="../../datos/'+data.Foto1+'" width="90px">');
          $('#fot2').append('<img src="../../datos/'+data.Foto2+'" width="90px">');
          $('#fot3').append('<img src="../../datos/'+data.Foto3+'" width="90px">');
          $('#fot4').append('<img src="../../datos/'+data.Foto4+'" width="90px">');
          $('#fot5').append('<img src="../../datos/'+data.Foto5+'" width="90px">');

          $('#reg').html(data.Created_date);
          $("#upd").empty();
          $("#upd").append('<input type="hidden" id="img" name="accion" class="form-control" value="upd">');
          $('#txtId').val(vId);
        }
      })
      .fail(function(){
          alert("Ha ocurrido un problema");
      });
    }
  }


  /***************************************************************/
  /*               CARGA DATOS DE USUARIO                          */
  /***************************************************************/
  function UpdatedUsuario(Id){
    /* Realiza conexión con el servidor */
    var vId = Id;
    var vurl = "";
    var Tipo = "";
    var vurl = "../../datos/controller/LugaresController.php";
    if(vId != 0){
      $.ajax({
        data: {"accion":"single", "pId":vId},
        type: "POST",
        datatype: "json",
        url: vurl,
      })
      .done(function(data){
        if (data.success) {

          Tipo = data.Tipo;
          $('#modal-UpdatedUser').modal({keyboard: false});


          
          $("#txtStatusup option[value="+ data.Status +"]").attr("selected",true);

          $("#txtTipoup option[value="+ Tipo +"]").attr("selected",true); 
           
          
          $('#txtNameup').val(data.Titulo);
          $('#txtUbiup').val(data.Ubicacion);
          $('#txtDescripup').val(data.Descripcion);
          

          $('#contIMG').empty();
          $('#contIMG').append('<P>FOTO DE PORTADA </p> <img src=../../datos/'+data.Portada+' width="100px" >');

          $('#contGal1').empty();
          $('#contGal1').append('<P>FOTO 1 Galeria  </p> <img src=../../datos/'+data.Foto1+' width="100px" >');

          $('#contGal2').empty();
          $('#contGal2').append('<P>FOTO 2 Galeria  </p> <img src=../../datos/'+data.Foto2+' width="100px" >');

          $('#contGal3').empty();
          $('#contGal3').append('<P>FOTO 3 Galeria  </p> <img src=../../datos/'+data.Foto3+' width="100px" >');

          $('#contGal4').empty();
          $('#contGal4').append('<P>FOTO 4 Galeria  </p> <img src=../../datos/'+data.Foto4+' width="100px" >');

          $('#contGal5').empty();
          $('#contGal5').append('<P>FOTO 5 Galeria  </p> <img src=../../datos/'+data.Foto5 +' width="100px" >');

          $('#txtIdup').val(vId);

          
        }
      })
      .fail(function(){
          alert("Ha ocurrido un problema");
      });
    }
  }






$("#NuevoUsuario").click(function(){
    $("#Lugares")[0].reset();
   $('#modal-User').modal({keyboard: false});

 });






  /***************************************************************/
  /*                 Elimina servicio                    */
  /**************************************************************/
  function DelRegistro(Id){
    /* Realiza conexión con el servidor */
    var vId = Id;

    if (!confirm("Esta seguro de ElIMINAR éste registro?")) {
      return;
    };


    var vurl = "../../datos/controller/LugaresController.php";
    if(vId != 0){
      $.ajax({
        data: {"accion":"del", "pId":vId},
        type: "POST",
        datatype: "json",
        url: vurl,
      })
      .done(function(data){
        if (data.success) {

           bootbox.alert(data.message, function() {
               document.location.href = "index.php";
           });

        }else{

            bootbox.alert(data.message, function() {
                document.location.href = "index.php";
            });
        }
      })
      .fail(function(){
          alert("Ha ocurrido un problema");
      });
    }

  }



  $("#refresh").click(function(){
      location.reload(true);
  });




  $('#Lugaresup').on('submit', function(event){
   event.preventDefault();
   if($('#Lugaresup').parsley().isValid())
   {
     var vData = new FormData(document.getElementById("Lugaresup"));
     var Tab = $('#txtTab').val();

     if (Tab == 0) {
        var vurl = "backend/datos/controller/LugaresController.php";

     }else if (Tab == 1){
        var vurl = "../../datos/controller/LugaresController.php";
     }else{
        var vurl = "../../datos/controller/LugaresController.php";
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
           $('#Lugaresup').parsley().reset();
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









  $(document).ready(function(){
    $('#Date1').val("");

      $("#txtTipoG").change(function() {
        var tipo =  $( this ).val();

        if(tipo == "Video"){
          $("#cont-iframe").append('<textarea rows="4" cols="50" placeholder="Iframe video youtube" class="form-control" data-parsley-required-message="Campo requerido" required="" name="txtUrl" id="txtUrl"></textarea>');
          $("#cont-imagen").empty();

        }else{
          $("#cont-iframe").empty();
          $("#cont-imagen").append('<input type="file" class="form-control" placeholder="Adjunte archivo"  data-parsley-required-message="Adjunte archivo" required="false" name="txtImg" id="txtImg"><span class="glyphicon glyphicon-file form-control-feedback"></span>');
        }

      });

    // bootbox.alert({
    //     message: "This is an alert with a callback!",
    //     size: 'small',
    //     className: 'rubberBand animated',

    //     callback: function () {
    //        document.location.href = "index.php";
    //     }
    // })



  });