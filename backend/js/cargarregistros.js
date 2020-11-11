 $(document).ready(function () {

      $('#submitButton').click(function () {

              $('#uploadForm').ajaxForm({

                  target: '#outputImage',
                  url: '../../datos/controller/resultadosController.php',
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

                  /*complete: function (xhr) {
                      if (xhr.responseText && xhr.responseText != "error")
                      {
                            $("#outputImage").html(xhr.responseText);
                      }
                      else{
                          $("#outputImage").show();
                              $("#outputImage").html("<div class='errorc'>Problem in uploading file.</div>");
                              $("#progressBar").stop();
                      }
                  }*/

                  complete: function (data) {
                      if (data.success)
                      {
                            //$("#outputImage").html(data.message);
                            alert("AQUI1 " +data.message);
                      }
                      else{
                          //$("#outputImage").show();
                              //$("#outputImage").html("<div class='errorc'>Problem in uploading file.</div>");
                              //$("#outputImage").html(data.message);
                              //$("#progressBar").stop();
                              alert("AQUI2 " +data.message);
                      }
                  }


              });
      });
  });