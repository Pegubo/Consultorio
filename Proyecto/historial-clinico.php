<?php
        session_start();
        if (isset($_SESSION['usuario']))
        {
            $usuario=$_SESSION['usuario'];
            $idpaciente=$_GET['id'];
            $link = mysqli_connect("localhost", "DrBot", "MyClinic@", "MyClinic") or die("Error en " . mysqli_error($link));
            $result = mysqli_query($link, "SELECT Nombre, ApellidoP, ApellidoM from paciente where id_paciente=".$idpaciente.";") or die('Query fail: ' . mysqli_error($link));
            $row = mysqli_fetch_array($result);
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bikin - v2.0.0
  * Template URL: https://bootstrapmade.com/bikin-free-simple-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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


  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">MyClinic</a></li>
          <li><a href="expedientes.php">Expedientes</a></li>
          <li>Historial Clinico</li>
          <li><?php echo "$row[0] $row[1] $row[2]"; ?></li>
        </ol>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container" data-aos="fade-up">
        <div class="row">
            <table class="table table-hover col-md" id="myTable">
              <thead>
                <tr>
                  <th scope="col">Fecha</th>
                  <th scope="col">Tratamiento</th>
                  <th scope="col">Costo</th>
                  <th scope="col">Cuenta</th>
                  <th scope="col">Saldo</th>
                </tr>
              </thead>
              <?php
               $link = mysqli_connect("localhost", "DrBot", "MyClinic@", "MyClinic") or die("Error en " . mysqli_error($link));
                $result = mysqli_query($link, "SELECT * from historial where Paciente_id=".$idpaciente.";") or die('Query fail: ' . mysqli_error($link));
              ?>
              <tbody>
                <?php
              
                while ($row = mysqli_fetch_array($result)) {
                    echo"<tr id=\"#tablapacientes\" class=\"table\" >
                      <td>".$row[1]."</td>
                      <td>".$row[2]."</td>
                      <td>".$row[3]."</td>
                      <td>".$row[4]."</td>
                      <td>".$row[5]."</td>
                    </tr>";
                } 
                mysqli_close($link);
                ?>
              </tbody>

            </table>

          </div>
              <div class="row">
                  <div class="col">
                          <div class="col-md-3">
                            <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm ml-auto">Agregar Cita</a>
                              <a href="ver-expediente.php?id=<?php echo "$idpaciente" ?>" class="btn btn-primary btn-sm ml-auto">Ver Expediente</a>
                          </div>
                  </div>
              </div>
              <label id="error"></label>
          </div>
        </div>
         <div class="container">

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Registro de Cita</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col">
                    <form method="post" action="registra-historial.php?id= <?php echo "$idpaciente"; ?>">
                      <div class="form-row">
                        <div class="col-md-1 form-group">
                          <label for="fecha">Fecha</label>
                        </div>
                        <div class="col-md-3 form-group">
                          <input type="date" class="form-control" id="fecha" name="fecha" placeholder="DD-MM-AAAA" data-rule="minlen:8" data-msg="Ingrese la fecha" />
                          <div class="validate"></div>
                        </div>
                      </div>
                      <hr>
                      <div class="form-row">
                        <div class="col-md form-group">
                          <textarea class="form-control" name="tratamiento" id="tratamiento" placeholder="Tratamiento" data-rule="minlen:1" data-msg="Ingrese el Trtamiento"></textarea> 
                        <div class="validate"></div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md form-group">
                          <input type="number" class="form-control text-center" name="Costo" id="Costo" placeholder="Costo" />
                        </div>
                        <div class="col-md form-group">
                          <input type="number" class="form-control text-center" name="Cuenta" id="Cuenta" placeholder="Cuenta" />
                        </div>
                        <div class="col-md form-group">
                          <input type="number" class="form-control text-center" name="Saldo" id="Saldo" placeholder="Saldo" />
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="historial" id="historial" class="btn btn-primary">Guardar</button>
                        <button class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                      </div>
                      </form>
                    </div>
                   
                    </div>
                </div>
              
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Portfolio Details Section -->
  </main><!-- End #main -->

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
 