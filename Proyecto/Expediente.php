<?php
        session_start();
        if (isset($_SESSION['usuario']))
        {
            $usuario=$_SESSION['usuario'];
            $nombre= $usuario['Nombre'];
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
          <li><a href="index-login.html">MyClinic</a></li>
          <li>Expedientes</li>
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
                  <label for="fecha">Fecha</label>
                  
                </div>
                <div class="col-md-4 form-group">
                  <input type="date" class="form-control" id="fecha" name="fecha" placeholder="DD-MM-AAAA" data-rule="minlen:8" data-msg="Ingrese la fecha" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-2 form-group">
                  <label for="tratamientoini">Inicio de Tratamiento</label>
                  
                </div>
                <div class="col-md-4 form-group">
                  <input type="date" class="form-control" name="tratamientoini" id="tratamientoini" placeholder="DD-MM-AAAA"data-rule="minlen:8" data-msg="Ingrese el inicio del tratamiento" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" data-rule="minlen:1" data-msg="Ingrese un Nombre"/>
                  <div class="validate"></div>
                </div>
                <div class="col-md form-group">
                  <input type="text" name="apep" class="form-control" id="apep" placeholder="Apellido Paterno" data-rule="minlen:1" data-msg="Ingrese el Apellido Paterno"/>
                  <div class="validate"></div>
                </div>
                <div class="col-md form-group">
                  <input type="text" name="apem" class="form-control" id="apem" placeholder="Apellido Materno" />
                  
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-2 form-group">Seleccione Domicilio</div>
                <div class="col-md form-group">
                  <?php
                 $link = mysqli_connect("localhost", "DrBot", "MyClinic@", "MyClinic") or die("Error en " . mysqli_error($link));
                  $result = mysqli_query($link, "SELECT * FROM domicilio") or die('Query fail: ' . mysqli_error());
                ?>
                <select class="form-control" id="domicilio" name="domicilio">
                  <?php
                
                  while ($row = mysqli_fetch_array($result)) {
                    echo "<option value=\"$row[0]\">$row[1], $row[2], $row[3]</option>";
                  }
                  ?>
                  </select>
                  </div>
              </div>
              <div class="form-row">
                <div class="col-md-1 form-group">
                  <label>Telefono</label>
                  
                </div>
                <div class="col-md-2 form-group">
                  <input type="text" class="form-control" name="Telefono" id="Telefono" placeholder="(111) 111 1111" data-rule="minlen:10" data-msg="Ingrese un Telefono" />
                  <div class="validate"></div>
                </div>
                 <div class="col-md form-group">
                  <input type="number" class="form-control text-center" name="edad" id="edad" placeholder="Edad" />
                  
                </div>
                <div class="col-md form-group">
                  <input type="text" class="form-control" name="ocupacion" id="ocupacion" placeholder="Ocupacion" data-rule="minlen:1" data-msg="Ingrese la Ocupacion"/>
                  <div class="validate"></div>
                </div>
                <div class="col-md form-group">
                  <select class="form-control" name="sexo" id="sexo">
                    <option value="1">Hombre</option>
                    <option value="2" selected>Mujer</option>
                  </select>
                  
                </div>
              </div>
              <hr>
              <div class="form-row">
                <label>¿Se encuentra bajo tratamiento medico o dental?</label>
                <div class="col-md-2 form-group">
                 <select class="form-control" name="trat" id="trat" onchange="habilitar(this.value)">
                    <option value="Si" selected>Si</option>
                    <option value="No">No</option>
                  </select>
                  
                </div>
              </div>
              <div class="form-row">
                <div class="col-md form-group">
                  <textarea type="text" class="form-control" name="trattext" id="trattext" value=" " placeholder="Tratamiento"></textarea>  
                 
                </div>
                <div class="col-md form-group">
                  <textarea type="text" class="form-control" name="meditext" id="meditext" value=" " placeholder="Medicamentos"></textarea> 
                  
                </div>
              </div>
              <hr>
              <div class="form-row">
                <div class="col-md form-group">
                  <textarea class="form-control" name="motivoconsult" id="motivoconsult" placeholder="Motivo de Consulta" data-rule="minlen:1" data-msg="Ingrese el Motivo de la consulta"></textarea> 
                <div class="validate"></div>
                </div>
                <div class="col-md form-group">
                  <textarea class="form-control" name="Enfermedades" id="Enfermedades" placeholder="Enfermedades Personales"></textarea> 
                
                </div>
                <div class="col-md form-group">
                  <textarea class="form-control" name="Alergias" id="Alegias" placeholder="Alergias"></textarea> 
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-2 form-group">
                    <label>Higiene Bucal</label>
                </div>
                <div class="col-md form-group">
                    <select class="form-control" id="Higiene" name="Higiene">
                      <option value="Excelente">Excelente</option>
                      <option value="Buena" selected>Buena</option>
                      <option value="Regular">Regular</option>
                      <option value="Mala">Mala</option>
                      <option value="Pesima">Pesima</option>
                    </select>
                </div>
                <div class="col-md-2 form-group">
                    <label>Alimentacion</label>
                </div>
                <div class="col-md form-group">
                  
                    <select class="form-control" id="alimentacion" name="alimentacion">
                      <option value="Excelente">Excelente</option>
                      <option value="Buena" selected>Buena</option>
                      <option value="Regular">Regular</option>
                      <option value="Mala">Mala</option>
                      <option value="Pesima">Pesima</option>
                    </select>
                </div>
                <div class="col-md-2 form-group">
                    <label>Color de Dientes</label>
                </div>
                <div class="col-md form-group">
                  
                    <select class="form-control" id="color" name="color">
                      <option value="Blancos">Blancos</option>
                      <option value="Amarillos" selected>Amarillos</option>
                      <option value="Cafes">Cafes</option>
                      <option value="Negros">Negros</option>
                      <option value="No tiene Dientes">No tiene Dientes</option>
                    </select>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-2 form-group">
                  <label> Dentista</label>
                </div>
                <div class="col-md-6 form-group">
                  <input type="text" class="form-control" name="dentista" id="dentista" value="<?php echo "$nombre"; ?>" disabled="true">
                </div>
              </div>
              
                <div class="text-center">
                  <button type="submit" name="Expediente" id="Expediente" class="btn btn-primary">Guardar</button>
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
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>MyClinic</h3>
            <p>
             Cuentanos que te parece, nos interesa conocer tus opiniones <br>
              <strong>Phone:</strong>+52 615 107 5761 <br>
              <strong>Email:</strong> amadorm@uabc.edu.mx<br>
            </p>
          </div>
           
         <div class="col-lg-3 col-md-6 footer-links">
              <h2>Acerca de:</h2>
                <p>
                  En MyClinic nos dedicamos al diseño y desarrollo de nuevas tecnologias para la salud y el bienestar de nuestros clientes.<br>
                   Tratamos de innovar para que puedas ofrecer un servicio de mejor calidad con una mejor cantidad de esfuerzo.  

                </p>
          </div>
          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h3>¿Deseas probar nuevas versiones?</h3>
            <p>Mandanos tu correo para mantenerte al tanto de nuevas versiones de prueba</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" name="expediente" id="expediente" value="Enviar">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>MyClinic</span></strong>. Todos los derechos reservados
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