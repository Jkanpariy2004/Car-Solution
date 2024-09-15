<?php
session_start();

$_SESSION['timeout'] = time() + 10800;
if (isset($_SESSION['timeout']) && time() > $_SESSION['timeout']) {
    session_unset();
    session_destroy();

    header("Location:Login.php");
}
include("database.php");

if ($_SESSION['username'] == '') {
    header("location:Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Car Solution</title>
    <link rel="icon" class="circle-rounded" type="image/png" href="img/logo.png"/>
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

    <style>

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
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Find Fuel & Ev</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a href="find-fual.php" class="dropdown-item">Find Fuel Data</a>
                        <a href="find-ev.php" class="dropdown-item active">Find Ev Data</a>
                    </div>
                </div>
                <a href="contact.php" class="nav-item nav-link">Contact Us</a>
                <a href="news.php" class="nav-item nav-link">News</a>
                <a href="Account.php" class="nav-item nav-link"><i class="fa-solid fa-user"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/find-fual.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 wow slideInDown">Find EV Caharging Station</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase wow slideInDown">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Find EV Caharging Station</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="container">
        <input type="text" id="citySearch" class="form-control mb-3" placeholder="Search by city...">
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("citySearch");
            const cardboxes = document.querySelectorAll(".cardbox");

            searchInput.addEventListener("input", function() {
                const searchText = this.value.trim().toLowerCase();

                cardboxes.forEach(function(cardbox) {
                    const cityName = cardbox.querySelector(".text-dark").textContent.toLowerCase();
                    if (cityName.includes(searchText)) {
                        cardbox.style.display = "block";
                    } else {
                        cardbox.style.display = "none";
                    }
                });
            });
        });
    </script>

    <div class="container wow fadeIn m-auto" id="team">
        <div class="row">
            <a class="col-xs-12 col-sm-6 col-md-3 p-0 cardbox" href="ev-surat.php">
                <div class="image-flip">
                    <div class="mainflip flip-0">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class="" src="img/surat.svg" width="107" height="90" alt="card image"></p>
                                    <p class="text-dark mt-1">Surat</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a class="col-xs-12 col-sm-6 col-md-3 p-0 cardbox" href="ev-bangalore.php">
                <div class="image-flip">
                    <div class="mainflip flip-0">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class="" src="img/bangalore.svg" width="107" height="90" alt="card image"></p>
                                    <p class="text-dark mt-1">Bangalore</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a class="col-xs-12 col-sm-6 col-md-3 p-0 cardbox" href="ev-ahemdabad.php">
                <div class="image-flip">
                    <div class="mainflip flip-0">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class="" src="img/ahmedabad.svg" width="107" height="90" alt="card image"></p>
                                    <p class="text-dark mt-1">Ahmedabad</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a class="col-xs-12 col-sm-6 col-md-3 p-0 cardbox" href="ev-hydrabad.php">
                <div class="image-flip">
                    <div class="mainflip flip-0">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class="" src="img/hyderabad.svg" width="107" height="90" alt="card image"></p>
                                    <p class="text-dark mt-1">Hyderabad</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a class="col-xs-12 col-sm-6 col-md-3 p-0 cardbox" href="ev-pune.php">
                <div class="image-flip">
                    <div class="mainflip flip-0">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class="" src="img/pune.svg" width="107" height="90" alt="card image"></p>
                                    <p class="text-dark mt-1">Pune</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a class="col-xs-12 col-sm-6 col-md-3 p-0 cardbox" href="ev-mumbai.php">
                <div class="image-flip">
                    <div class="mainflip flip-0">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class="" src="img/mumbai.svg" width="107" height="90" alt="card image"></p>
                                    <p class="text-dark mt-1">Mumbai</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a class="col-xs-12 col-sm-6 col-md-3 p-0 cardbox" href="ev-Rajkot.php">
                <div class="image-flip">
                    <div class="mainflip flip-0">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class="" src="img/rajkot.svg" width="107" height="90" alt="card image"></p>
                                    <p class="text-dark mt-1">Rajkot</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a class="col-xs-12 col-sm-6 col-md-3 p-0 cardbox" href="ev-Vadodra.php">
                <div class="image-flip">
                    <div class="mainflip flip-0">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class="" src="img/vadodra.svg" width="107" height="90" alt="card image"></p>
                                    <p class="text-dark mt-1">Vadodara</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>


    <?php include("footer.php"); ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


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