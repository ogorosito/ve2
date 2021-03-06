<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Vidrería Ezeiza</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.carousel.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.transitions.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="css/nivo-slider-theme.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="css/responsive.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: eBusiness
    Theme URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<?php

function listar_directorios($ruta){
  // abrir un directorio y listarlo recursivo
  if (is_dir($ruta)) {
     if ($dh = opendir($ruta)) {
        while (($file = readdir($dh)) !== false) {
           //esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio
           //mostraría tanto archivos como directorios
         //  echo "<br>Nombre de archivo: $ruta . $file : Es un: " . filetype($ruta . $file);
           if (is_dir($ruta . $file) && $file!="." && $file!=".."){
              //solo si el archivo es un directorio, distinto que "." y ".."
              $class = str_replace(' ', '_', $file);
              echo "<li><a href='#' data-filter='.$class'>$file</a></li>";
          //    echo "<br>Directorio: $ruta$file";
           }
        }
     closedir($dh);
     }
  }else
     echo "<br>No es ruta valida $ruta";
}

function allowed_file_type($file) {
  $allowed_file_extensions = array("jpg", "jpeg", "png");
  $ext = pathinfo($file, PATHINFO_EXTENSION); 
  return in_array($ext, $allowed_file_extensions);
}

function listar_archivos($ruta) {

$template = "<div class='col-md-4 col-sm-4 col-xs-12 __class__'> ".
"<div class='single-awesome-project'>".
  "<div class='awesome-img'>".
    "<a href='#'><img src='__image__' alt='' /></a>".
    "<div class='add-actions text-center'>".
      "<div class='project-dec'>".
        "<a class='venobox' data-gall='myGallery' href='__image__'>".
          "<h4></h4>".
          "<span style='font-size: 40px;'>+</span>".
        "</a>".
      "</div>".
    "</div>".
  "</div>".
"</div>".
"</div>";

   // abrir un directorio y listarlo recursivo
   if (is_dir($ruta)) {
    if ($dh = opendir($ruta)) {
       while (($file = readdir($dh)) !== false) {

          if (is_file($ruta . $file) && $file!="." && $file!=".." && allowed_file_type($file)){

            $template_values = array("__class__", "__image__");
            $new_values = array(str_replace(' ', '_', basename($ruta)), $ruta . $file);

            $new_template = str_replace($template_values, $new_values, $template);
            echo $new_template;
          }

          if (is_dir($ruta . $file) && $file!="." && $file!=".."){
             listar_archivos($ruta . $file . "/");
          }
       }
    closedir($dh);
    }
 }else
    echo "<br>No es ruta valida";
}

