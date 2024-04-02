<html lang="en">

  <?php include_once "bin/component/head.php";?>

<body>
	
	<?php include_once "bin/component/header.php";?>

	<?php include_once "bin/component/sidebar.php";?>

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

  </main><!-- End #main -->

</body>

	<?php include_once "bin/component/footer.php";?>

</html>