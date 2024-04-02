
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
      <h1 class="m-0">Lista de la Bitacora</h1>
    </div>
  </div>
    <section class="section m-2">
      <div class="row">
        <div class="col-lg-12">
          <div class="card border">
          <div class="table-responsive p-2 border">
              <div class="d-flex flex-wrap justify-content-between m-1">
                </div>
                  <table id="funcionpaginacion" class="table datatable table-light table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Supervisor del expediente</th>
                        <th scope="col">Nro expediente</th>
                        <th scope="col">Movimiento anterior del expediente</th>
                        <th scope="col">Ubicación actual del expediente</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($r1 as $valor) {?>
                      <tr>
                        <td> 
                          <?php echo $valor['fecha_formateada']; ?>
                        </td>
                        <td>
                        <?php echo $valor['usuario']; ?>
                        </td>
                        <td>
                        <?php echo $valor['nro_expediente']; ?>
                        </td>
                        <td>
                          <?php echo $valor['movimiento_de_expediante']; ?>
                        </td>
                        <td>
                          <?php echo $valor['destino_expediendte']; ?>
                        </td>
                        <?php } ?>
                    </tbody>
                    <tfooter>
                      <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Supervisor del expediente</th>
                        <th scope="col">Nro expediente</th>
                        <th scope="col">Movimiento anterior del expediente</th>
                        <th scope="col">Ubicación actual del expediente</th>
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
  <script src="content/js/BitacoraExpedientes.js"></script>
</body>

</html>
