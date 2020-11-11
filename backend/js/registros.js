  $(function () {
    // Mostrar mensaje si el envio es correcto o tiene errores
    /*$('#usuarios').parsley().on('field:validated', function() {
      var ok = $('.parsley-error').length === 0;
      $('.bs-callout-info').toggleClass('hidden', !ok);
      $('.bs-callout-warning').toggleClass('hidden', ok);
    })*/

    $('#registros').on('submit', function(event){
     event.preventDefault();
     if($('#registros').parsley().isValid())
     {
       var vData = new FormData(document.getElementById("registros"));
       var Tab = $('#txtTab').val();

       if (Tab == 0) {
          var vurl = "backend/datos/controller/contactosController.php";

       }else if (Tab == 1){
          var vurl = "../../datos/controller/contactosController.php";
       }else{
          var vurl = "../../datos/controller/contactosController.php";
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
             $('#registros').parsley().reset();
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

    var vurl = "";

    var vurl = "../../datos/controller/contactosController.php";

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
          $('#st').html(data.Status);
          $('#st2').html(data.Status2);
          $('#cedu').html(data.Cedula);
          $('#nombre').html(data.Nombre_completo);
          $('#tel').html(data.Celular);
          $('#mail').html(data.Email);
          $('#usu').html(data.Programa);
          $('#per').html(data.Origen_Campana);
          $('#cId').html(data.Campana_Id);
          $('#dir').html(data.Mensaje);
          $('#Asig').html(data.Asignado_a);
          $('#DateAsig').html(data.Fecha_asignado);
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
    var vurl = "../../datos/controller/contactosController.php";
    if(vId != 0){
      $.ajax({
        data: {"accion":"single", "pId":vId},
        type: "POST",
        datatype: "json",
        url: vurl,
      })
      .done(function(data){
        if (data.success) {
          $('#modal-UpdatedUser').modal({keyboard: false});
          $("#txtStatusup option[value="+ data.Status +"]").attr("selected",true);
          $('#txtDocup').val(data.Cedula);
          $('#txtNameup').val(data.Nombre_completo);
          $('#txtDirup').val(data.Direccion);
          $('#txtTelup').val(data.Celular);
          $('#txtEmlup').val(data.Email);
          $('#txtProgramaup').val(data.Programa);
          $('#txtComentup').val(data.Mensaje);
          $('#txtOrigenup').val(data.Origen_Campana);
          $('#txtIdup').val(vId);
        }
      })
      .fail(function(){
          alert("Ha ocurrido un problema");
      });
    }
  }






$("#NuevoRegistro").click(function(){
    $("#registros")[0].reset();
   $('#modal-Registros').modal({keyboard: false});

 });


  /*VALIDA FORMULACION PARA ACTUALIZAR*/
  $('#usuariosup').on('submit', function(event){
   event.preventDefault();
   if($('#usuariosup').parsley().isValid())
   {
     var vData = new FormData(document.getElementById("usuariosup"));
     var Tab = $('#txtTab').val();

     if (Tab == 0) {
        var vurl = "backend/datos/controller/contactosController.php";

     }else if (Tab == 1){
        var vurl = "../../datos/controller/contactosController.php";
     }else{
        var vurl = "../../datos/controller/contactosController.php";
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
           $('#usuariosup').parsley().reset();
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


  /***************************************************************/
  /*                 Elimina servicio                    */
  /**************************************************************/
  function DelRegistro(Id){
    /* Realiza conexión con el servidor */
    var vId = Id;

    if (!confirm("Esta seguro de ElIMINAR éste registro?")) {
      return;
    };


    var vurl = "../../datos/controller/contactosController.php";
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


  /* ELIMINAR VARIOS REGISTROS */
    function DelRegistroVarios(Id){
      /* Realiza conexión con el servidor */
      var id = [];
      $('.update_registro:checked').each(function(i){
          id[i] = $(this).val();
        });
      if(id.length == 0){
          // alert("No hay registros seleccionados para eliminar");
          swal("Error", "No hay registros seleccionados para eliminar", "error");
      }else{
        // if (!confirm("Esta seguro de ElIMINAR los registros seleccionados")) {
       //      return;
       //   }
       swal({
         title: "Eliminar Registros",
         text: "Esta seguro de eliminar los registros",
         type: "warning",
         showCancelButton: true,
         confirmButtonClass: 'btn-danger',
         cancelButtonText: 'Cancelar',
         confirmButtonText: 'Eliminar',
         closeOnConfirm: false,
         closeOnCancel: false

       },
       function(isConfirm){
        if (isConfirm){
          $.ajax({
            data: {"accion":"delV", "pId":id},
            type: "POST",
            datatype: "json",
            url: "../../datos/controller/contactosController.php",
          })
          .done(function(data){
             swal({title: "Deleted!",
                   text: data.message,
                   type: "success"
             },
             function(isConfirm){document.location.href = "index.php";}
             );

          })
          .fail(function(){
              alert("Ha ocurrido un problema");
          });

        } else {
              swal({title: "Cancelado!",
                    text: "Your imaginary file has been deleted.",
                    type: "error"
              });
          }

       });

      }
    }


  $("#refresh").click(function(){
      location.reload(true);
  });








  $(document).ready(function(){
    $('#Date1').val("");

    $("#select_all").change(function(){  //"select all" change
        var status = this.checked; // "select all" checked status
        $('input[type=checkbox]').each(function(){ //iterate all listed checkbox items
            this.checked = status; //change ".checkbox" checked status
        });
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