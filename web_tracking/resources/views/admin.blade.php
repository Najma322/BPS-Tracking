<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin - SAKERNAS BPS Kabupaten Pasuruan</title>
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

<body>

    <!-- ======= Header ======= -->
    <section>
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
                        <li onclick="showPlot()"><a class="nav-link scrollto active" href="#">Plotting</a></li>
                        <li onclick="showMonitor()"><a class="nav-link scrollto" href="#">Monitor</a></li>
                        <li onclick="showRegister()"><a class="nav-link scrollto" href="#">Register</a></li>
                        <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                        <li><a class="nav-link scrollto" href="signout">Log Out</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav>
                <!-- .navbar -->
            </div>
        </header>
    </section>
    <!-- End Header -->

    <!-- ======= Form Section ======= -->
    <div class="container" id="cardPlot">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- First Card -->
                    <div class="col-lg-12 col-md-12" style='padding-top:65px;'>
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <!-- ========================= Isi Card ========================= -->
                                <center>
                                    <p class="fst-italic" style='font-size:30px;color: #1C256A;'><b>Form Survei SAKERNAS 2023</b></p>
                                </center>
                                <div style="overflow-x:auto;">
                                    <table class="table display-center" id="forPetlap" style='font-size:20px;position:center;'>
                                        <thead align=center>
                                            <tr>
                                                <th> </th>
                                                <th>Provinsi</th>
                                                <th>Kabupaten</th>
                                                <th>NKS</th>
                                                <th>Ruta</th>
                                                <th>ID Petugas Lapangan</th>
                                                <th>ID Supervisor</th>
                                            </tr>
                                        </thead>
                                        <tbody align=center>
                                            <tr>
                                                <td>
                                                    <p style="font-size: 13pt;">1</p>
                                                </td>
                                                <td>
                                                    <p style="font-size: 13pt;">35</p>
                                                </td>
                                                <td>
                                                    <p style="font-size: 13pt;">14</p>
                                                </td>
                                                <td>
                                                    <p style="font-size: 13pt;">10023</p>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Ruta" placeholder="Range Ruta">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="IDPetlap" placeholder="ID Petlap">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="IDSup" placeholder="ID Supervisor">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Form section -->

    <!------------------------- Form Monitor Supervisor ------------------------->
    <div class="container" style="display: none;" id="cardMonitor">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- First Card -->
                    <div class="col-lg-12 col-md-12" style='padding-top:65px;'>
                        <center>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Jabatan
                            </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li onclick="gantiHalamanLap()"><a class="dropdown-item">Petugas Lapangan</a></li>
                                    <li onclick="gantiHalamanSup()"><a class="dropdown-item">Supervisor</a></li>
                                </ul>
                            </div>
                        </center>
                        <br>
                        <!------------------------- CARD SUPERVISOR ------------------------->
                        <div id="sup" class="card info-card customers-card">
                            <div class="card-body">
                                <center>
                                    <p class="fst-italic" style='font-size:30px;color: #1C256A;'><b>Daftar Supervisor SAKERNAS 2023</b></p>
                                </center>
                                <div style="overflow-x:auto;">
                                    <table class="table display-center" id="forPetlap" style='font-size:20px;position:center;'>
                                        <thead align=center>
                                            <tr>
                                                <th>ID Pegawai</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody align=center>
                                            @foreach($dbUsers as $row)
                                            @if($row -> id_role_fk == 2)
                                            <tr>
                                                <td>
                                                    <p style="font-size: 13pt;">{{ $row -> id }}</p>
                                                </td>
                                                <td>
                                                    <p style="font-size: 13pt;">{{ $row -> nama }}</p>
                                                </td>
                                                <td>
                                                    <p style="font-size: 13pt;">{{ $row -> username }}</p>
                                                </td>
                                                <td>
                                                    <p style="font-size: 13pt;">{{ $row -> email }}</p>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!------------------------- CARD PETLAP ------------------------->
                        <div id="petlap" class="card info-card customers-card" style="display: none;">
                            <div class="card-body">
                                <center>
                                    <p class="fst-italic" style='font-size:30px;color: #1C256A;'><b>Daftar Petugas Lapangan SAKERNAS 2023</b></p>
                                </center>
                                <div style="overflow-x:auto;">
                                    <table class="table display-center" id="forPetlap" style='font-size:20px;position:center;'>
                                        <thead align=center>
                                            <tr>
                                                <th>Id </th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody align=center>
                                            @foreach($dbUsers as $row)
                                            @if($row -> id_role_fk == 1)
                                            <tr>
                                                <td>
                                                    <p style="font-size: 13pt;">{{ $row -> id }}</p>
                                                </td>
                                                <td>
                                                    <p style="font-size: 13pt;">{{ $row -> nama }}</p>
                                                </td>
                                                <td>
                                                    <p style="font-size: 13pt;">{{ $row -> username }}</p>
                                                </td>
                                                <td>
                                                    <p style="font-size: 13pt;">{{ $row -> email }}</p>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =====End monitor supervisor   -->

    <!-- ======= Register Section ======= -->
    <div class="container" id="cardRegister" style="display: none;">
        <br>
        <div class="row">
            <div class="col-lg-5 pt-6 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <center>
                    <h1 class="fst-italic" style="font-size: 40px; color: #1C256A;">Survei Angkatan Kerja Nasional (SAKERNAS) 2023</h1>
                </center>
                <br>
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">X</span>
                        <strong>{!! \Session::get('success') !!}</strong>
                    </div>
                @endif
                <form method='post' action="{{ route('register.custom') }}">
                    {{ csrf_field() }}
                    <!-- Email address input-->
                    <div class="row input-group-newsletter">
                        <input class="form-control" name="name" id="text" type="text" placeholder="Nama Lengkap" value="{{ old('name') }}"/>
                    </div>
                    <br>
                    <div class="row input-group-newsletter">
                        <input class="form-control" name="username" id="username" type="username" placeholder="Username" value="{{ old('username') }}"/>
                    </div>
                    <br>
                    <div class="row input-group-newsletter">
                        <input class="form-control" name="email" id="email" type="email" placeholder="Email" value="{{ old('email') }}"/>
                    </div>
                    <br>
                    <div class="row input-group-newsletter">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password"/>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>
                    <div class="row input-group-newsletter">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password" placeholder="Konfirmasi password"/>
                    </div>
                    <br>
                    <p>Petugas</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="petugas" id="flexRadioDefault1" value="1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Lapangan
                        </label>
                        <br>
                        <input class="form-check-input" type="radio" name="petugas" id="flexRadioDefault2" value="2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Supervisor
                        </label>
                    </div>
                    <br>
                    <div class="container">
                        <div class="row align-items-start">
                            <div class="col-4">
                                <input type="submit" name="register" class="btn btn-secondary" value="Sign Up" />
                            </div>
                        </div>
                    </div>
                    <br>
                </form>
                
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
                <img src="./bps_resources/img/hero-img.png" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>
    <!-- End Register -->

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
    <script> //Show page section
        function showPlot()
        {
            var x = document.getElementById('cardPlot');
            var y = document.getElementById('cardMonitor');
            var z = document.getElementById('cardRegister');

            x.style.display = 'block';
            y.style.display = 'none';
            z.style.display = 'none';
        }

        function showMonitor()
        {
            var x = document.getElementById('cardPlot');
            var y = document.getElementById('cardMonitor');
            var z = document.getElementById('cardRegister');

            x.style.display = 'none';
            y.style.display = 'block';
            z.style.display = 'none';
        }

        function showRegister()
        {
            var x = document.getElementById('cardPlot');
            var y = document.getElementById('cardMonitor');
            var z = document.getElementById('cardRegister');

            x.style.display = 'none';
            y.style.display = 'none';
            z.style.display = 'block';
        }
    </script>
    <script> //Show monitor card
        function gantiHalamanSup()
        {
            var x = document.getElementById("petlap");
            var y = document.getElementById("sup");

            x.style.display = "none";
            y.style.display = "block";
        }

        function gantiHalamanLap()
        {
            var x = document.getElementById("petlap");
            var y = document.getElementById("sup");

            x.style.display = "block";
            y.style.display = "none";
        }
    </script>
    <script> // Change active class when clicked
        // Get the container element
        var btnContainer = document.getElementById("navbar");

        // Get all buttons with class="btn" inside the container
        var btns = btnContainer.getElementsByClassName("nav-link");

        // Loop through the buttons and add the active class to the current/clicked button
        for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
        }
    </script>
</body>

</html>