<?php
session_start();

$_SESSION['timeout'] = time() + 10800;
if (isset($_SESSION['timeout']) && time() > $_SESSION['timeout']) {
    session_unset();
    session_destroy();

    header("Location:Login.php");
}
 

include("database.php");


$view = "Select * from home_slider";
$GetData = mysqli_query($db, $view);

$view1 = "Select * from add_car_booking LIMIT 6";
$GetData1 = mysqli_query($db, $view1);

$view2 = "Select * from add_insurance LIMIT 6";
$GetData2 = mysqli_query($db, $view2);

$viewpack = "Select * from add_car_package LIMIT 6";
$GetDatapack = mysqli_query($db, $viewpack);

$viewteam = "Select * from home_team";
$GetDatateam = mysqli_query($db, $viewteam);

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
    <link rel="stylesheet" href="css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }



        .btn-primary {
            color: white;
            width: 45%;
            margin-left: 9px;
        }


        .card-text {
            margin-left: 15px;
            color: #0d6efd;
            font-weight: bold;
        }

        .card-title {
            margin-left: 15px;
        }

        .img {
            width: 100%;
            height: auto;
            max-height: 200px;
        }

        .btn-lg-square {
            width: 48px;
            height: 48px;
        }

        .slider-image {
            width: 100%;
            height: auto;
            max-height: 500px;
        }

        @media only screen and (max-width: 768) {
            .slider-image {
                width: 100%;
                height: auto;
                max-height: 500px;
            }
        }

        @media only screen and (max-width: 992) {
            .slider-image {
                width: 100%;
                height: auto;
                max-height: 500px;
            }
        }

        .modal-dialog {
            max-width: 900px !important;
            margin: 1.75rem auto;
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
                <a href="Home.php" class="nav-item nav-link active">Home</a>
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
                <a href="Account.php" class="nav-item nav-link"><i class="fa-solid fa-user"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-bg-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center justify-content-center justify-content-lg-start">
                                <div class="col-10 col-lg-7 text-center text-lg-start">
                                    <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">Qualified Car Repair Service Center</h1>
                                    <a href="car-packages.php" class="btn btn-primary py-3 px-5 animated slideInDown">Learn More<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                while ($row = mysqli_fetch_array($GetData)) {
                ?>
                    <div class="carousel-item">
                        <img class="" src="image/<?php echo $row['image']; ?>" width="100%" height="100%">
                        <div class="carousel-caption d-flex align-items-center">
                            <div class="container">
                                <div class="row align-items-center justify-content-center justify-content-lg-start">
                                    <div class="col-10 col-lg-7 text-center text-lg-start">
                                        <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown"><?php echo $row['description'] ?></h1>
                                        <a href="car-packages.php" class="btn btn-primary py-3 px-5 animated slideInDown">Learn More<i class="fa fa-arrow-right ms-3"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex py-5 px-4">
                        <i class="fa fa-certificate fa-3x text-primary flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Professional & Expert</h5>
                            <p>At CarSolution, professionalism and expertise are the cornerstone of our exceptional service.</p>
                            <div class="mt-1 fw-bold">
                                <a class="text-secondary border-bottom" href="car-packages.php">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="d-flex bg-light py-5 px-4">
                        <i class="fa fa-tools fa-3x text-primary flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Quality Servicing Center</h5>
                            <p>Your premier destination for quality automotive servicing.</p>
                            <div class="mt-5 fw-bold">
                                <a class="text-secondary border-bottom" href="car-packages.php">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="d-flex py-5 px-4">
                        <i class="fa fa-users-cog fa-3x text-primary flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Awards Winning Workers</h5>
                            <p>CarSolution boasts award-winning workers dedicated to delivering top-notch automotive service.</p>
                            <div class="mt-1 fw-bold">
                                <a class="text-secondary border-bottom" href="car-packages.php">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <main class="main wow fadeInUp mt-5" data-wow-delay="0.5s">
        <h1 class="text-center mt-5 mb-5">Car Booking</h1>
        <div class="container">
            <div class="row">
                <?php
                while ($row1 = mysqli_fetch_array($GetData1)) {
                ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <!-- <img src="img/Honda.City.jpg" class="card-img-top" alt="..."> -->
                            <img class="img" src="image/<?php echo $row1['image']; ?>">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase"><?php echo $row1['name']; ?></h5>
                                <p class="card-text mb-2">Rs.<?php echo $row1['price'] ?>*</p>
                                <a type="button" href="car-booking.php" class="btn btn-primary">Book Car</a>

                                <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Car Booking</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post">
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Enter Car Company Name:</label>
                                                        <input type="text" class="form-control" id="recipient-name" name="carname" autocomplete="off" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Enter Car Model Name:</label>
                                                        <input type="text" class="form-control" id="recipient-name" name="carmodel" autocomplete="off" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Enter Your Name:</label>
                                                        <input type="text" class="form-control" id="recipient-name" name="name" autocomplete="off" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Enter Your Email:</label>
                                                        <input type="email" class="form-control" id="recipient-name" name="email" autocomplete="off" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Enter Your Mobile No.:</label>
                                                        <input type="text" class="form-control" id="recipient-name" name="mobile" autocomplete="off" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Enter Down Payment Price:</label>
                                                        <input type="text" class="form-control" id="recipient-name" name="downpayment" autocomplete="off" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Enter Total Price:</label>
                                                        <input type="text" class="form-control" id="recipient-name" name="totalprice" autocomplete="off" required>
                                                    </div>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-primary" name="btnsubmit" value="Book Car">
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </main>

    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.5s">
        <h1 class="text-center mt-5 mb-5">Car Insurance</h1>
        <div class="container">
            <div class="row g-4 justify-content-center">
                <?php
                while ($row = mysqli_fetch_array($GetData2)) {
                ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded h-100 p-5">
                            <div class="d-flex align-items-center ms-n5 mb-4">
                                <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                                    <img class="img-fluid" src="img/icon/icon-08-light.png" alt="">
                                </div>
                                <h4 class="mb-0"><?php echo $row['name']; ?></h4>
                            </div>
                            <p class="mb-4"><span>Insurance Validity - </span><?php echo $row['validity'] ?></p>
                            <p class="mb-4"><span>Insurance Type - </span><?php echo $row['type'] ?></p>
                            <p class="mb-4"><span>Insurance Price - </span><?php echo $row['price']; ?></p>
                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Book insurance</button> -->
                            <a type="button" href="car-insurance.php" class="btn btn-primary w-75">Book insurance</a>

                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <div class="container mb-5 wow fadeIn m-auto wow fadeInUp" data-wow-delay="0.5s" id="team">
        <h1 class="text-center mt-5 mb-5">Find Fuel Station</h1>
        <div class="row">
            <a class="col-xs-12 col-sm-6 col-md-3 p-0 cardbox" href="find-fual.php">
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
            <a class="col-xs-12 col-sm-6 col-md-3 p-0 cardbox" href="find-fual.php">
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
            <a class="col-xs-12 col-sm-6 col-md-3 p-0 cardbox" href="find-fual.php">
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
            <a class="col-xs-12 col-sm-6 col-md-3 p-0 cardbox" href="find-fual.php">
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
        </div>
    </div>
    <!-- find EV data -->
    <div class="container mb-5 wow fadeIn m-auto wow fadeInUp" data-wow-delay="0.5s" id="team">
        <h1 class="text-center mt-5 mb-5">Find Ev Station</h1>
        <div class="row">
            <a class="col-xs-12 col-sm-6 col-md-3 p-0 cardbox" href="find-ev.php">
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
            <a class="col-xs-12 col-sm-6 col-md-3 p-0 cardbox" href="find-ev.php">
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
            <a class="col-xs-12 col-sm-6 col-md-3 p-0 cardbox" href="find-ev.php">
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
            <a class="col-xs-12 col-sm-6 col-md-3 p-0 cardbox" href="find-ev.php">
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


    <!-- About Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.5s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6" style="min-height: 400px;">
                    <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
                        <img class="position-absolute img-fluid w-100 h-100" src="img/about.jpg" style="object-fit: cover;" alt="">
                        <!-- <div class="position-absolute top-0 end-0 mt-n4 me-n4 py-4 px-5" style="background: rgba(0, 0, 0, .08);">
                            <h1 class="display-4 text-white mb-0">15 <span class="fs-4">Years</span></h1>
                            <h4 class="text-white">Experience</h4>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <h1 class="mb-4"><span class="text-primary">CarSolution</span> Is The Best Place For Your Auto Care</h1>
                    <p class="mb-4">CarSolution is the epitome of excellence when it comes to auto care services. With a stellar reputation built on trust and expertise, they stand out as the go-to destination for all car maintenance needs. Equipped with state-of-the-art facilities and cutting-edge technology, they guarantee precision and efficiency in every job they undertake. Trust CarSolution to keep your car running at its best, ensuring safety and performance on every journey.</p>
                    <div class="row g-4 mb-3 pb-3">
                        <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">01</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Professional & Expert</h6>
                                    <span>At CarSolution, professionalism and expertise are the cornerstone of our exceptional service.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">02</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Quality Servicing Center</h6>
                                    <span>Your premier destination for quality automotive servicing.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">03</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Awards Winning Workers</h6>
                                    <span>CarSolution boasts award-winning workers dedicated to delivering top-notch automotive service.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <a href="" class="btn btn-primary py-3 px-5">Read More<i class="fa fa-arrow-right ms-3"></i></a> -->
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Fact Start -->
    <div class="container-fluid fact bg-dark my-5 py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                    <i class="fa fa-check fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                    <p class="text-white mb-0">Years Experience</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                    <i class="fa fa-users-cog fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                    <p class="text-white mb-0">Expert Technicians</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                    <i class="fa fa-users fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                    <p class="text-white mb-0">Satisfied Clients</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                    <i class="fa fa-car fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                    <p class="text-white mb-0">Compleate Projects</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->


    <!-- Service Start -->
    <div class="container-xxl service py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-primary text-uppercase">// Our Services //</h6>
                <h1 class="mb-5"> Our Services Packages</h1>
            </div>
            <?php
            while ($rowpack = mysqli_fetch_array($GetDatapack)) {
                $modal_id = "exampleModal" . $rowpack['id'];
            ?>
                <button type="button" class="btn btn-primary" style="width: 33.33%; padding: 20px; font-size: 30px; font-weight: 600;" data-bs-toggle="modal" data-bs-target="#<?php echo $modal_id; ?>" data-bs-whatever="@getbootstrap"><i class="fa-solid fa-car"></i> <?php echo $rowpack['packege_no']; ?></button>
                <div class="modal fade" id="<?php echo $modal_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $rowpack['packege_no']; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="tab-pane fade show active" id="tab-pane-1">
                                    <div class="row g-4">
                                        <div class="col-md-6" style="min-height: 350px;">
                                            <div class="position-relative h-100">
                                                <!-- <img class="position-absolute img-fluid w-100 h-100" src="img/service-1.jpg" style="object-fit: cover;" alt=""> -->
                                                <img class="" src="image/<?php echo $rowpack['image']; ?>" width="100%" height="100%">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h3 class="mb-3"><?php echo $rowpack['packege_name']; ?></h3>
                                            <h1 class="">₹<?php echo $rowpack['price']; ?></h1>
                                            <p class="mb-4"><?php echo $rowpack['detail']; ?></p>
                                            <p><i class="fa fa-check text-success me-3"></i><?php echo $rowpack['s_1']; ?></p>
                                            <p><i class="fa fa-check text-success me-3"></i><?php echo $rowpack['s_2']; ?></p>
                                            <p><i class="fa fa-check text-success me-3"></i><?php echo $rowpack['s_3']; ?></p>
                                            <p><i class="fa fa-check text-success me-3"></i><?php echo $rowpack['s_4']; ?></p>
                                            <p><i class="fa fa-check text-success me-3"></i><?php echo $rowpack['s_5']; ?></p>
                                            <p><i class="fa fa-check text-success me-3"></i><?php echo $rowpack['s_6']; ?></p>
                                            <p><i class="fa fa-check text-success me-3"></i><?php echo $rowpack['s_7']; ?></p>
                                            <p><i class="fa fa-check text-success me-3"></i><?php echo $rowpack['s_8']; ?></p>
                                            <p><i class="fa fa-check text-success me-3"></i><?php echo $rowpack['s_9']; ?></p>
                                            <p><i class="fa fa-check text-success me-3"></i><?php echo $rowpack['s_10']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a type="button" class="btn btn-secondary" href="car-packages.php">Book Now</a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- Service End -->



    <!-- Team Start -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-primary text-uppercase">// Our Technicians //</h6>
                <h1 class="mb-5">Our Expert Technicians</h1>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                <?php
                while ($rowteam = mysqli_fetch_array($GetDatateam)) {
                ?>
                    <div class="col wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item">
                            <div class="position-relative overflow-hidden">
                                <img class="" src="image/<?php echo $rowteam['image']; ?>" style="width: 100%; height: auto; max-height: 300px;">
                                <!-- <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div> -->
                            </div>
                            <div class="bg-light text-center p-4">
                                <h2 class="fw-bold mb-0"><?php echo $rowteam['name']; ?></h2>
                                <p class="fw-bold mb-0 text-dark"><?php echo $rowteam['post']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Team End -->

    <?php include("footer.php"); ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            dots: false,
            nav: false,
            mouseDrag: false,
            autoplay: true,
            animateOut: 'slideOutUp',
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
    </script>
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