<html lang="en">

  <?php include_once "bin/component/head.php";?>

<body>
	
	<?php include_once "bin/component/header.php";?>

	<?php include_once "bin/component/sidebar.php";?>
  <?php if($_SESSION['usuario']["nombre_rol"] == "Administrador"  || $_SESSION['usuario']["nombre_rol"] == "Super Usuario" ) { ?>
  <main id="main" class="main p-0" style="background:#f8d7da">
  
  <div class="pagetitle">
  <div class="d-flex justify-content-start align-items-end">
  
    <div class="py-3 px-4" style="border-radius: 0 0 50% 0; background:#FFC300;">
      <h1 class="m-0">Control de Expedientes - General </h1>
    </div>
  </div>
    <section class="section dashboard m-2">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Card -->
            <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Total de Expedientes</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-exchange-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $r1[0]['cantidadex'];?></h6>        
                    </div> </div>
                </div> </div> </div><!-- End Card -->

                 <!-- Card -->
            <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Expedientes en Proceso</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-exchange-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $r3[0]['cantidadex'];?></h6>        
                    </div> </div>
                </div> </div> </div><!-- End Card -->

                 <!-- Card -->
            <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Expedientes en Revision</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-exchange-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $r2[0]['cantidadex'];?></h6>        
                    </div> </div>
                </div> </div> </div><!-- End Card -->

                 <!-- Card -->
            <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Expedientes Archivados</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-exchange-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $r4[0]['cantidadex'];?></h6>        
                    </div> </div>
                </div> </div> </div><!-- End Card -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->

          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->
    </section>

    <?php }else{ ?>
      <style>
body {
    background-image: url('assets/img/Bienvenidos.png');
    background-size: 100vw 100vh;
    background-position: center;
    color: black;
    margin: 0;
    padding: 0;
}

.background-container {
    position: relative;
    width: 100%;
    height: 90%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.background-container h1 {
    font-size: 3rem;
}
      </style>
      <div class="background-container" id="backgroundContainer">
          <!-- La imagen de fondo se agregará dinámicamente aquí -->
      </div>
  
      <script>
  document.addEventListener("DOMContentLoaded", function() {
      // Crear un elemento h1 para el texto "Bienvenido"
      var heading = document.createElement("h1");
      heading.textContent = "Bienvenid@ de nuevo";
  
      // Agregar el elemento h1 al contenedor de fondo
      var backgroundContainer = document.getElementById("backgroundContainer");
      backgroundContainer.appendChild(heading);
  });
  
      </script>
  
</main><!-- End #main -->
<?php } ?>
</body>

	<?php include_once "bin/component/footer.php";?>

</html>