<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SAKERNAS BPS Kabupaten Pasuruan</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="./bps_resources/css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Background Video-->
    <video class="bg-video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop"><source src="./bps_resources/assets/mp4/bg1.mp4" type="video/mp4" /></video>
    <!-- Masthead-->
    <div class="masthead">
        <div class="masthead-content text-white">
            <div class="card bg-light" style="width: 35rem;">
<<<<<<< Updated upstream
                <div class="card" style="width: 35rem;">
                    <div class="container-fluid px-3 px-lg-3" style='padding-left:1000px'>
=======
                <div class="card" style="width: 40rem;">
                <div class="container-fluid" style="margin:auto;">
>>>>>>> Stashed changes
                        <center>
                            <h1 class="fst-italic" style="font-size: 40px; color: #1C256A;">Badan Pusat Statistik</h1>
                            <h1 class="fst-italic" style="font-size: 40px; color:#1C256A;">Kabupaten Pasuruan</h1>
                        </center>
                        <center>
                            <p class="mb-5" style="color: #1C256A;">Survei Angkatan Kerja Nasional</p>
                        </center>
<<<<<<< Updated upstream
                        
                        <form method="post" action="{{ route('login.custom') }}">
                            {{ csrf_field() }}
                            <!-- username input-->
                            <div class="row input-group-newsletter">
                                <div class="col"><input class="form-control" name="username" type="text" placeholder="Enter your username" required/></div>
                                @if ($errors->has('username'))
                                    <span class="text-danger">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                            <br>
                            <div class="row input-group-newsletter">
                                <div class="col"><input class="form-control" name="password" type="password" src="" placeholder="Enter your password" required/></div>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <br>
                            <center>
                                <input type="submit" name="login" value="Login">
                            </center>
=======

                        <form id="contactForm">
                            <!-- Email address input-->
                            <div class="row input-group-newsletter">
                                <div class="col"><input class="form-control" id="email" type="email" placeholder="Enter email address..." aria-label="Enter email address..." data-sb-validations="required,email" /></div>
                            </div>
                            <br>
                            <div class="row input-group-newsletter">
                                <div class="col"><input class="form-control" id="password" type="password" src="" /></div>
                            </div>
                            <br>
                            <div class="container">
                            <div class="row align-items-start">
                                <div class="col-4">
                                <button type="button" class="btn btn-secondary">Login</button>
                                </div>
                                <div class="col-8">
                                <li class="breadcrumb-item"><a href="/register">Didn't have any account? Create account</a></li>
                                </div>
                            </div>
                            </div>
>>>>>>> Stashed changes
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Social Icons-->
        <!-- For more icon options, visit https://fontawesome.com/icons?d=gallery&p=2&s=brands-->
        <!-- <div class="social-icons">
            <div class="d-flex flex-row flex-lg-column justify-content-center align-items-center h-100 mt-3 mt-lg-0">
                <a class="btn btn-dark m-3" href="#!"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-dark m-3" href="#!"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-dark m-3" href="#!"><i class="fab fa-instagram"></i></a>
            </div>
        </div> -->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>