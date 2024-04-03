
document.getElementById("cambio_clave"). onclick = function(){
    if(document.getElementById('clave1').value != "" && document.getElementById('clave2').value != ""){
    if(document.getElementById('clave1').value == document.getElementById('clave2').value){
    Swal.fire({
        title: 'Seguridad',
        html:                     
          '<span id="validarcontrasena1"></span>' +
          '<label for="message-text" style="color: rgb(21, 64, 109);" class="col-form-label">Informacion de contraseña:</label><br>'+
          '<span id="v1" style="font-size:14px"></span><div class="input-group mt-1"><input id="input1" maxlength="15" class="form-control mb-2" type="password" placeholder="Ingrese la contraseña actual"/><div class="input-group-append"><button id="show_password" class="btn border border-left-0 mb-2" type="button" onclick="mostrarPassword()"><i class="fas fa-low-vision" style="font-size:16px; color:#8C8F92"></i></div></div>',
        confirmButtonColor: '#007BFF',
        confirmButtonText: "Siguiente",
        focusConfirm: true,
        preConfirm: () => {
            if(document.getElementById('input1').value != ""){
              var formData = new FormData();
              formData.append("accion", "verificar_perfil");
              formData.append("clave_actual", document.getElementById("input1").value);
              formData.append("cedula", document.getElementById("cedula_usuario").value);
              $.ajax({
                url: '',
                type: 'POST',
                contentType: false,
                data:formData,
                processData: false,
                cache: false,
                }).done(function (result) {
                    alert(result);
                    if(result==1){
                        cambiarcontraseña( 
                            document.getElementById('clave1').value,
                            document.getElementById("cedula_usuario").value
                            );
                        return true;
                    }else if(result == 0){
                        document.getElementById("validarcontrasena1").innerHTML = '<div class="alert alert-dismissible fade show pl-5" style="background:#9D2323; color:white" role="alert">La contraseña actual no coincide.<i class="far fa-backspace p-0 m-0 d-none" id="cerraralert" data-dismiss="alert" aria-label="Close"></i></div>';
                        setTimeout(function () {
                            $("#cerraralert").click();
                          }, 3000);
                        return false;
                    }else{
                        document.getElementById("validarcontrasena1").innerHTML = '<div class="alert alert-dismissible fade show pl-5" style="background:#9D2323; color:white" role="alert">Error BD.<i class="far fa-backspace p-0 m-0 d-none" id="cerraralert" data-dismiss="alert" aria-label="Close"></i></div>';
                        setTimeout(function () {
                            $("#cerraralert").click();
                          }, 3000);
                        return false;
                    }
                });
                return false;
          }else{
            document.getElementById("validarcontrasena1").innerHTML = '<div class="alert alert-dismissible fade show pl-5" style="background:#9D2323; color:white" role="alert">Complete los campos solicitados.<i class="far fa-backspace p-0 m-0 d-none" id="cerraralert" data-dismiss="alert" aria-label="Close"></i></div>';
            setTimeout(function () {
                $("#cerraralert").click();
              }, 3000);
            return false;
          }
        }
      })
    }else{
        document.getElementById("validacion_clave").innerHTML = '<div class="d-flex justify-content-center"><div class="alert alert-dismissible fade show col-6 d-flex justify-content-center" style="background:#9D2323; color:white" role="alert">La contraseña no coincide.<i class="far fa-backspace p-0 m-0 d-none" id="cerraralert" data-dismiss="alert" aria-label="Close"></i></div></div>';
        setTimeout(function () {
            $("#cerraralert").click();
          }, 3000);
        return false;
    }
}else{
    document.getElementById("validacion_clave").innerHTML = '<div class="d-flex justify-content-center"><div class="alert alert-dismissible fade show col-6 d-flex justify-content-center" style="background:#9D2323; color:white" role="alert">Complete los campos.<i class="far fa-backspace p-0 m-0 d-none" id="cerraralert" data-dismiss="alert" aria-label="Close"></i></div></div>';
    setTimeout(function () {
        $("#cerraralert").click();
      }, 3000);
    return false;
}
}

function mostrarPassword() {
    var cambio = document.getElementById("input1");
    if (cambio.type == "password") {
      cambio.type = "text";
      $(".icon").removeClass("fa fa-eye-slash").addClass("fa fa-eye");
    } else {
      cambio.type = "password";
      $(".icon").removeClass("fa fa-eye").addClass("fa fa-eye-slash");
    }
  }


  function cambiarcontraseña(contrasena,cedula){
    alert(contrasena);
    alert(cedula);
    var formData = new FormData();
    formData.append("accion", "cambiar_pasword");
    formData.append("nueva_clave", contrasena);
    formData.append("cedula", cedula);
    var toastMixin = Swal.mixin({
      showConfirmButton: false,
      width: 450,
      padding: '3.5em',
      timer: 2000,
      timerProgressBar: true,
    });
    $.ajax({
        url: '',
        type: 'POST',
        contentType: false,
        data:formData,
        processData: false,
        cache: false,
        }).done(function (result){
            alert(result)
          var res = JSON.parse(result);
          if (res.estatus == 1) {
            toastMixin.fire({
              title: res.title,
              text: res.message,
              icon: res.icon,
            });
            setTimeout(function () {
                window.location.reload();
              }, 3000);
          } else {
            toastMixin.fire({
              text: res.message,
              title: res.title,
              icon: res.icon,
            });
          }
    });
  }  