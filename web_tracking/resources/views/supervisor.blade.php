<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Supervisor - SAKERNAS BPS Kabupaten Pasuruan</title>
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

    <style type="text/css">
        div.container
        {
        width: 80%;
        }
    </style>
    <!-- =======================================================
  * Template Name: Vesperr - v4.10.0
  * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

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
                    <li><a class="nav-link scrollto" href="signout">Log out</a></li>
                    <li><a class="nav-link scrollto" href="#">Anda masuk sebagai: {{ $user_name }}</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Form Section ======= -->
    <section id="form" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                    <div class="row">
                        <!-- First Card -->
                        <div class="col-lg-12 col-md-12" style='padding-top:65px;'>
                        <center>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #3498db; color: white;">
                                Petugas Lapangan
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                @foreach($petlapNames as $row)
                                <li><a onclick="showForm('x{{ $row -> id }}')" class="dropdown-item" href="#">{{ $row -> nama }}</a></li>
                                @endforeach
                            </ul>
                            </div>
                            </center>
                            <br>
                            <div class="card info-card customers-card">
                                @foreach($petlapNames as $motherRow)
                                <div class="card-body" id="petlapForm{{ $motherRow -> id }}" style="display: none;">
                                    <!-- ========================= Isi Card ========================= -->
                                    <center>
                                    <p class="fst-italic" style='font-size:30px;color: #1C256A;'><b>Form Survei SAKERNAS 2023</b></p>
                                    </center>
                                    <br>
                                    
                                    @if (\Session::has('success'))
                                    <div class="alert alert-success">
                                        <span class="closebtn" onclick="this.parentElement.style.display='none';">X</span>
                                        <strong>{!! \Session::get('success') !!}</strong>
                                    </div>
                                    @endif
                                    
                                    <div style="overflow-x:auto;">
                                        <table class="table display-center" id="example" style='font-size:20px;position:center;'>
                                            <thead align=center>
                                                <tr>
                                                    <th>ID Plot</th>
                                                    <th>Provinsi</th>
                                                    <th>Kabupaten</th>
                                                    <th>NKS</th>
                                                    <th>Ruta</th>
                                                    <th>Status</th>
                                                    <th>Gambar</th>
                                                </tr>
                                            </thead>
                                            <tbody align=center>
                                            @foreach($dbSupervisor as $row)
                                                @if($motherRow -> id == $row -> id_petlap_fk)
                                                <tr>
                                                    <td>
                                                        <p style="font-size: 13pt;">{{ $row -> id_plot }}</p></td>
                                                    <td>
                                                        <p style="font-size: 13pt;">{{ $row -> id_provinsi_fk }}</p></td>
                                                    <td>
                                                        <p style="font-size: 13pt;">{{ $row -> id_kabupaten_fk }}</p></td>
                                                    <td>
                                                        <p style="font-size: 13pt;">{{ $row -> kode_nks_fk }}</p></td>
                                                    <td>
                                                        <p style="font-size: 13pt;">{{ $row -> ruta }}</p></td>
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
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        @foreach ($photos as $photo)
                                                            @if($photo -> id_plot_fk == $row -> id_plot)
                                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $row -> id_plot }}" style="background-color: #3498db; color: white;">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                                </svg>
                                                                View</button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="staticBackdrop{{ $row -> id_plot }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" style="position: relative;">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="staticBackdropLabel">Image Preview</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <img class="img-fluid" src="{{ asset('storage/imejis/'.$photo -> name) }}">
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="button"  class="btn btn-primary" style="color:white"><a href="{{ asset('storage/imejis/'.$photo -> name) }}" download style="color:white;">Download</a></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                        <!-- View Image -->
                                                        
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @endforeach
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

    <script>
        // Show form card
        function showForm(petugas)
        {
            @foreach($petlapNames as $row)
            if (petugas == 'x{{ $row -> id }}')
            {
                var show = document.getElementById('petlapForm{{ $row -> id }}');
                
                $(show).fadeIn('medium');
                // show.style.display = 'block';
            }

            if (petugas != 'x{{ $row -> id }}')
            {
                var hide = document.getElementById('petlapForm{{ $row -> id }}')

                $(hide).fadeOut('medium');
                // hide.style.display = 'none';
            }
            @endforeach
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