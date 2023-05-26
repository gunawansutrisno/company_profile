<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?= $title;?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?= ASSETS_URL ?>img/favicon.png" rel="shortcut icon" type="image/x-icon" width="16" height="16" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Oswald:400,700"> 
    <link rel="stylesheet" href="<?= BASE_URL;?>assets/frontend/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= BASE_URL;?>assets/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL;?>assets/frontend/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= BASE_URL;?>assets/frontend/css/jquery-ui.css">
    <link rel="stylesheet" href="<?= BASE_URL;?>assets/frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= BASE_URL;?>assets/frontend/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= BASE_URL;?>assets/frontend/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= BASE_URL;?>assets/frontend/css/mediaelementplayer.css">
    <link rel="stylesheet" href="<?= BASE_URL;?>assets/frontend/css/animate.css">
    <link rel="stylesheet" href="<?= BASE_URL;?>assets/frontend/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="<?= BASE_URL;?>assets/frontend/css/fl-bigmug-line.css">
    
  
    <link rel="stylesheet" href="<?= BASE_URL;?>assets/frontend/css/aos.css">

    <link rel="stylesheet" href="<?= BASE_URL;?>assets/frontend/css/style.css">
    
  </head>
  <body>

  
    
  
  <?= $header ;?>

    <?php $this->load->view($content);?>
    


    <div class="bg-primary" data-aos="fade">
      <div class="container">
        <div class="row">
          <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-facebook text-white"></span></a>
          <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-twitter text-white"></span></a>
          <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-instagram text-white"></span></a>
          <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-linkedin text-white"></span></a>
          <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-pinterest text-white"></span></a>
          <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-youtube text-white"></span></a>
        </div>
      </div>
    </div>

    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="mb-5">
                <h3 class="footer-heading mb-4">Follow Us</h3>

                <div>
                  <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                </div>
              <!--<h3 class="footer-heading mb-4">About Molindo</h3>-->
              <!--<p>Molindo Incorporated merupakan perusahaan-perusahaan dibawah bendera Molindo Group Companies yang terdiri dari PT Madusari Murni Indah Tbk sebagai holding company dengan 2 perusahaan manufaktur yaitu PT Molindo Raya Industrial sebagai produsen ethanol.</p>-->
            </div>
<!--            <div class="mb-5">
              <h3 class="footer-heading mb-4">Subscribe</h3>
              <form action="#" method="post" class="site-block-subscribe">
                <div class="input-group mb-3">
                  <input type="text" class="form-control border-secondary bg-transparent" placeholder="Enter your email"
                    aria-label="Enter Email" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary rounded-top-right-0" type="button" id="button-addon2">Subscribe</button>
                  </div>
                </div>
              </form>
            </div>-->
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigations</h3>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">History Molindo</a></li>
                  <li><a href="#">Contact</a></li>
                  <!--<li><a href="#">Featured Apartment</a></li>-->
                </ul>
              </div>
<!--              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Membership</a></li>
                </ul>
              </div>-->
            </div>

<!--            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Follow Us</h3>

                <div>
                  <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                </div>
              </div>
            </div>-->

          </div>

          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="mb-5">
              <h3 class="footer-heading mb-4">Watch Live Streaming</h3>

              <div class="block-16">
                <figure>
                  <img src="<?= BASE_URL;?>assets/frontend/images/img_1.jpg" alt="Image placeholder" class="img-fluid rounded">
                  <a href="https://www.youtube.com/embed/Rzv-aINunbQ" class="play-button" target="blank"><span class="icon-play"></span></a>
                </figure>
              </div>

            </div>

            

          </div>
          
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;</script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>

  </div>

  <script src="<?= BASE_URL;?>assets/frontend/js/jquery-3.3.1.min.js"></script>
  <script src="<?= BASE_URL;?>assets/frontend/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?= BASE_URL;?>assets/frontend/js/jquery-ui.js"></script>
  <script src="<?= BASE_URL;?>assets/frontend/js/popper.min.js"></script>
  <script src="<?= BASE_URL;?>assets/frontend/js/bootstrap.min.js"></script>
  <script src="<?= BASE_URL;?>assets/frontend/js/owl.carousel.min.js"></script>
  <script src="<?= BASE_URL;?>assets/frontend/js/mediaelement-and-player.min.js"></script>
  <script src="<?= BASE_URL;?>assets/frontend/js/jquery.stellar.min.js"></script>
  <script src="<?= BASE_URL;?>assets/frontend/js/jquery.countdown.min.js"></script>
  <script src="<?= BASE_URL;?>assets/frontend/js/jquery.magnific-popup.min.js"></script>
  <script src="<?= BASE_URL;?>assets/frontend/js/bootstrap-datepicker.min.js"></script>
  <script src="<?= BASE_URL;?>assets/frontend/js/aos.js"></script>
  <script src="<?= BASE_URL;?>assets/frontend/js/circleaudioplayer.js"></script>

  <script src="<?= BASE_URL;?>assets/frontend/js/main.js"></script>
    
  </body>
</html>