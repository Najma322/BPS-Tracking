<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login - SAKERNAS BPS Kabupaten Pasuruan</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="./bps_resources/img/BPS.jpg" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="./bps_resources/vendor/aos/aos.css" rel="stylesheet">
    <link href="./bps_resources/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bps_resources/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="./bps_resources/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="./bps_resources/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="./bps_resources/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="./bps_resources/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="./bps_resources/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Vesperr - v4.10.0
  * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body style="background-image: url({{ asset('./bps_resources/img/bg.jpg') }}); background-position:center;">
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <img class="img-fluid" src="./bps_resources/img/BPS.jpg" alt="logo" style="width: 90px; height: 60px;" />
                <a class="navbar-brand" href="index_manager.html" style="font-size: 25px;"><b>Badan Pusat Statistik</b></a>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">

            <div class="row">
                <div class="col-lg-5 pt-6 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <center>
                        <h1 class="fst-italic" style="font-size: 40px; color: #1C256A;">Survei Angkatan Kerja Nasional (SAKERNAS 2023)</h1>
                    </center>
                    <br>
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">X</span>
                            <strong>{!! \Session::get('success') !!}</strong>
                        </div>
                    @endif
                    <form method="post" action="{{ route('login.custom') }}">
                        {{ csrf_field() }}

                        @if (\Session::has('error'))
                            <div class="alert alert-danger">
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">X</span>
                                <strong>{!! \Session::get('error') !!}</strong>
                            </div>
                        @endif

                        <!-- username input-->
                        <div class="row input-group-newsletter">
                            <div class="col"><input class="form-control" name="username" id="username" type="text" placeholder="Enter username" aria-label="Enter username" required/></div>
                        </div>
                        <br>
                        <!-- password input-->
                        <div class="row input-group-newsletter">
                            <div class="col"><input class="form-control" name="password" id="password" type="password" src="" placeholder="Enter password" required/></div>
                        </div>
                        <input type="checkbox" value="lsRememberMe" id="rememberMe" name="remember" value="1"> <label for="rememberMe">Remember me</label>
                        <br>
                        <br>
                        <input type="submit" class="btn btn-secondary" name="login" value="Login">
                    </form>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
                    <img src="./bps_resources/img/hero-img.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section>
    <!-- End Hero -->

    <main id="main">
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Contact Us</h2>
                </div>

                <div class="row">

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="contact-about">
                            <h3>Badan Pusat Statistik Kabupaten Pasuruan</h3>
                            <p align="justify">Badan Pusat Statistik adalah Lembaga Pemerintah Non Kementerian yang bertanggung jawab langsung kepada Presiden. Sebelumnya, BPS merupakan Biro Pusat Statistik, yang dibentuk berdasarkan UU Nomor 6 Tahun 1960 tentang Sensus
                                dan UU Nomer 7 Tahun 1960 tentang Statistik. Sebagai pengganti kedua UU tersebut ditetapkan UU Nomor 16 Tahun 1997 tentang Statistik. Berdasarkan UU ini yang ditindaklanjuti dengan peraturan perundangan dibawahnya, secara
                                formal nama Biro Pusat Statistik diganti menjadi Badan Pusat Statistik.</p>
                            <div class="social-links">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="info">
                            <div>
                                <i class="ri-map-pin-line"></i>
                                <p>Jalan Sultan Agung No 42, Purutrejo, Kec. Purworejo, Kota Pasuruan, Jawa Timur, 67117</p>
                            </div>

                            <div>
                                <i class="ri-mail-send-line"></i>
                                <p>bps3514@bps.go.id</p>
                            </div>

                            <div>
                                <i class="ri-phone-line"></i>
                                <p>0343-4234-20</p>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Contact Section -->

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 text-lg-left text-center">
                    <div class="copyright">
                        &copy; Copyright <strong>Badan Pusat Statistik</strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/vesperr-free-bootstrap-template/ -->
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
                        <a href="#intro" class="scrollto">Home</a>
                        <a href="#about" class="scrollto">About</a>
                        <a href="#">Privacy Policy</a>
                        <a href="#">Terms of Use</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="./bps_resources/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="./bps_resources/vendor/aos/aos.js"></script>
    <script src="./bps_resources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./bps_resources/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="./bps_resources/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="./bps_resources/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="./bps_resources/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="./bps_resources/js/main.js"></script>

</body>

</html>