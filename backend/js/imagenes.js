  $(function () {
    // Mostrar mensaje si el envio es correcto o tiene errores
    /*$('#usuarios').parsley().on('field:validated', function() {
      var ok = $('.parsley-error').length === 0;
      $('.bs-callout-info').toggleClass('hidden', !ok);
      $('.bs-callout-warning').toggleClass('hidden', ok);
    })*/

    $('#Imagen').on('submit', function(event){
     event.preventDefault();

     if($('#Imagen').parsley().isValid())
     {
       var vData = new FormData(document.getElementById("Imagen"));
       var Tab = $('#txtTab').val();

       if (Tab == 0) {
          var vurl = "../backend/datos/controller/imagenesController.php";
       }else if (Tab == 1){
          var vurl = "../../datos/controller/imagenesController.php";
       }else{
          var vurl = "../../datos/controller/imagenesController.php";
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
             $('#Imagen').parsley().reset();
             $('#submit').removeAttr("disabled");
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
    var vimg = '';
    
    var vurl = "";

    var vurl = "../../datos/controller/imagenesController.php";

    if(vId != 0){

      $.ajax({
        data: {"accion":"single", "pId":vId},
        type: "POST",
        datatype: "json",
        url: vurl,
      })

      .done(function(data){
        if (data.success) {

          if(data.ImagenG == null){
            vimg = '<p> NO REGISTRA</p>';
          }else{
            vimg = '<img src="../../datos/'+data.ImagenG+'" width="90px">';
          }




          $('#verUsuario').modal({keyboard: false});
          $('#st').html(data.Status);
          $('#st2').html(data.Id);
          $('#nombre').html(data.Titulo);
          $('#Email').html(data.Tipo);

          
          $('#I1').empty();
          $('#I1').append('<img src="../../datos/'+data.Imagen+'" width="90px">');

          $('#I2').empty();
          $('#I2').append(vimg);


          $('#CatG').html(data.Updated_date);
          $('#reg').html(data.Created_date);

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
    var vImg = '';
    var vTipo = '';
    var vurl = "../../datos/controller/imagenesController.php";
    if(vId != 0){
      $.ajax({
        data: {"accion":"single", "pId":vId},
        type: "POST",
        datatype: "json",
        url: vurl,
      })
      .done(function(data){
        if (data.success) {
          
          
          vTipo = "'"+ data.Tipo+ "'";
          //console.log('valor ' +vTipo);

          $('#modal-UpdatedUser').modal({keyboard: false}); 

            
            
            if(data.ImagenG == null){
              vImg = '<P style="color:red">*no registra Imagen* </p>';
            }else{
              vImg = '<P>Imagen Actual  </p> <img src=../../datos/'+data.ImagenG+' width="100px" >';
            }

          $("#txtStatusup option[value="+ data.Status +"]").attr("selected",true);   
          $("#txtTipoup option[value="+ vTipo +"]").attr("selected",true);   


          $('#txtTitleup').val(data.Titulo);
          
          $('#Ima').empty();
          $('#Ima').append('<P>Imagen Actual  </p> <img src=../../datos/'+data.Imagen+' width="100px" >');

          $('#ImaS').empty();
          $('#ImaS').append(vImg);
          
          $('#txtIdup').val(vId);
        }
      })
      .fail(function(){
          alert("Ha ocurrido un problema");
      });
    }
  }



  
  /*VALIDA FORMULACION PARA ACTUALIZAR*/
  $('#usuariosup').on('submit', function(event){
    event.preventDefault();
    if($('#usuariosup').parsley().isValid())
    {
      var vData = new FormData(document.getElementById("usuariosup"));
      var Tab = $('#txtTab').val();
 
      if (Tab == 0) {
         var vurl = "backend/datos/controller/imagenesController.php";
 
      }else if (Tab == 1){
         var vurl = "../../datos/controller/imagenesController.php";
      }else{
         var vurl = "../../datos/controller/imagenesController.php";
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


    var vurl = "../../datos/controller/imagenesController.php";
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

  
$("#NuevoRegistro").click(function(){
  $("#Imagen")[0].reset();
 $('#modal-Registros').modal({keyboard: false});

});









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
            url: "../../datos/controller/inscripcionesController.php",
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




    /***************************************************************/
    /*                 Elimina servicio                    */
    /**************************************************************/
    /*function DelRegistro(Id){
       Realiza conexión con el servidor
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

    }*/

