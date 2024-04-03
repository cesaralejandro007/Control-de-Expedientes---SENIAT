<!DOCTYPE html>
<html lang="en">

 <?php include_once "bin/component/head.php";?>

<body>

  <?php include_once "bin/component/header.php";?>

  <?php include_once "bin/component/sidebar.php";?>
  <main id="main" class="main p-0" style="background:#f8d7da">
  
  <div class="pagetitle">
  <div class="d-flex justify-content-between align-items-end">
  
    <button type="button" class="btn m-2" style="background:#15406D;color:white" id="nuevo">
      Registrar Usuario
    </button>

    <div class="py-3 px-4" style="border-radius: 0 0 0 50%; background:#FFC300;">
      <h1 class="m-0">Lista de los Usuarios</h1>
    </div>
  </div>
      <section class="section m-3">
        <div class="row">
          <div class="col-lg-12">
            <!-- Modal -->
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
                    <input type="hidden" name="id" class="form-control" id="id">
                      <div class="col-12">
                        <label for="yourCedula" class="form-label">Cedula</label>
                        <input type="text" name="cedula" class="form-control" id="yourCedula" required>
                        <spam id="syourCedula"></spam>
                      </div>

                      <div class="col-12">
                        <label for="yourName" class="form-label">Nombre y Apellido</label>
                        <input type="text" name="name" class="form-control" id="yourName" required>
                        <spam id="syourName"></spam>
                      </div>
                      
                      <div class="col-12">
                        <label for="DomiciFi" class="form-label">Asignar cargo</label>
                        <select class="form-control" id="AddFiscal">
                          <option value="0">--Seleccione--</option>
                          <option value="Super Usuario">Super Usuario</option>
                          <option value="Administrador">Administrador</option>
                          <option value="Supervisor">Supervisor</option>
                          <option value="Fiscal">Fiscal</option>
                          <option value="Ponente">Ponente</option>
                          <option value="Revisor">Revisor</option>
                          <option value="Archivista">Archivista</option>
                        </select>
                        <spam id="sAddFiscal"></spam>
                      </div>
                      
                      <div class="col-12">
                      <label for="DomiciFi" class="form-label">Asignar Area</label>
                      <select class="form-control form-select" id="area" name="area">
                          <option value="0">--Seleccione--</option>
                          <?php foreach ($r2 as $key => $value) {?>
                          <option value="<?=$value['id'];?>"> <?php echo $value['nombrearea']; ?>
                          </option>
                          <?php }?>
                      </select>
                      <spam id="sarea"></spam>
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
        <div class="table-responsive">
              <div class="d-flex flex-wrap justify-content-between m-1">
                </div>
                  <table id="funcionpaginacion" class="table datatable table-light table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">Cedula</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Area</th>
                    <th scope="col">División</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($r1 as $valor) {?>
                    <tr>
                    <td> <?php echo $valor['cedula_user']; ?></td>
                    <td> <?php echo $valor['nombre_user']; ?></td>
                    <td> <?php echo $valor['nombre_rol']; ?></td>
                    <td> <?php echo $valor['nombrearea']; ?></td>
                    <td> <?php echo $valor['nombrediv']; ?></td>
                    <td>  <button type="button" class="btn ri-edit-line" style="background:#15406D;color:white"  onclick="cargar_datos(<?=$valor['id_usuario'];?>);"> 
                          </button>
                          <button type="button" class="btn btn-danger ri-delete-bin-2-line" onclick="eliminar(<?=$valor['id_usuario'];?>);"> 
                          </button> 
                    </td>
                  </tr>
                    <?php }?>
                </tbody>
                <tfooter>
                  <tr>
                    <th scope="col">Cedula</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Area</th>
                    <th scope="col">División</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </tfooter>
              </table>
              <!-- End Table with stripped rows -->
             </div>
            </div>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <?php include_once "bin/component/footer.php";?>

  <script src="content/js/usuario.js"></script>
</body>

</html>