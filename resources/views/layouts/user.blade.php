<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="https://e2295160.webdev.cmaisonneuve.qc.ca/Maisonneuve2295160/public/assets/img/favicon.png" type="image/png" />
    <title>{{ config('app.name') }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://e2295160.webdev.cmaisonneuve.qc.ca/Maisonneuve2295160/public/assets/css/bootstrap.css" />
    <link rel="stylesheet" href="https://e2295160.webdev.cmaisonneuve.qc.ca/Maisonneuve2295160/public/assets/css/flaticon.css" />
    <link rel="stylesheet" href="https://e2295160.webdev.cmaisonneuve.qc.ca/Maisonneuve2295160/public/assets/css/themify-icons.css" />
    <link rel="stylesheet" href="https://e2295160.webdev.cmaisonneuve.qc.ca/Maisonneuve2295160/public/assets/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://e2295160.webdev.cmaisonneuve.qc.ca/Maisonneuve2295160/public/assets/vendors/nice-select/css/nice-select.css" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- main css -->
    <link rel="stylesheet" href="https://e2295160.webdev.cmaisonneuve.qc.ca/Maisonneuve2295160/public/assets/css/style.css" />
  </head>

  <body>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area white-header">
      <div class="main_menu">
        <div class="search_input" id="search_input_box">
          <div class="container">
            <form class="d-flex justify-content-between" method="" action="">
              <input
                type="text"
                class="form-control"
                id="search_input"
                placeholder="Rechercher..."
              />
              <button type="submit" class="btn"></button>
              <span
                class="ti-close"
                id="close_search"
                title="Close Search"
              ></span>
            </form>
          </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand" href="{{route('index')}}">
              <img class="logo-2" src="https://e2295160.webdev.cmaisonneuve.qc.ca/Maisonneuve2295160/public/assets/img/logo2.png" alt="" />
            </a>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon-bar"></span> <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div
              class="collapse navbar-collapse offset"
              id="navbarSupportedContent"
            >
              <ul class="nav navbar-nav menu_nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('index')}}">Accueil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('about-us')}}">À propos</a>
                </li>
                <li class="nav-item submenu dropdown">
                  <a
                    href="#"
                    class="nav-link dropdown-toggle"
                    data-toggle="dropdown"
                    role="button"
                    aria-haspopup="true"
                    aria-expanded="false"
                    >Stages</a
                  >
                  <ul class="dropdown-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('courses')}}">Liste des stages</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('course-details')}}"
                        >Afficher un stage</a
                      >
                    </li>
                  </ul>
                </li>
                <li class="nav-item submenu dropdown">
                  <a
                    href="#"
                    class="nav-link dropdown-toggle"
                    data-toggle="dropdown"
                    role="button"
                    aria-haspopup="true"
                    aria-expanded="false"
                    >Finissants</a
                  >
                  <ul class="dropdown-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('user.create')}}">Inscription</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('user.index')}}"
                        >Liste des finissants</a
                      >
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('contact')}}">Contact</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link search" id="search">
                    <i class="ti-search"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!--================ End Header Menu Area =================-->


       @yield('content')

