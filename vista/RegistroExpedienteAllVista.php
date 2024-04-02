
<!DOCTYPE html>
<html lang="en">

<?php include_once "bin/component/head.php";?>

<body>
                      <?php include_once "bin/component/header.php";?>

                      <?php include_once "bin/component/sidebar.php";?>
                      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
                      <main id="main" class="main p-0" style="background:#f8d7da">
  
  <div class="pagetitle">
  <div class="d-flex justify-content-start align-items-end">
  
    <div class="py-3 px-4" style="border-radius: 0 0 50% 0; background:#FFC300;">
      <h1 class="m-0">Lista de todos los Expedientes</h1>
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
                            <label class="input-group-text" for="AddFiscal">Asignar Funcionario</label>
                            <select class="form-select" id="AddFiscal">
                              <option value="0" selected>Seleccionar Fiscal</option>
                              <?php foreach ($r2 as $key => $value) {?>
                                <option value="<?=$value['id_usuario'];?>"><?=$value['nombre_user'];?></option>
                              <?php }?>
                            </select>
                            <spam id="sAddFiscal"></spam>
                          </div>
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
                        <th scope="col">Funcionario Asignado</th>
                        <th scope="col">División</th>
                        <th scope="col">Área</th>
                        <th scope="col">Supervisor asignado</th>
                        <th scope="col">Estado</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($r1 as $valor) {?>
                      <tr>
                        <td> <?php echo $valor['NroProvi']; ?></td>
                        <td>
                        <?php echo $valor['nombre_user']; ?>
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
                        <?php } ?>
                    </tbody>
                    <tfooter>
                      <tr>
                      <th scope="col">Nro de Expediente</th>
                        <th scope="col">Funcionario Asignado</th>
                        <th scope="col">División</th>
                        <th scope="col">Área</th>
                        <th scope="col">Supervisor asignado</th>
                        <th scope="col">Estado</th>
                      </tr>
                    </tfooter>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
  </main><!-- End #main -->
  
  <?php include_once "bin/component/footer.php";?>
  <script src="content/js/ExpedientesAll.js"></script>
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
