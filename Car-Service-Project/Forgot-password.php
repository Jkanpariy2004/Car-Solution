<?php
include('database.php');
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $sql = "select * from registration where email='$email'";
    $chk = mysqli_query($db, $sql);
    if (mysqli_num_rows($chk)) {
        $otp = rand(10000, 20000);


        include('smtp/PHPMailerAutoload.php');

        $mail = new PHPMailer;

        $mail->isSMTP();                                   // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                            // Enable SMTP authentication
        $mail->Username = "jainishkanpariya@gmail.com";
        $mail->Password = "ctgzymlrrjrktave"; // SMTP password
        $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                 // TCP port to connect to

        $mail->setFrom(' ', 'CodexWorld');
        $mail->addReplyTo('', 'CodexWorld');
        $mail->addAddress(@$email);   // Add a recipient
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        $mail->isHTML(true);  // Set email format to HTML



        $mail->Subject = 'OTP';
        $mail->Body    = "Welcome to car Solution <br> Your OTP is : " . @$otp;

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $_SESSION['otp'] = $otp;
            $_SESSION['email'] = $email;
            header('location:email_otp.php');
            $errors['success'] = 'Otp has been sent in your Email Address.';
        }
    } else {
        echo '<script>
            alert("Email is not Registered in Database.");
        </script>';
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Car Solution</title>
    <link rel="icon" class="circle-rounded" type="image/png" href="img/logo.png" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.7.2/css/all.css"></script>

    <style>
        body {
            background-image: url('image/colorful-wallpaper-background-multicolored-generative-ai.jpg');
            background-size: cover;
            background-position: center;
        }

        .login {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .loginbg {
            color: #000;
            width: 50%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            background: rgba(255, 255, 255, 0.20);
            backdrop-filter: blur(10px);
        }

        .alert {
            animation: fadeInDown;
            animation-fill-mode: both;
            animation-duration: .7s;
            animation-delay: .1s;
        }

        .alert.alert-danger {
            background-color: transparent;
            padding: 0;
            color: red;
            border: none;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .alert.alert-success {
            background-color: transparent;
            padding: 0;
            color: #00ff01;
            border: none;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .toggle {
            margin-right: 15px;
            color: white;
        }

        .was-validated .form-control:invalid,
        .form-control.is-invalid {
            border-color: red;
            padding-right: calc(1.5em + 0.75rem);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='red'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='red' stroke='none'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }
    </style>

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="Home.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img src="img/logo.png" class="rounded-circle" width="70" height="70" alt="">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="Home.php" class="nav-item nav-link">Home</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Car Service</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a href="car-packages.php" class="dropdown-item">Car Service Packages</a>
                        <a href="car-rent.php" class="dropdown-item">Car Rent</a>
                        <a href="car-booking.php" class="dropdown-item">Car Booking</a>
                        <a href="car-insurance.php" class="dropdown-item">Car Insurance</a>
                        <a href="old-car.php" class="dropdown-item">Used Car Selling & Purchasing</a>
                    </div>
                </div>
                <a href="RSA.php" class="nav-item nav-link">RSA Servive</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Find Fuel & Ev</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a href="find-fual.php" class="dropdown-item">Find Fuel Data</a>
                        <a href="find-ev.php" class="dropdown-item">Find Ev Data</a>
                    </div>
                </div>
                <a href="contact.php" class="nav-item nav-link">Contact Us</a>
                <a href="news.php" class="nav-item nav-link">News</a>
                <a href="Account.php" class="nav-item nav-link active"><i class="fa-solid fa-user"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <div class="login">
        <form method="POST" class="loginbg p-4 wow fadeIn" data-wow-delay="0.1s" style="max-width: 50%;">
            <div class="text-center">
                <h1 class="m-3 text-white">Forgot Password</h1>
            </div>
            <?php
            if (isset($errors['success'])) {
                echo '<h5 class="alert alert-success mb-3">' . $errors['success'] . '</h5>';
            }
            ?>
            <div class="form-floating mb-3">
                <input type="email" class="form-control rounded-3 <?php if (isset($errors['username'])) echo 'is-invalid'; ?>" autocomplete="off" id="floatingInput" name="email" placeholder="" style="background-color: transparent; color: white;">
                <label for="floatingInput" style="color: white;">Enter Your email</label>
                <?php
                if (isset($errors['username'])) {
                    echo '<h6 class="alert alert-danger">' . $errors['username'] . '</h6>';
                }
                ?>
            </div>

            <div class="m-auto">
                <input type="submit" name="submit" class="btn w-100 btn-primary text-white fs-4 btn mt-3 loginbtn rounded-3" value="Submit">
            </div>
        </form>
    </div>





    <!-- Footer Start -->
    <!-- <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                        Designed By <a class="border-bottom" href="#">Jainish Kanpariya</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Footer End -->


    <!-- Back to Top -->
    <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> -->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>