?>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                 <h1><span>Vidriería Ezeiza</span></h1> 
                  <!-- Uncomment below if you prefer to use an image logo -->
                <!--   <img src="img/logo.png" alt="" title=""> -->
								</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active">
                    <a class="page-scroll" href="#home">Inicio</a>
                  </li>
                 <!-- <li>
                    <a class="page-scroll" href="#about">Quienes somos</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#services">Nuestros servicios</a>
                  </li> -->
                  <li>
                    <a class="page-scroll" href="#portfolio">Nuestros trabajos</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#contact">Contáctenos</a>
                  </li>
                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->

  <!-- Start Slider Area -->
  <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">
        <img src="img/slider/slider1.jpg" alt="" title="#slider-direction-1" />
        <img src="img/slider/slider2.jpg" alt="" title="#slider-direction-2" />
        <img src="img/slider/slider3.jpg" alt="" title="#slider-direction-3" />
      </div>

      <!-- direction 1 -->
      <div id="slider-direction-1" class="slider-direction slider-one">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1"> </h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <!-- <h1 class="title2">Más de 30 años de experiencia</h1> -->
                </div>
                <!-- layer 3 -->
               <!-- <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                  <a class="ready-btn page-scroll" href="#about">Learn More</a>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 2 -->
      <div id="slider-direction-2" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content text-center">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1"></h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <!--<h1 class="title2">Atendido por sus dueños</h1> -->
                </div>
                <!-- layer 3 
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                  <a class="ready-btn page-scroll" href="#about">Learn More</a>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 3 -->
      <div id="slider-direction-3" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1"></h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                <!--  <h1 class="title2">Presupuestos sin cargo...</h1> -->
                </div>
                <!-- layer 3 
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                  <a class="ready-btn page-scroll" href="#about">Learn More</a>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Slider Area -->

  <!-- Start About area -->
 <!-- <div id="about" class="about-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>About eBusiness</h2>
          </div>
        </div>
      </div> -->
       <!--<div class="row"> -->
        <!-- single-well start-->
       <!-- <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
              <a href="#">
								  <img src="img/about/1.jpg" alt="">
								</a>
            </div>
          </div>
        </div> -->
        <!-- single-well end-->
       <!-- <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
              <a href="#">
                <h4 class="sec-head">project Maintenance</h4>
              </a>
              <p>
                Redug Lagre dolor sit amet, consectetur adipisicing elit. Itaque quas officiis iure aspernatur sit adipisci quaerat unde at nequeRedug Lagre dolor sit amet, consectetur adipisicing elit. Itaque quas officiis iure
              </p>
              <ul>
                <li>
                  <i class="fa fa-check"></i> Interior design Package
                </li>
                <li>
                  <i class="fa fa-check"></i> Building House
                </li>
                <li>
                  <i class="fa fa-check"></i> Reparing of Residentail Roof
                </li>
                <li>
                  <i class="fa fa-check"></i> Renovaion of Commercial Office
                </li>
                <li>
                  <i class="fa fa-check"></i> Make Quality Products
                </li>
              </ul>
            </div>
          </div>
        </div> -->
        <!-- End col-->
   <!--   </div>
    </div>
  </div> -->
  <!-- End About area -->

  <!-- Start Service area -->
  <!--<div id="services" class="services-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline services-head text-center">
            <h2>Our Services</h2>
          </div>
        </div>
      </div>
      <div class="row text-center">
        <div class="services-contents"> -->
          <!-- Start Left services -->
          <!--<div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
											<i class="fa fa-code"></i>
										</a>
                  <h4>Expert Coder</h4>
                  <p>
                    will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                  </p>
                </div>
              </div> -->
              <!-- end about-details -->
         <!--   </div>
          </div> 
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
											<i class="fa fa-camera-retro"></i>
										</a>
                  <h4>Creative Designer</h4>
                  <p>
                    will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                  </p>
                </div>
              </div> -->
              <!-- end about-details -->
         <!--   </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12"> -->
            <!-- end col-md-4 -->
           <!-- <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
											<i class="fa fa-wordpress"></i>
										</a>
                  <h4>Wordpress Developer</h4>
                  <p>
                    will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                  </p>
                </div>
              </div> -->
              <!-- end about-details -->
         <!--   </div>
          </div> 
          <div class="col-md-4 col-sm-4 col-xs-12"> -->
            <!-- end col-md-4 -->
       <!--     <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
											<i class="fa fa-camera-retro"></i>
										</a>
                  <h4>Social Marketer </h4>
                  <p>
                    will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                  </p>
                </div>
              </div> -->
              <!-- end about-details -->
          <!--  </div>
          </div> -->
          <!-- End Left services -->
         <!-- <div class="col-md-4 col-sm-4 col-xs-12"> -->
            <!-- end col-md-4 -->
         <!--   <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
											<i class="fa fa-bar-chart"></i>
										</a>
                  <h4>Seo Expart</h4>
                  <p>
                    will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                  </p>
                </div>
              </div> -->
              <!-- end about-details -->
        <!--    </div>
          </div> -->
          <!-- End Left services -->
         <!-- <div class="col-md-4 col-sm-4 col-xs-12"> -->
            <!-- end col-md-4 -->
           <!-- <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
											<i class="fa fa-ticket"></i>
										</a>
                  <h4>24/7 Support</h4>
                  <p>
                    will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                  </p>
                </div>
              </div> -->
              <!-- end about-details -->
        <!--    </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <!-- End Service area -->

  <!-- Start portfolio Area -->
  <div id="portfolio" class="portfolio-area area-padding fix">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Nuestros trabajos</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Start Portfolio -page -->
        <div class="awesome-project-1 fix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="awesome-menu ">
              <ul class="project-menu">
                <li>
                  <a href="#" class="active" data-filter="*">Todo</a>
                </li>

                <?php listar_directorios('./img/gallery/') ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="awesome-project-content">

          <?php listar_archivos('./img/gallery/') ?>

        </div>
      </div>
    </div>
  </div>
  <!-- awesome-portfolio end -->

  <!-- Start contact Area -->
  <div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Contáctenos</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-whatsapp"></i>
                <p>
                  Tel: (011) 15-4974-3155<br>
                  Tel: (011) 15-3538-1017<br>
                  <span>Lunes-Viernes (8:00-12:00 / 15:00-19:00)</span><br>
                  <span>Sábado (8:00-13:00)</span>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-envelope-o"></i>
                <p>
                   Email: <a href="mailto:contacto@vidrieriaezeiza.com.ar">contacto@vidrieriaezeiza.com.ar</a><br>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-map-marker"></i>
                <p>
                  Presidente Néstor Kirchner 810<br>
                  <span>B1804CCV, Ezeiza, Buenos Aires</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- Start Google Map -->
          <div class="col-xs-12">
            <!-- Start Map -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13096.87973038438!2d-58.51646854573974!3d-34.850700721956756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x376d30081f375ba2!2sVidrier%C3%ADa%20Ezeiza!5e0!3m2!1sen!2sar!4v1581117004565!5m2!1sen!2sar" width="100%" height="380" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            <!-- End Map -->
          </div>
          <!-- End Google Map -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Contact Area -->

  <!-- Start Footer bottom Area -->
  <footer>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>Vidriería Ezeiza</strong>.
              </p>
            </div>
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
              
              Diseñado por <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/knob/jquery.knob.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/parallax/parallax.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
  <script src="lib/appear/jquery.appear.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <script src="js/main.js"></script>
</body>

</html>