<!--================ Start footer Area  =================-->
<footer class="footer-area section_gap">
 <div class="container">
   <div class="row">
     <div class="col-lg-2 col-md-6 single-footer-widget">
       <h4>Top Products</h4>
       <ul>
         <li><a href="#">Managed Website</a></li>
         <li><a href="#">Manage Reputation</a></li>
         <li><a href="#">Power Tools</a></li>
         <li><a href="#">Marketing Service</a></li>
       </ul>
     </div>
     <div class="col-lg-2 col-md-6 single-footer-widget">
       <h4>Quick Links</h4>
       <ul>
         <li><a href="#">Jobs</a></li>
         <li><a href="#">Brand Assets</a></li>
         <li><a href="#">Investor Relations</a></li>
         <li><a href="#">Terms of Service</a></li>
       </ul>
     </div>
     <div class="col-lg-2 col-md-6 single-footer-widget">
       <h4>Features</h4>
       <ul>
         <li><a href="#">Jobs</a></li>
         <li><a href="#">Brand Assets</a></li>
         <li><a href="#">Investor Relations</a></li>
         <li><a href="#">Terms of Service</a></li>
       </ul>
     </div>
     <div class="col-lg-2 col-md-6 single-footer-widget">
       <h4>Resources</h4>
       <ul>
         <li><a href="#">Guides</a></li>
         <li><a href="#">Research</a></li>
         <li><a href="#">Experts</a></li>
         <li><a href="#">Agencies</a></li>
       </ul>
     </div>
     <div class="col-lg-4 col-md-6 single-footer-widget">
       <h4>Newsletter</h4>
       <p>You can trust us. we only send promo offers,</p>
       <div class="form-wrap" id="mc_embed_signup">
         <form
           target="_blank"
           action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
           method="get"
           class="form-inline"
         >
           <input
             class="form-control"
             name="EMAIL"
             placeholder="Your Email Address"
             onfocus="this.placeholder = ''"
             onblur="this.placeholder = 'Your Email Address'"
             required=""
             type="email"
           />
           <button class="click-btn btn btn-default">
             <span>subscribe</span>
           </button>
           <div style="position: absolute; left: -5000px;">
             <input
               name="b_36c4fd991d266f23781ded980_aefe40901a"
               tabindex="-1"
               value=""
               type="text"
             />
           </div>

           <div class="info"></div>
         </form>
       </div>
     </div>
   </div>
   <div class="row footer-bottom d-flex justify-content-between">
     <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
       <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
       Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
       <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
     </p>
     <div class="col-lg-4 col-sm-12 footer-social">
       <a href="#"><i class="ti-facebook"></i></a>
       <a href="#"><i class="ti-twitter"></i></a>
       <a href="#"><i class="ti-dribbble"></i></a>
       <a href="#"><i class="ti-linkedin"></i></a>
     </div>
   </div>
 </div>
</footer>
<!--================ End footer Area  =================-->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://e2295160.webdev.cmaisonneuve.qc.ca/Maisonneuve2295160/public/assets/js/jquery-3.2.1.min.js"></script>
<script src="https://e2295160.webdev.cmaisonneuve.qc.ca/Maisonneuve2295160/public/assets/js/popper.js"></script>
<script src="https://e2295160.webdev.cmaisonneuve.qc.ca/Maisonneuve2295160/public/assets/js/bootstrap.min.js"></script>
<script src="https://e2295160.webdev.cmaisonneuve.qc.ca/Maisonneuve2295160/public/assets/vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="https://e2295160.webdev.cmaisonneuve.qc.ca/Maisonneuve2295160/public/assets/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="https://e2295160.webdev.cmaisonneuve.qc.ca/Maisonneuve2295160/public/assets/js/owl-carousel-thumb.min.js"></script>
<script src="https://e2295160.webdev.cmaisonneuve.qc.ca/Maisonneuve2295160/public/assets/js/jquery.ajaxchimp.min.js"></script>
<script src="https://e2295160.webdev.cmaisonneuve.qc.ca/Maisonneuve2295160/public/assets/js/jquery.validate.min.js"></script>
<script src="https://e2295160.webdev.cmaisonneuve.qc.ca/Maisonneuve2295160/public/assets/js/mail-script.js"></script>
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="https://e2295160.webdev.cmaisonneuve.qc.ca/Maisonneuve2295160/public/assets/js/gmaps.min.js"></script>
<script src="https://e2295160.webdev.cmaisonneuve.qc.ca/Maisonneuve2295160/public/assets/js/contact.js"></script>
<script src="https://e2295160.webdev.cmaisonneuve.qc.ca/Maisonneuve2295160/public/assets/js/theme.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"  crossorigin="anonymous"></script>

</body>
</html>