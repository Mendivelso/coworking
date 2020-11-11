  /*document.addEventListener("DOMContentLoaded", () => {
    let form = document.getElementById('form_subir');
    form.addEventListener("submit", function(event){
        event.preventDefault();
        subir_archivos(this);
    });

  });*/









  /*function subir_archivos(form){
    var barra_estado =  document.getElementById('barra_estado');
     var  span =  document.getElementById('span1');
      var boton_cancelar = document.getElementById('cancelar');
      var rta = document.getElementById('rta');

      barra_estado.classList.remove('barra_verde', 'barra_roja');

     let peticion = new XMLHttpRequest();
     // progreso
     peticion.upload.addEventListener("progress", (event) =>  {
        let porcentaje = Math.round((event.loaded / event.total) *100);
        console.log(porcentaje);
        barra_estado.style.width = porcentaje+ "%";
        span.innerHTML = porcentaje + "%";
     });

     // finalizado
     peticion.addEventListener("load", () => {
        barra_estado.classList.add('barra_verde');
        span.innerHTML = " Proceso Completado";

     });

    //enviar datos
    peticion.open('post', '../../datos/controller/contactosController.php');
    peticion.send( new FormData(form));
    // finalizado
    boton_cancelar.addEventListener("click", () => {
        peticion.abort();
        barra_estado.classList.remove('barra_verde');
        barra_estado.classList.add('barra_roja');
        span.innerHTML = " Proceso Cancelado";

    });

  }*/




  $(document).ready(function () {

      $('#submitButton').click(function () {

              $('#uploadForm').ajaxForm({

                  target: '#outputImage',
                  url: '../../datos/controller/contactosController.php',
                  beforeSubmit: function () {
                        $("#outputImage").hide();
                         if($("#uploadImage").val() == "") {
                             $("#outputImage").show();
                             $("#outputImage").html("<div class='errorc'>Choose a file to upload.</div>");
                      return false;
                  }
                      $("#progressDivId").css("display", "block");
                      var percentValue = '0%';

                      $('#progressBar').width(percentValue);
                      $('#percent').html(percentValue);
                  },

                  uploadProgress: function (event, position, total, percentComplete) {

                      var percentValue = percentComplete + '%';
                      $("#progressBar").animate({
                          width: '' + percentValue + ''
                      }, {
                          duration: 1000,
                          easing: "linear",
                          step: function (x) {
                          percentText = Math.round(x * 100 / percentComplete);
                              $("#percent").text(percentText + "%");
                          if(percentText == "100") {
                                 $("#outputImage").show();
                                $("#progressBar").addClass('barra_verde');
                                 $("#progressBar").html("CARGA COMPLETADA");


                          }
                          }
                      });
                  },
                  error: function (response, status, e) {
                      alert('Oops something went.');
                  },

                  complete: function (xhr) {
                      if (xhr.responseText && xhr.responseText != "error")
                      {
                            $("#outputImage").html(xhr.responseText);
                      }
                      else{
                          $("#outputImage").show();
                              $("#outputImage").html("<div class='errorc'>Problem in uploading file.</div>");
                              $("#progressBar").stop();
                      }
                  }
              });
      });
  });