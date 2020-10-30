<?php
        session_start();
        if (isset($_SESSION['usuario']))
        {
            $usuario=$_SESSION['usuario'];
            $iddenti=$usuario['id_Dentista'];
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

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
          <li><a href="index-login.html">MyClinic</a></li>
          <li>Expedientes</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-sm-3">
            <input class="form-control" type="search" id="myInput" placeholder="Buscar" onkeyup="myFunction()">
          </div>
        </div>
        <div class="row">
            <table class="table table-hover col-md" id="myTable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido Paterno</th>
                  <th scope="col">Apellido Materno</th>
                </tr>
              </thead>
              <?php
              $usuario=$_SESSION['usuario'];
              $iddenti=$usuario['id_Dentista'];
               $link = mysqli_connect("localhost", "root", "Pegubo105@", "MyClinic") or die("Error en " . mysqli_error($link));
                $result = mysqli_query($link, 'Select p.Nombre, p.ApellidoP, p.ApellidoM, p.id_paciente from paciente p, dentista d where d.id_Dentista=p.Doctor_id and p.Doctor_id='.$iddenti.';') or die('Query fail: ' . mysqli_error());
              ?>
              <tbody>
                <?php
              
                while ($row = mysqli_fetch_array($result)) {
                    echo"<tr id=\"#tablapacientes\" class=\"table\" data-toggle=\"\" data-target=\"#myModal\">
                      <td>".$row[3]."</td>
                      <td>".$row[0]."</td>
                      <td>".$row[1]."</td>
                      <td>".$row[2]."</td>
                    </tr>";
                }
                ?>
              </tbody>
            </table>

          </div>
              <div class="row">
                  <div class="col">
                          <div class="d-flex">
                              <a href="expediente.php" class="btn btn-primary btn-sm ml-auto">Nuevo Expediente</a>
                          </div>
                  </div>
              </div>
          </div>
        </div>
       
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

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
  <script>
    $("tr.table").click(function() {
    var tableData = $(this).children("td").map(function() {
        return $(this).text();
    }).get();
    var iduser= tableData[0];
    window.location = "historial-clinico.php?id=" + iduser;
});
  </script>
  <script >
    $(document).ready(function(){
  $("#tablapacientes").click(function(){
    $("#myModal").modal();
  });
});
  </script>
  <script src="assets/js/main.js"></script>
  <script>
    function myFunction() {
      // Declare variables
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    </script>
</body>

</html>
<?php
  mysqli_close($link);
?>