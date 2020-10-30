<?php
        session_start();
        if (isset($_SESSION['usuario']))
        {
            $usuario=$_SESSION['usuario'];
            $idpaciente=$_GET['id'];
            $link = mysqli_connect("localhost", "DrBot", "MyClinic@", "MyClinic") or die("Error en " . mysqli_error($link));
            $result = mysqli_query($link, "SELECT * from expediente where Paciente_id_paciente=".$idpaciente.";") or die('Query fail: ' . mysqli_error($link));
            $row = mysqli_fetch_array($result);
            $datos = base64_decode($row[6]);
            echo "$datos";
        }
        else
        {
            header('location:index.php');
        }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MyClinic</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Krub:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- =======================================================
  * Template Name: Bikin - v2.0.0
  * Template URL: https://bootstrapmade.com/bikin-free-simple-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <script>
    function habilitar(value)
    {
      if(value=="Si" || value==true)
      {
        // habilitamos
        document.getElementById("trattext").disabled=false;
        document.getElementById("meditext").disabled=false;
      }else if(value=="No" || value==false){
        // deshabilitamos
        document.getElementById("trattext").disabled=true;
        document.getElementById("meditext").disabled=true;
      }
    }
  </script>
</head>

<body>

  <!-- ======= Header ======= -->
 <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html">MyClinic</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index-login.php">Inicio</a></li>
          <li><a href="expedientes.php">Expedientes</a></li>
          <li><a href="cerrarsesion.php">Cerrar Sesion</a></li>
        </ul>
      </nav><!-- .nav-menu -->

      

    </div>
  </header><!-- End Header -->

 <body id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index-login.php">MyClinic</a></li>
          <li><a href="expedientes.php">Expedientes</a></li>
          <li>Formato de Expediente</li>
        </ol>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col">
            <form action="envia-expediente.php" method="post">
              <div class="form-row">
                <div class="col-md-2 form-group">
                  <label for="fecha">Fecha de registro</label>
                  
                </div>
                <div class="col-md-4 form-group">
                  <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo "$row[21]"; ?>" placeholder="DD-MM-AAAA" data-rule="minlen:8" data-msg="Ingrese la fecha" disabled="true" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-2 form-group">
                  <label for="tratamientoini">Inicio de Tratamiento</label>
                  
                </div>
                <div class="col-md-4 form-group">
                  <input type="date" class="form-control" name="tratamientoini" value="<?php echo"$row[22]"; ?>" id="tratamientoini" placeholder="DD-MM-AAAA"data-rule="minlen:8" disabled="true" data-msg="Ingrese el inicio del tratamiento" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md form-group">
                  <input type="text" name="name" class="form-control" id="name" value="<?php echo"$row[2]"; ?>" placeholder="Nombre" data-rule="minlen:1" data-msg="Ingrese un Nombre" disabled="true"/>
                  <div class="validate"></div>
                </div>
                <div class="col-md form-group">
                  <input type="text" name="apep" class="form-control" id="apep" value="<?php echo"$row[3]"; ?>" placeholder="Apellido Paterno" data-rule="minlen:1" data-msg="Ingrese el Apellido Paterno" disabled="true"/>
                  <div class="validate"></div>
                </div>
                <div class="col-md form-group">
                  <input type="text" disabled="true" name="apem" class="form-control" value="<?php echo"$row[4]"; ?>" id="apem" placeholder="Apellido Materno" />
                  
                </div>
              </div>
              <div class="form-row">
                <div class="col-md form-group">
                  <img src="data:image/jpeg;base64,"<?php echo"base64_encode( $row[6])"; ?>">
              </div>
            </div>
              <div class="form-row">
                <div class="col-md form-group">
                  <input type="text" class="form-control" name="domicilio" id="domicilio" value="<?php echo"$row[7]"; ?>" placeholder="Domicilio" data-rule="minlen:1" data-msg="Ingrese el Domicilio" disabled="true"/>
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-1 form-group">
                  <label>Telefono</label>
                  
                </div>
                <div class="col-md-2 form-group">
                  <input type="text" class="form-control" name="Telefono" id="Telefono" value="<?php echo"$row[8]"; ?>" placeholder="(111) 111 1111" data-rule="minlen:10" data-msg="Ingrese un Telefono" disabled="true"/>
                  <div class="validate"></div>
                </div>
                 <div class="col-md form-group">
                  <input type="number" class="form-control text-center" name="edad" value="<?php echo"$row[10]"; ?>" id="edad" disabled="true" placeholder="Edad" />
                  
                </div>
                <div class="col-md form-group">
                  <input type="text" class="form-control" name="ocupacion" id="ocupacion" value="<?php echo"$row[9]"; ?>" placeholder="Ocupacion" data-rule="minlen:1" data-msg="Ingrese la Ocupacion" disabled="true"/>
                  <div class="validate"></div>
                </div>
                <div class="col-md form-group">
                  <select class="form-control" name="sexo" id="sexo" disabled="true">
                    <option value="<?php echo"$row[5]"; ?>"><?php if($row[5]==1){echo"Hombre";}else{echo"Mujer";} ?></option>
                    
                  </select>
                  
                </div>
              </div>
              <hr>
              <div class="form-row">
                <label>¿Se encuentra bajo tratamiento medico o dental?</label>
                <div class="col-md-2 form-group">
                 <select class="form-control" name="trat" id="trat" disabled="true" onchange="habilitar(this.value)">
                    
                    <option value="<?php echo"$row[11]"; ?>"><?php if(strcmp ($row[11],"Si")==1){echo"Si";}else{echo"No";} ?></option>
                    
                  </select>
                  
                </div>
              </div>
              <div class="form-row">
                <div class="col-md form-group">
                  <textarea type="text" class="form-control" value="" name="trattext" id="trattext" disabled="true" value=" " placeholder="Tratamiento"><?php echo"$row[12]"; ?></textarea>  
                 
                </div>
                <div class="col-md form-group">
                  <textarea type="text" class="form-control" value="" name="meditext" id="meditext" disabled="true" value=" " placeholder="Medicamentos"><?php echo"$row[13]"; ?></textarea> 
                  
                </div>
              </div>
              <hr>
              <div class="form-row">
                <div class="col-md form-group">
                  <textarea class="form-control" name="motivoconsult" value="" id="motivoconsult" disabled="true" placeholder="Motivo de Consulta" data-rule="minlen:1" data-msg="Ingrese el Motivo de la consulta"><?php echo"$row[14]"; ?></textarea> 
                <div class="validate"></div>
                </div>
                <div class="col-md form-group">
                  <textarea class="form-control" name="Enfermedades" value="" id="Enfermedades" disabled="true" placeholder="Enfermedades Personales"><?php echo"$row[15]"; ?></textarea> 
                
                </div>
                <div class="col-md form-group">
                  <textarea class="form-control" name="Alergias" value="" id="Alegias" placeholder="Alergias" disabled="true"><?php echo"$row[17]"; ?></textarea> 
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-2 form-group">
                    <label>Higiene Bucal</label>
                </div>
                <div class="col-md form-group">
                    <select class="form-control" disabled="true" id="Higiene" name="Higiene">
                      <option value="<?php echo"$row[16]"; ?>"><?php echo "$row[16]" ?></option>
                    </select>
                </div>
                <div class="col-md-2 form-group">
                    <label>Alimentacion</label>
                </div>
                <div class="col-md form-group">
                  
                    <select class="form-control" id="alimentacion" disabled="true" name="alimentacion">
                      <option value=""><?php echo""; ?><?php echo "$row[18]" ?></option>
                    
                    </select>
                </div>
                <div class="col-md-2 form-group">
                    <label>Color de Dientes</label>
                </div>
                <div class="col-md form-group">
                    <input type="text" class="form-control" value="<?php echo"$row[19]"; ?>" disabled="true" name="color" id="color" data-rule="minlen:1" data-msg="Ingrese el Color">
                    <div class="validate"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-2 form-group">
                  <label> Dentista</label>
                </div>
                <div class="col-md-6 form-group">
                  <input type="text" class="form-control" value="<?php echo"$row[20]"; ?>" name="dentista" id="dentista" value="" disabled="true">
                </div>
              </div>
            

             </form>
              </div>
          </div>
            
        </div>
      </div>
      <div class="col-md-6">
        <label id="Error"></label>
      </div>
    </section><!-- End Portfolio Details Section -->

  </body><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Bikin</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" name="expediente" id="expediente" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>Bikin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bikin-free-simple-landing-page-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  

</body>

</html>