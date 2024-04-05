
<!DOCTYPE html>
<html lang="en">

<?php include_once "bin/component/head.php";?>
<style>
  .boton-circular {
    display: inline-block;
    width: 30px;
    height: 30px;
    background-color: #229954;
    color: #fff;
    border-radius: 50%;
    text-align: center;
    line-height: 25px;
    font-size: 12px;
    cursor: pointer;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
  }

  .boton-circular:hover {
    background-color: #145A32;
  }
</style>
<body>
                      <?php include_once "bin/component/header.php";?>

                      <?php include_once "bin/component/sidebar.php";?>
                      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
<main id="main" class="main p-0" style="background:#f8d7da">
<input type="hidden" name="id_expediente_user" id="id_expediente_user"/>
  <div class="pagetitle">
  <div class="d-flex justify-content-between align-items-end">
    <?php if($_SESSION['usuario']["nombre_rol"] == "Supervisor"  || $_SESSION['usuario']["nombre_rol"] == "Super Usuario" ) { ?>
    <button type="button" class="btn m-2" style="background:#15406D;color:white" id="nuevo">
      Registrar Expediente
    </button>
    <?php }else{ ?>  
    <div></div>
  <?php } ?>   
    <div class="py-3 px-4" style="border-radius: 0 0 0 50%; background:#FFC300;">
      <h1 class="m-0">Lista de Expedientes de la Div. de Fiscalización</h1>
    </div>
  </div>
      <section class="section m-2">
        <div class="row">
          <div class="col-lg-12">
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="titulo"></h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                      <div class="modal-body">
                        <form class="row g-3 needs-validation" novalidate>
                          <input type="hidden" name="accion" class="form-control" id="accion">
                          <input type="hidden" name="id" class="form-control" id="id_expedient_user">
                          <input type="hidden" name="id" class="form-control" id="id_expediente">
                          <div class="col-12">
                            <label for="supervisor" class="form-label">Supervisor</label>
                            <input type="text" name="supervisor" class="form-control" id="supervisor" value ="<?php echo $_SESSION['usuario']["cedula"] . ", ". $_SESSION['usuario']["nombre_apellido"] ?>">
                            <spam id="ssupervisor"></spam>
                          </div>
                          <div class="col-12">
                            <label for="NroProvidencia" class="form-label">Nro de Providencia</label>
                            <input type="Text" name="Nro" class="form-control" id="NroProvidencia" required>
                            <spam id="sNroProvidencia"></spam>
                          </div>
                          <div class="col-12">
                            <label for="SuPa" class="form-label">Sujeto Pasivo</label>
                            <input type="Text" name="Sujeto Pasivo" class="form-control" id="SuPa" required>
                            <spam id="sSuPa"></spam>
                          </div>
                          <div class="col-12">
                            <label for="yourRifC" class="form-label">Rif</label>
                            <input type="Text" name="RifC" class="form-control" id="yourRifC" required>
                            <spam id="syourRifC"></spam>
                          </div>
                          <div class="col-12">
                            <label for="DomiFI" class="form-label">Domicilio Fiscal</label>
                            <input type="Text" name="RifC" class="form-control" id="DomiFI" required>
                            <spam id="sDomiFI"></spam>
                          </div>
                          <div class="col-12">
                            <div class="input-group">
                              <label class="input-group-text" for="AddFiscal">Asignar fiscal</label>
                              <select class="form-select" id="AddFiscal">
                                <option value="0" selected>Seleccionar Fiscal</option>
                                <?php foreach ($r2 as $key => $value) {?>
                                  <option value="<?=$value['id_usuario'];?>"><?=$value['nombre_user'];?></option>
                                <?php }?>
                              </select>
                            </div>
                            <spam id="sAddFiscal"></spam>
                          </div>
                          <div class="col-12">
                          <div class="input-group mb-3">
                            <label class="input-group-text" for="regis_select_division">División</label>
                            <select class="form-select" id="regis_select_division">
                              <option value="0" selected>Seleccionar división</option>
                              <?php foreach ($r3 as $key => $value) {?>
                                <option value="<?=$value['id'];?>"><?=$value['nombre_division'];?></option>
                              <?php }?>
                            </select>
                            <spam id="sregis_select_division"></spam>
                          </div>
                          <div id="regis_seleccionar_area">
                          </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" id="enviar" class="btn btn-primary">Registrar Usuario</button>
                          </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
          <div class="card border">
          <div class="table-responsive p-2 border">
              <div class="d-flex flex-wrap justify-content-between m-1">
                </div>
                  <table id="funcionpaginacion" class="table datatable table-light table-striped table-hover">
                    <thead>
                      <tr>
                      <th scope="col">Nro de Expediente</th>
                        <th scope="col">Fiscal Asignado</th>
                        <th scope="col">División</th>
                        <th scope="col">Área</th>
                        <th scope="col">Supervisor asignado</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Cambiar Estado</th>
                        <th>Detalles de Expediente</th>
                        <?php if($_SESSION['usuario']["nombre_rol"] == "Supervisor"  || $_SESSION['usuario']["nombre_rol"] == "Super Usuario" ) { ?>
                        <th>Editar Expediente</th>
                        <?php } ?>
                        <?php if($_SESSION['usuario']["nombre_rol"] == "Super Usuario" ) { ?>
                        <th>Eliminar Expediente</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($r1 as $valor) { if($valor['cedula_user']==$_SESSION['usuario']["cedula"] || $_SESSION['usuario']["nombre_rol"] == "Super Usuario"  || $_SESSION['usuario']["nombre_rol"] == "Supervisor"){?>
                      <tr>
                        <td> <?php echo $valor['NroProvi']; ?></td>
                        <td>
                        <?php if($valor['status_exp'] == 0 ){ 
                          if($_SESSION['usuario']["nombre_rol"] == "Supervisor" || $_SESSION['usuario']["nombre_rol"] == "Super Usuario"){
                          ?>
                          <button class="boton-circular" data-toggle="modal" data-target="#exampleModal" id="id_<?php echo $valor['id_expedientes']; ?>" onclick="cambiarfuncionario(<?php echo $valor['id_expedientes_usuario']; ?>)"><i class="fas fa-plus"></i></button>
                          <?php }else{?>
                            N/A
                          <?php }
                        }else{ ?>
                          <?php echo $valor['nombre_user']; ?>
                        <?php } ?>
                        </td>
                        <td>
                          <?php echo $valor['nombre_division']; ?>
                        </td>
                        <td>
                          <?php echo $valor['nombre_area']; ?>
                        </td>
                        <td>
                          <?php echo $valor['supervisor']; ?>
                        </td>
                        <td> 
                        <?php if($valor['estado_exp'] == "En proceso" ||  $valor['estado_exp'] == "en proceso"){ ?>

                          <span class="badge bg-warning text-dark"><?php echo $valor['estado_exp']; ?></span>

                        <?php }else{ ?>

                          <span class="badge bg-success text-dark"><?php echo $valor['estado_exp']; ?></span>
                          
                          <?php } ?>
                        </td> 

                        <td>
                          <button type="button" onclick="buscar_status_expediente(<?=$valor['id_expedientes'];?>, '<?=$valor['NroProvi'];?>');" class="btn btn-primary ri-article-line" data-bs-toggle="modal" data-bs-target="#staticBackdrop2"></button> 
                          <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-4" id="staticBackdropLabel">Cambiar el estado del Expediente</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body m-3">
                                    <form class="row g-3 needs-validation" novalidate>
                                      <input type="hidden" id="expedi_status">
                                      <input type="hidden" id="nro_expediente">
                                      <button type="button" id="btnProceso" class="btn btn-warning rounded-pill" onclick="cambiarEstado(this)">En proceso</button>
                                      <button type="button" id="btnRevision" class="btn btn-success rounded-pill" onclick="cambiarEstado(this)">En revision</button> 
                                      <!-- <button type="button" class="btn btn-success rounded-pill">Despachar</button>
                                      <div class="modal-footer"> -->
                                      <?php if($_SESSION['usuario']["nombre_rol"] == "Supervisor"  || $_SESSION['usuario']["nombre_rol"] == "Super Usuario" ) { ?>
                                      <h1 class="modal-title fs-5 text-danger" id="staticBackdropLabel">Traslado de Expediente de Área</h1>
                                      <div class="input-group mb-1">
                                        <label class="input-group-text" for="select_Area">Area</label>
                                        <select class="form-select" id="select_Area" onchange="cambiar_area()">
                                          <option value="0" selected>Seleccionar Área</option>
                                          <?php foreach ($r4 as $key => $value) {?>
                                            <option value="<?=$value['id_area'];?>"><?=$value['nombre_area'];?></option>
                                          <?php }?>
                                        </select>
                                      </div>
                                      <h1 class="modal-title fs-5 text-danger" id="staticBackdropLabel">Traslado de Expediente de División (Despacho)</h1>
                                      <div class="input-group mb-1">
                                        <label class="input-group-text" for="select_division">División</label>
                                        <select class="form-select" id="select_division" onchange="cambiardivision()">
                                          <option value="0" selected>Seleccionar división</option>
                                          <?php foreach ($r3 as $key => $value) {?>
                                            <option value="<?=$value['id'];?>"><?=$value['nombre_division'];?></option>
                                          <?php }?>
                                        </select>
                                        <spam id="sselect_division"></spam>
                                      </div>
                                      <div id="seleccionar_area">
                                      </div>
                                      <?php } ?>
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    </form>

                                  </div>
                                </div>
                              </div>
                            </div>
                        </td>
                        <td>
                          <button type="button" class="btn ri-add-box-line" style="background:#1464B7;color:white" data-bs-toggle="modal" data-bs-target="#staticBackdrop3"></button> 
                            <!-- Modal De datos de expedientes -->
                          <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Datos de Expediente</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                <div class="container mt-2">
                                  <table class="table table-bordered">
                                      <tbody>
                                          <tr>
                                              <th>Nro de Providencia</th>
                                              <td><?php echo $valor['NroProvi']; ?></td>
                                          </tr>
                                          <tr>
                                              <th>Sujeto Pasivo</th>
                                              <td><?php echo $valor['sujetoP']; ?></td>
                                          </tr>
                                          <tr>
                                              <th>Rif</th>
                                              <td><?php echo $valor['RifSP']; ?></td>
                                          </tr>
                                          <tr>
                                              <th>Domicilio Fiscal</th>
                                              <td><?php echo $valor['DomicilioFiscal']; ?></td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                  </div>
                              </div>
                            </div>
                          </div>  
                        </td>  
                        <?php if($_SESSION['usuario']["nombre_rol"] == "Supervisor"  || $_SESSION['usuario']["nombre_rol"] == "Super Usuario" ) { ?>
                        <td> 
                        <button type="button" class="btn ri-edit-line" style="background:#15406D;color:white" onclick="cargar_datos(<?=$valor['id_expedientes'];?>, <?=$valor['id_usuario'];?>);">
                        </button>
                        </td>
                        <?php } ?>
                        <?php if($_SESSION['usuario']["nombre_rol"] == "Super Usuario" ) { ?>
                        <td>
                          <button type="button" class="btn btn-danger ri-delete-bin-2-line" onclick="eliminar(<?=$valor['id_expedientes'];?>, <?=$valor['id_usuario'];?>);"> 
                          </button> 
                        </td>
                        <?php } ?>
                        <?php }}?>
                    </tbody>
                    <tfooter>
                      <tr>
                      <th scope="col">Nro de Expediente</th>
                        <th scope="col">Fiscal Asignado</th>
                        <th scope="col">División</th>
                        <th scope="col">Área</th>
                        <th scope="col">Supervisor asignado</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Cambiar Estado</th>
                        <th>Detalles de Expediente</th>
                        <?php if($_SESSION['usuario']["nombre_rol"] == "Supervisor"  || $_SESSION['usuario']["nombre_rol"] == "Super Usuario" ) { ?>
                        <th>Editar Expediente</th>
                        <?php } ?>
                        <?php if($_SESSION['usuario']["nombre_rol"] == "Super Usuario" ) { ?>
                        <th>Eliminar Expediente</th>
                        <?php } ?>
                      </tr>
                    </tfooter>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Asignar Fiscal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="input-group d-flex justify-content-center">
    <input type="text" class='form-control letras_numeros' id='cedula_cambio_fun' placeholder="Buscar cédula" list='lista' oninput="validarSeleccion()">
    <datalist id='lista'>
        <option selected="" value="0"></option>
        <?php foreach ($r2 as $key => $value) { ?>
            <option value="<?=$value['cedula_user'];?>"><?=$value['nombre_user'];?></option>
        <?php  } ?>
    </datalist>
    <button class="btn btn-outline-primary" id="agregarfuncionario" type="button" disabled>Agregar</button>
</div>
<span class="text-danger" id="validacion_cam_fun"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


  </main><!-- End #main -->
  
  <?php include_once "bin/component/footer.php";?>
  <script src="content/js/Expedientes.js"></script>
  <script>


    document.addEventListener("DOMContentLoaded", function() {
      var supervisorInput = document.getElementById("supervisor");
      
      // Deshabilitar el campo
      supervisorInput.disabled = true;

      // Evitar que se modifique mediante el inspector de código
      supervisorInput.addEventListener("input", function(event) {
        event.preventDefault();
        return false;
      });
    });
  </script>
</body>

</html>
