<?php
        session_start();
        if (isset($_SESSION['usuario']))
        {
            header('location:index-login.php');
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

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

      <nav class="nav-menu">
        <ul>
          <li class="active" href="index.php"><a>Inicio</a></li>
          <li class="drop-down"><a>Iniciar Sesion</a>
            <ul>
                <form class="px-4 py-10" method="POST">
                  <div class="form-group">
                    <label for="exampleDropdownFormEmail1">Email address</label>
                    <input type="email" class="form-control" name="correo" id="correo" placeholder="email@example.com" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleDropdownFormPassword1">Password</label>
                    <input type="password" class="form-control" id="contra" name="contra" placeholder="Password" required>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="dropdownCheck">
                    <label class="form-check-label" for="dropdownCheck">
                      Remember me
                    </label>
                  </div>
                  <div class="form-check">
                    <a href="Registro.php" class="active">Registrarme</a>
                  </div>
                  <button type="submit" name="login" class="btn btn-primary">Sign in</button>
                </form>
                <?php
                if(isset($_POST['login'])){
                  $correo= $_POST['correo'];
                  $contra= $_POST['contra'];
                    $conexion = mysqli_connect("localhost", "DrBot", "MyClinic@","myclinic") or die("Error en" . mysqli_error($conexion));
                    $result=mysqli_query($conexion,"SELECT * FROM dentista D WHERE D.Correo='".$correo."' AND D.Contraseña='".$contra."';");
                    if($result){
                      $row= mysqli_fetch_assoc($result);
                      //echo $row['Nombre'];
                      //echo'Se a iniciado sesion';
                      session_start();
                      $_SESSION["usuario"]=$row;
                      header("Location: index-login.php");
                    }else{
                      //echo "Usuario Equivocado";
                      header("Location:index.php");
                    }
                    mysqli_close($conexion);
              }

              ?>
                <div class="dropdown-divider"></div>
                <!--a class="dropdown-item" href="#">New around here? Sign up</a>
                <a class="dropdown-item" href="#">Forgot password?</a-->
            </ul>
          </li>

        </ul>
      </nav><!-- .nav-menu -->

      <!--a href="#about" class="get-started-btn scrollto">Get Started</a-->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <main>
 <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row no-gutters">
          <div class="content col-xl-5 d-flex align-items-stretch" data-aos="fade-right">
            <div class="content">
              <h3>Mantenga sus citas en orden y cumpla sus objetivos</h3>
              <p>
                MyClinic le ofrece un sistema para llevar un control de sus citas, ademas de un agradable apartado en el que podra registrar a cada uno de sus clientes y deshacerse de las libretas y recivos de papel.
              </p>
              <a href="#" class="about-btn">Acerca de nosotros <i class="bx bx-chevron-right"></i></a>
            </div>
          </div>
          <div class="col-xl-7 d-flex align-items-stretch" data-aos="fade-left">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                  <i class="bx bx-receipt"></i>
                  <h4>Informacion al momento</h4>
                  <p>Tenga a la mano toda la informacion pertinente de sus clientes a solo 2 clicks de distancia</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                  <i class="bx bx-cube-alt"></i>
                  <h4>Almacenamiento</h4>
                  <p>Guarde toda la informacion que desee en nuestra base de datos</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                  <i class="bx bx-images"></i>
                  <h4>Fotos clinicas</h4>
                  <p>Podra almacenar las fotos clinicas de sus pacientes, asi podra demostrar el avance su trabajo</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                  <i class="bx bx-shield"></i>
                  <h4>Seguridad Garantizada</h4>
                  <p>Con MyClinic mantenga la informacion de sus clientes segura y lejos de personas malisiosas.</p>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Servicios</h2>
          <p>MyClinic le ofrece una variad de servicios unificados en un solo programa, con la finalidad de que tenga una mejor organizacion de la informacion de sus clientes y pueda olvidarse de estar recordando a que hora tiene su siguiente cita.</p>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="">Tiempo libre</a></h4>
              <p class="description">Aproveche su tiempo libre cuando nuestra agenda le indique 0 pendientes.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">Mantengase actualizado</a></h4>
              <p class="description">Actualize la informacion de sus clientes en tiempo real.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">Alta velocidad</a></h4>
              <p class="description">Con nuestra base de datos obtenga la mejor velocidad de conexion.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-layer"></i></div>
              <h4 class="title"><a href="">Documentos</a></h4>
              <p class="description">Olvidese de acumular montañas de papel, guarde los expendietes de sus pacientes y llevelos a donde quiera</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contacto</h2>
          <p>Si tiene alguna duda o desea comentarnos sobre algun problma que se pueda presentar no dude en comunicarse con nosotros.</p>
        </div>

        <div class="row">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Nuestra direccion</h3>
                  <p>Guerrero Negro BCS, Sal magnesita Col.Infonavit #45</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Nuestro correo electronico</h3>
                  <p>amadorm@uabc.edu.mx<br></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Llamanos</h3>
                  <p>+52 615 107 5761<br>+52 616 108 4069</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6 mt-4 mt-md-0">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="form-control"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>MyClinic</h3>
            <p>
              Guerrero Negro BCS, Sal magnesita <br>
              Col.Infonavit #45 <br>
              México <br><br>
              <strong>Phone:</strong>+52 615 107 5761 <br>
              <strong>Email:</strong> amadorm@uabc.edu.mx<br>
            </p>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nuestros servicios</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Eventos</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Expedientes virtuales</a></li>
              
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>MyClinic</span></strong>. All Rights Reserved
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