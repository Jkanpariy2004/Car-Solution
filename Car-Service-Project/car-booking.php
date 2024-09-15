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

$view = "Select * from add_car_booking";
$GetData = mysqli_query($db, $view);

$view1 = "Select * from add_car_slider";
$GetData1 = mysqli_query($db, $view1);

$username1 = $_SESSION['username'];
$viewcar = "select * from car_booking where cust_name='$username1'";
$getcar = mysqli_query($db, $viewcar);
$getcardata = mysqli_fetch_array($getcar);

$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$mobile = isset($_SESSION['mobile']) ? $_SESSION['mobile'] : '';

if (isset($_POST['btnsubmit'])) {
    $carname = $_POST['carname'];
    $carmodel = $_POST['carmodel'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $downpayment = $_POST['downpayment'];
    $totalprice = $_POST['totalprice'];
    $booking_number = rand(1000000000, 9999999999);

    $insert = "insert into car_booking (company_name, model_name, cust_name, cust_email, cust_mobile, down_payment, total_price,booking_no) values ('$carname', '$carmodel', '$name', '$email', '$mobile', '$downpayment', '$totalprice','$booking_number')";

    if (mysqli_query($db, $insert)) {
        echo '<script>
            alert("Car Booked Successfully.");
            window.location.href = "car-booking.php";
        </script>';
    } else {
        echo '<script>
            alert("Error: Unable to Car Booking.");
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

        .btn-brochure {
            width: 200px;
            margin: 5px;
            padding: 15px;
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
            <img src="img/logo.png" class="rounded-circle" style="width: 70px; height: 70px;" ; alt="">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="Home.php" class="nav-item nav-link">Home</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Car Service</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a href="car-packages.php" class="dropdown-item">Car Service Packages</a>
                        <a href="car-rent.php" class="dropdown-item">Car Rent</a>
                        <a href="car-booking.php" class="dropdown-item active">Car Booking</a>
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
                    <img class="slider-image" src="img/Tata.Altroz.jpg" alt="Image">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-10 col-lg-7 text-center text-lg-start text-center">
                                    <h1 class="display-3 text-white text-center mb-4 pb-3 animated slideInDown">Tata Altroz</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                while ($row = mysqli_fetch_array($GetData1)) {
                ?>
                    <div class="carousel-item">
                        <img class="" src="image/<?php echo $row['image']; ?>" style="width: 100%;height: auto;max-height: 500px;" width="100%" height="50%">
                        <div class="carousel-caption d-flex align-items-center">
                            <div class="container">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-10 col-lg-7 text-center text-lg-start">
                                        <h1 class="display-3 text-white text-center mb-4 pb-3 animated slideInDown"><?php echo $row['name'] ?></h1>
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

    <main class="main wow fadeInUp mt-5" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <?php
                while ($row = mysqli_fetch_array($GetData)) {
                ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <img class="img" src="image/<?php echo $row['image']; ?>">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase"><?php echo $row['name']; ?></h5>
                                <p class="card-text mb-2">Rs.<?php echo $row['price'] ?>*</p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $row['id']; ?>" data-bs-whatever="@mdo">Book Car</button>
                                <button onclick="openRazorpay(<?php echo $row['price'] ?>)" class="btn btn-success">Make Payment</button>
                                <form id="razorpayForm" method="POST">
                                    <input type="hidden" name="razorpay_order_id" id="razorpay_order_id" />
                                    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
                                    <input type="hidden" name="razorpay_signature" id="razorpay_signature" />
                                </form>

                                <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                                <script>
                                    function openRazorpay(price) {
                                        var options = {
                                            key: "rzp_test_v8RpKfnrf9dqx7",
                                            amount: price * 100, 
                                            currency: "INR",
                                            name: "<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>",
                                            description: "A Wild Sheep Chase is the third novel by Japanese author Haruki Murakami",
                                            image: "https://example.com/your_logo.jpg",
                                            prefill: {
                                                name: "<?php echo $username; ?>",
                                                email: "<?php echo $email; ?>",
                                                contact: "<?php echo $mobile; ?>"
                                            },
                                            theme: {
                                                color: "#FFD700",
                                                background: "#FAFAFA",
                                                text: "#444444"
                                            },
                                            handler: function(response) {
                                                document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                                                document.getElementById('razorpay_order_id').value = response.razorpay_order_id;
                                                document.getElementById('razorpay_signature').value = response.razorpay_signature;
                                                document.getElementById('razorpayForm').submit();
                                            }
                                        };
                                        var rzp = new Razorpay(options);
                                        rzp.open();
                                    }
                                </script>

                                <div class="modal fade" id="exampleModal_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Car Booking</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post">
                                                    <div class="mb-3 form-floating">
                                                        <input type="text" class="form-control rounded-3 bg-white" readonly id="name_<?php echo $row['id']; ?>" name="name" placeholder="" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" autocomplete="off" required>
                                                        <label for="name_<?php echo $row['id']; ?>">Enter Your Name</label>
                                                    </div>
                                                    <div class="mb-3 form-floating">
                                                        <input type="text" class="form-control rounded-3 bg-white" id="carname_<?php echo $row['id']; ?>" placeholder="" name="carname" readonly value="<?php echo $row['name'] ?>" autocomplete="off" required>
                                                        <label for="carname_<?php echo $row['id']; ?>">Enter Car Company Name</label>
                                                    </div>
                                                    <div class="mb-3 form-floating">
                                                        <input type="text" class="form-control rounded-3 bg-white" id="carmodel_<?php echo $row['id']; ?>" placeholder="" readonly value="<?php echo $row['name'] ?>" name="carmodel" autocomplete="off" required>
                                                        <label for="carmodel_<?php echo $row['id']; ?>">Enter Car Model Name</label>
                                                    </div>
                                                    <div class="mb-3 form-floating">
                                                        <input type="email" class="form-control rounded-3" id="email_<?php echo $row['id']; ?>" name="email" placeholder="" autocomplete="off" required>
                                                        <label for="email_<?php echo $row['id']; ?>">Enter Your Email</label>
                                                    </div>
                                                    <div class="mb-3 form-floating">
                                                        <input type="text" class="form-control rounded-3" pattern="[0-9]{10,10}" title="Enter 10 digits only" id="mobile_<?php echo $row['id']; ?>" name="mobile" placeholder="" autocomplete="off" required>
                                                        <label for="mobile_<?php echo $row['id']; ?>">Enter Your Mobile No.</label>
                                                    </div>
                                                    <div class="mb-3 form-floating">
                                                        <input type="text" class="form-control rounded-3" id="downpayment_<?php echo $row['id']; ?>" name="downpayment" placeholder="" autocomplete="off" required>
                                                        <label for="downpayment_<?php echo $row['id']; ?>">Enter Down Payment Price</label>
                                                    </div>
                                                    <div class="mb-3 form-floating">
                                                        <input type="text" class="form-control rounded-3 bg-white" id="totalprice_<?php echo $row['id']; ?>" name="totalprice" placeholder="" readonly value="<?php echo $row['price'] ?>" autocomplete="off" required>
                                                        <label for="totalprice_<?php echo $row['id']; ?>">Enter Total Price</label>
                                                    </div>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-primary" name="btnsubmit" value="Book Car">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </main>

    <?php
    if (mysqli_num_rows($getcar) > 0) {
    ?>
        <div style="border: 1px solid black; border-radius: 10px; margin: auto; margin-top: 20px; padding: 10px; width: 40%;" class="wow fadeInUp" data-wow-delay="0.1s">
            <div class="w-100">
                <h3 class="text-center">Car Booking Details</h3>
                <table class="table table-bordered border-dark">
                    <tbody>
                        <tr>
                            <td>Car Company Name:</td>
                            <td><?php echo $getcardata['company_name'] ?></td>
                        </tr>
                        <tr>
                            <td>Car Model Name:</td>
                            <td><?php echo $getcardata['model_name'] ?></td>
                        </tr>
                        <tr>
                            <td>Customer Name:</td>
                            <td><?php echo $getcardata['cust_name'] ?></td>
                        </tr>
                        <tr>
                            <td>Customer Email:</td>
                            <td><?php echo $getcardata['cust_email'] ?></td>
                        </tr>
                        <tr>
                            <td>Customer Mobile:</td>
                            <td><?php echo $getcardata['cust_mobile'] ?></td>
                        </tr>
                        <tr>
                            <td>Down payment Price:</td>
                            <td><?php echo $getcardata['down_payment'] ?></td>
                        </tr>
                        <tr>
                            <td>Total Price:</td>
                            <td><?php echo $getcardata['total_price'] ?></td>
                        </tr>
                        <tr>
                            <td>Booking Number:</td>
                            <td><?php echo $getcardata['booking_no'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php
    }
    ?>

    <main class="main wow fadeInUp mt-5" data-wow-delay="0.5s">
        <div class="container">
            <h1 class="text-center mb-5">Other Car Brochure</h1>
            <a class="btn btn-success btn-brochure" href="Brochure/honda-amaze-brochure.pdf" download>Honda Amaze</a>
            <a class="btn btn-success btn-brochure" href="Brochure/honda-city-brochure.pdf" download>Honda City</a>
            <a class="btn btn-success btn-brochure" href="Brochure/Honda-civic.pdf" download>Honda Civic</a>
            <a class="btn btn-success btn-brochure" href="Brochure/Honda-elevate.pdf" download>Honda Elevate</a>
            <a class="btn btn-success btn-brochure" href="Brochure/Honda-WR-v.pdf" download>Honda WR-v</a>
            <a class="btn btn-success btn-brochure" href="Brochure/tata-altoz.pdf" download>Tata Altoz</a>
            <a class="btn btn-success btn-brochure" href="Brochure/tata-harrier.pdf" download>Tata Harrier</a>
            <a class="btn btn-success btn-brochure" href="Brochure/tata-nexon-ev-max.pdf" download>Tata Nexon EV Max</a>
            <a class="btn btn-success btn-brochure" href="Brochure/tata-nexon.pdf" download>Tata Nexon</a>
            <a class="btn btn-success btn-brochure" href="Brochure/tata-punch.pdf" download>Tata Punch</a>
            <a class="btn btn-success btn-brochure" href="Brochure/tata-safari.pdf" download>Tata Safari</a>
            <a class="btn btn-success btn-brochure" href="Brochure/tata-tiago-ev.pdf" download>Tata Tiago EV</a>
            <a class="btn btn-success btn-brochure" href="Brochure/tata-tiago.pdf" download>Tata Tiago</a>
            <a class="btn btn-success btn-brochure" href="Brochure/tata-tigor-ev.pdf" download>Tata Tigor EV</a>
            <a class="btn btn-success btn-brochure" href="Brochure/tata-tigor.pdf" download>Tata Tigor</a>
        </div>
    </main>






    <?php include("footer.php"); ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top to"><i class="bi bi-arrow-up"></i></a>

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