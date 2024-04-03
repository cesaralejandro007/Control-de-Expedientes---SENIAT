<!DOCTYPE html>
<html lang="en">

 <?php include_once "bin/component/head.php";?>

<body>
  
  <?php include_once "bin/component/header.php";?>

  <?php include_once "bin/component/sidebar.php";?>
  <main id="main" class="main p-0" style="background:#f8d7da">
  
  <div class="pagetitle">
  <div class="d-flex justify-content-start align-items-end">
  
    <div class="py-3 px-4" style="border-radius: 0 0 50% 0; background:#FFC300;">
      <h1 class="m-0">Perfil</h1>
    </div>
  </div>
    <section class="section profile m-3">
      <div class="row">
        <div class="col-xl-4">
        <input type="hidden" name="cedula_usuario" id="cedula_usuario"
                        value="<?php echo $_SESSION['usuario']["cedula"] ?>" />
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
              <h2><?php echo $_SESSION['usuario']["nombre_apellido"] ?></h2>
              <h3> <?php echo $_SESSION['usuario']["nombre_rol"]?> </h3>
              <div class="social-links mt-2">
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">
        <div class="card">
  <div class="card-body pt-3">
    <!-- Bordered Tabs -->
    <ul class="nav nav-tabs nav-tabs-bordered">
      <li class="nav-item">
        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Detalle de la cuenta</button>
      </li>
      <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#cambiar_clave">Cambiar Clave</button>
      </li>
    </ul>
    <div class="tab-content pt-2">
      <div class="tab-pane fade show active" id="profile-overview">
        <h5 class="card-title">Detalles de perfil</h5>
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">Nombre y Apellido</th>
                <td><?php echo $_SESSION['usuario']["nombre_apellido"] ?></td>
              </tr>
              <tr>
                <th scope="row">Compañia</th>
                <td>SENIAT</td>
              </tr>
              <tr>
                <th scope="row">Cargo en el sistema</th>
                <td><?php echo $_SESSION['usuario']["nombre_rol"]?></td>
              </tr>
              <tr>
                <th scope="row">Cedula</th>
                <td><?php echo $_SESSION['usuario']["cedula"]?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="tab-pane fade" id="cambiar_clave">
        <div class="table-responsive">
          <table class="table table-borderless">
            <tbody>
              <tr>
                <th scope="row">Nueva Clave</th>
                <td><input type="password" class="form-control" name="clave1" id="clave1" placeholder="Nueva Clave"></td>
              </tr>
              <tr>
                <th scope="row">Confirmar Clave</th>
                <td><input type="password" class="form-control" name="clave2" id="clave2" placeholder="Confirmar Clave"></td>
              </tr>
            </tbody>
          </table>
          <span id="validacion_clave"></span> 
        </div>
        <!-- Botón Cambiar Clave solo en esta pestaña -->
        <div class="card-footer d-flex justify-content-end">
          <button type="button" id="cambio_clave" class="btn btn-primary">Cambiar Clave</button>
        </div>
      </div>
    </div><!-- End Bordered Tabs -->
  </div>
</div>


        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
<?php include_once "bin/component/footer.php";?>
<script src="content/js/perfil.js"></script>

</body>

</html>