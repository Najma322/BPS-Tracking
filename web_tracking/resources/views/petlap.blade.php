<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Petlap - SAKERNAS BPS Kabupaten Pasuruan</title>
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
    <!-- Webcam -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

    <!-- Template Main CSS File -->
    <link href="./bps_resources/css/style.css" rel="stylesheet">

    <!-- Webcam -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js" integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                <a class="navbar-brand" href="/index" style="font-size: 25px;"><b>Badan Pusat Statistik</b></a>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="/index">Home</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    <li><a class="nav-link scrollto" href="signout">Log out</a></li>
                    <li><a class="nav-link" href="#">Anda masuk sebagai: {{ $user_name }}</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->

        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Plotting Section ======= -->
    <section id="form" class="d-flex align-items-center">

        <div class="container">
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
                                    <br> @if (\Session::has('successUpdate'))
                                    <div class="alert alert-success">
                                        <span class="closebtn" onclick="this.parentElement.style.display='none';">X</span>
                                        <strong>{!! \Session::get('successUpdate') !!}</strong>
                                    </div>
                                    @endif
                                    <!-- Allert Image -->
                                    @if (\Session::has('status'))
                                    <div class="alert alert-success">
                                        <span class="closebtn" onclick="this.parentElement.style.display='none';">X</span>
                                        <strong>{!! \Session::get('status') !!}</strong>
                                    </div>
                                    @endif

                                    @if (\Session::has('errorExist'))
                                    <div class="alert alert-danger">
                                        <span class="closebtn" onclick="this.parentElement.style.display='none';">X</span>
                                        <strong>{!! \Session::get('errorExist') !!}</strong>
                                    </div>
                                    @endif

                                    <div style="overflow-x:auto;">
                                        <table class="table display-center" id="forPetlap" style='font-size:20px;position:center;'>
                                            <thead align=center>
                                                <tr>
                                                    <th>ID Plotting</th>
                                                    <th>Provinsi</th>
                                                    <th>Kabupaten</th>
                                                    <th>NKS</th>
                                                    <th>Ruta</th>
                                                    <th>Gambar</th>
                                                    <th>Status</th>
                                                    <th>Update Status</th>
                                                </tr>
                                            </thead>
                                            <tbody align=center>

                                                <!-- Camera Modal -->
                                                <div class="modal fade" id="webcamModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Upload Gambar</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="{{ route('take.image') }}">
                                                                    {{ csrf_field() }}
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div id="my_camera"></div>
                                                                            <br/>
                                                                            <input type="button" value="Take Snapshot" onClick="take_snapshot()">
                                                                            <input type="hidden" name="image" class="image-tag">
                                                                            <input type="hidden" id="cameraPlot" name="id_plot_img" value="">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div id="results">Your captured image will appear here...</div>
                                                                        </div>
                                                                        <div class="col-md-12 text-center">
                                                                            <br/>
                                                                            <!-- <button class="btn btn-success">Submit</button> -->
                                                                            <input type="submit" class="btn btn-success">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END of camera modal -->

                                                @foreach($dbPlotting as $row)
                                                    <tr>
                                                        <td>
                                                            <p style="font-size: 13pt;">{{ $row -> id_plot }}</p>
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
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $row -> id_plot }}" style="color:white">
                                                                Upload Gambar
                                                            </button>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal{{ $row -> id_plot }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Upload Gambar</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                                                                                {{ csrf_field() }}
                                                                                <input type="hidden" name="id_plot_img" value="{{ $row -> id_plot }}">
                                                                                <div class="mb-3">
                                                                                    <label class="form-label" for="inputImage">Image:</label>
                                                                                    <input type="file" name="image" id="inputImage" class="form-control @error('image') is-invalid @enderror">
                                                                                    @error('image')
                                                                                    <span class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <input type="submit" class="btn" style="color: white; background-color: #3498db;" />
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Button trigger CAMERA modal -->
                                                            <button type="button" onclick="attachCam({{ $row -> id_plot }})" class="btn" data-bs-toggle="modal" data-bs-target="#webcamModal" style='background-color: seagreen; color:white'>
                                                                Ambil Gambar
                                                            </button>
                                                            
                                                        </td>
                                                        <form method="post" action="{{ route('update.plotting') }}">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="id_plot" value="{{ $row -> id_plot }}">
                                                            <td>
                                                                <select name="status" id="status" style="font-size: 13pt;" value>
                                                                    @if($row -> state == 1)
                                                                    <option selected hidden value="1" style="font-size: 12pt;">1. Berhasil</option>
                                                                    @elseif($row -> state == 2)
                                                                    <option selected hidden value="2" style="font-size: 12pt;">2. Menolak</option>
                                                                    @elseif($row -> state == 3)
                                                                    <option selected hidden value="3" style="font-size: 12pt;">3. Tidak dapat ditemui</option>
                                                                    @else
                                                                    <option selected hidden value="0" style="font-size: 12pt;">0. Belum selesai</option>
                                                                    @endif
                                                                    <option value="1" style="font-size: 12pt;">1. Berhasil</option>
                                                                    <option value="2" style="font-size: 12pt;">2. Menolak</option>
                                                                    <option value="3" style="font-size: 12pt;">3. Tidak dapat ditemui</option>
                                                                    <option value="0" style="font-size: 12pt;">0. Belum selesai</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="submit" value="Update" class="btn" name="submit" style="color: white; background-color: #3498db;">
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
    
    <!-- Webcam -->
    <script language="JavaScript">
        function attachCam(plot_index)
        {
            document.getElementById('cameraPlot').value = plot_index;
            Webcam.set
            ({
                width: 490,
                height: 350,
                image_format: 'jpeg',
                jpeg_quality: 90
            });
        
            Webcam.attach( '#my_camera' );
        }
        
        function take_snapshot() {
            Webcam.snap( function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
            } );
        }
    </script>

</body>

</html>