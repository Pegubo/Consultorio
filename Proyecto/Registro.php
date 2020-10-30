
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Registro</title>
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
</head>
<body id="main">
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html">MyClinic</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index-login.php">Inicio</a></li>
        </ul>
      </nav><!-- .nav-menu -->

      

    </div>
  </header><!-- End Header -->
 

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a>MyClinic</a></li>
          <li>Registro</li>
          <li>Formato de Registro</li>
        </ol>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container" 

        <div class="row">
          <div class="col">
            <form action="envia-registro.php" method="post">
              <div class="form-group">
                  <label for="Login">Nombre Completo</label>
                  <input type="text" class="form-control" name="rname" id="rname" required >    
                </div>
                <!-- APLICAR PATRON PARA LA CAPTURA DEL PASSWORD -->
                <div class="form-group">
                  <label for="pwd">Correo</label>
                  <input type="email" class="form-control" name="rcorreo" id="rcorreo" required>
                </div>
                <div class="form-group">
                  <label for="pwd">Contraseña</label>
                  <input type="password" class="form-control" name="rpass1" id="rpass1" required>
                </div>
                <div class="form-group">
                  <label for="pwd">Repite Contraseña</label>
                  <input type="password" class="form-control" name="rpass2" id="rpass2" required>
                </div>
                 
                <button type="submit" name="envio" class="btn btn-primary">Registrar</button>
             </form>
             <label id="error"></label>
              </div>
          </div>
            
        </div>
      </div>
      <div class="col-md-6">
        <label id="Error"></label>
      </div>
    </section><!-- End Portfolio Details Section -->
  
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
</body>
</html>