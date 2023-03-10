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

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/fh-3.3.1/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/fh-3.3.1/datatables.min.js"></script>
    
    <!-- =======================================================
  * Template Name: Vesperr - v4.10.0
  * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body style="background-image: url({{ asset('./bps_resources/img/bg.jpg') }}); background-position:center;">

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
                    <li><a class="nav-link scrollto active" href="/index">Home</a></li>
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
                                <br>
                                @if (\Session::has('successPlot'))
                                <div class="alert alert-success">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">X</span>
                                    <strong>{!! \Session::get('successPlot') !!}</strong>
                                </div>
                                @endif
                                <!-- ========================= Isi Card ========================= -->
                                <center>
                                    <p class="fst-italic" style='font-size:30px;color: #1C256A;'><b>Form Survei SAKERNAS 2023</b></p>
                                </center>
                                <div style="overflow-x:auto;">
                                    <form method="post" action="{{ route('store.plotting') }}">
                                        {{ csrf_field() }}
                                        <table class="table display-center" id="forPetlap" style='font-size:20px;position:center;'>
                                            <thead align=center>
                                                <tr>
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
                                                        <input type="number" name="id_provinsi" class="form-control" id="Provinsi" placeholder="ID Provinsi" value="35">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="id_kabupaten" class="form-control" id="Kabupaten" placeholder="ID Kabupaten" value="14">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="kode_nks" class="form-control" id="NKS" placeholder="Kode NKS">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="ruta_range" class="form-control" id="Ruta" placeholder="Range Ruta">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="id_petlap" class="form-control" id="IDPetlap" placeholder="ID Petlap">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="id_supervisor" class="form-control" id="IDSup" placeholder="ID Supervisor">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <input type="submit" class="btn" name="submit" value="Submit" style="float: right; margin-right: 10%; color: white; background-color: #3498db;">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Form section -->

    <!-- ======= PLOTTING ====== -->
    <div class="container" id="cardPlotting">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- First Card -->
                    <div class="col-lg-12 col-md-12" style='padding-top:65px;'>
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                @if (\Session::has('successDelete'))
                                <div class="alert alert-success">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">X</span>
                                    <strong>{!! \Session::get('successDelete') !!}</strong>
                                </div>
                                @endif
                                <div style="overflow-x:auto;">
                                    <table class="table display-center" id="example" style='font-size:20px;position:center;'>
                                        <thead align=center>
                                            <tr>
                                                <th>ID Plotting</th>
                                                <th>ID PetLap</th>
                                                <th>ID Supervisor</th>
                                                <th>Provinsi</th>
                                                <th>Kabupaten</th>
                                                <th>NKS</th>
                                                <th>Ruta</th>
                                                <th>Status</th>
                                                <th>Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody align=center>
                                            @foreach($dbPlot as $row)
                                            
                                                <tr>
                                                    <td>
                                                        <p style="font-size: 13pt;">{{ $row -> id_plot }}</p>
                                                    </td>
                                                    <td>
                                                        <p style="font-size: 13pt;">{{ $row -> id_petlap_fk }}</p>
                                                    </td>
                                                    <td>
                                                        <p style="font-size: 13pt;">{{ $row -> id_supervisor_fk }}</p>
                                                    </td>
                                                    <td>
                                                        <p style="font-size: 13pt;">{{ $row -> id_provinsi_fk }}</p>
                                                    </td>
                                                    <td>
                                                        <p style="font-size: 13pt;">{{ $row -> id_kabupaten_fk }}</p>
                                                    </td>
                                                    <td>
                                                        <p style="font-size: 13pt;">{{ $row -> kode_nks_fk }}</p>
                                                    </td>
                                                    <td>
                                                        <p style="font-size: 13pt;">{{ $row -> ruta }}</p>
                                                    </td>
                                                    <td>
                                                        @if($row -> state == 1)
                                                        <button type="button" class="btn btn-success">1. Berhasil</button>
                                                        @elseif($row -> state == 2)
                                                        <button type="button" class="btn btn-danger">2. Menolak</button>
                                                        @elseif($row -> state == 3)
                                                        <button type="button" class="btn btn-warning">3. Tidak Dapat Ditemui</button>
                                                        @elseif($row -> state == 0)
                                                        <button type="button" class="btn btn-secondary">0. Belum Selesai</button>
                                                        @endif
                                                    </td>
                                                    <form action="{{ route('delete.data') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <td>
                                                            <input type="hidden" name="id_plot" value="{{ $row -> id_plot }}">
                                                            <input type="submit" class="btn btn-danger" value="Hapus">
                                                        </td>
                                                    </form>
                                                </tr>
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
    <!-- ======= END PLOTTING ======= -->

    <!------------------------- Form Monitor Supervisor ------------------------->
    <div class="container" style="display: none;" id="cardMonitor">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- First Card -->
                    <div class="col-lg-12 col-md-12" style='padding-top:65px;'>
                        <center>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #3498db; color: white;">
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
                                            @foreach($dbUsers as $row) @if($row -> id_role_fk == 2)
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
                                            @endif @endforeach
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
                                                <th>ID Pegawai</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody align=center>
                                            @foreach($dbUsers as $row) @if($row -> id_role_fk == 1)
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
                                            @endif @endforeach
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
                <br> @if (\Session::has('success'))
                <div class="alert alert-success">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">X</span>
                    <strong>{!! \Session::get('success') !!}</strong>
                </div>
                @endif
                <form method='post' action="{{ route('register.custom') }}">
                    {{ csrf_field() }}
                    <!-- Email address input-->
                    <div class="row input-group-newsletter">
                        <input class="form-control" name="name" id="text" type="text" placeholder="Nama Lengkap" value="{{ old('name') }}" />
                    </div>
                    <br>
                    <div class="row input-group-newsletter">
                        <input class="form-control" name="username" id="username" type="username" placeholder="Username" value="{{ old('username') }}" />
                    </div>
                    <br>
                    <div class="row input-group-newsletter">
                        <input class="form-control" name="email" id="email" type="email" placeholder="Email" value="{{ old('email') }}" />
                    </div>
                    <br>
                    <div class="row input-group-newsletter">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" /> @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                    </div>
                    <br>
                    <div class="row input-group-newsletter">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password" placeholder="Konfirmasi password" />
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
                                <input type="submit" name="register" class="btn" value="Sign Up" style="background-color: #3498db; color: white;" />
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
    <script>
        //Show page section
        function showPlot() {
            var x = document.getElementById('cardPlot');
            var y = document.getElementById('cardMonitor');
            var z = document.getElementById('cardRegister');
            var zz = document.getElementById('cardPlotting');

            $(x).fadeIn('medium');
            $(y).fadeOut('medium');
            $(z).fadeOut('medium');
            $(zz).fadeIn('medium');
        }

        function showMonitor() {
            var x = document.getElementById('cardPlot');
            var y = document.getElementById('cardMonitor');
            var z = document.getElementById('cardRegister');
            var zz = document.getElementById('cardPlotting');

            $(x).fadeOut('medium');
            $(y).fadeIn('medium');
            $(z).fadeOut('medium');
            $(zz).fadeOut('medium');
        }

        function showRegister() {
            var x = document.getElementById('cardPlot');
            var y = document.getElementById('cardMonitor');
            var z = document.getElementById('cardRegister');
            var zz = document.getElementById('cardPlotting');

            $(x).fadeOut('fast');
            $(y).fadeOut('fast');
            $(z).fadeIn('medium');
            $(zz).fadeOut('fast');
        }
    </script>
    <script>
        //Show monitor card
        function gantiHalamanSup() {
            var x = document.getElementById("petlap");
            var y = document.getElementById("sup");

            x.style.display = "none";
            y.style.display = "block";
        }

        function gantiHalamanLap() {
            var x = document.getElementById("petlap");
            var y = document.getElementById("sup");

            x.style.display = "block";
            y.style.display = "none";
        }
    </script>
    <script>
        // Change active class when clicked
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

    <!-- DataTables -->
    <script>
        $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');
    
        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            initComplete: function () {
                var api = this.api();
    
                // For each column
                api
                    .columns()
                    .eq(0)
                    .each(function (colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );
                        var title = $(cell).text();
                        $(cell).html('<input type="text" placeholder="' + title + '" />');
    
                        // On every keypress in this input
                        $(
                            'input',
                            $('.filters th').eq($(api.column(colIdx).header()).index())
                        )
                            .off('keyup change')
                            .on('change', function (e) {
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr = '({search})'; //$(this).parents('th').find('select').val();
    
                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search(
                                        this.value != ''
                                            ? regexr.replace('{search}', '(((' + this.value + ')))')
                                            : '',
                                        this.value != '',
                                        this.value == ''
                                    )
                                    .draw();
                            })
                            .on('keyup', function (e) {
                                e.stopPropagation();
    
                                $(this).trigger('change');
                                $(this)
                                    .focus()[0]
                                    .setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });
            },
        });
    });
    </script>
</body>

</html>