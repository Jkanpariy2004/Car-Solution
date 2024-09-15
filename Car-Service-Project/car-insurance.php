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

$view = "Select * from add_insurance";
$GetData = mysqli_query($db, $view);

$username1 = $_SESSION['username'];
$view2 = "select * from insurance where username='$username1'";
$GetData2 = mysqli_query($db, $view2);

$view1 = "select * from insurance where username='$username1'";
$GetData1 = mysqli_query($db, $view1);
$GetStatusData = mysqli_fetch_array($GetData1);

$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$mobile = isset($_SESSION['mobile']) ? $_SESSION['mobile'] : '';

if (isset($_REQUEST['btnsubmit'])) {
    $policy_number = rand(1000000000, 9999999999);

    $user = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $mobile = $_REQUEST['mobile'];
    $carnumber = $_REQUEST['carnumber'];
    $rcbook = $_REQUEST['rcbooknumber'];
    $pan = $_REQUEST['pannumber'];
    $oldcar = $_REQUEST['oldcar'];
    $type = $_REQUEST['type'];
    $validity = $_REQUEST['validity'];
    $price = $_REQUEST['totalprice'];

    $sql = "insert into insurance (username, email, mobile, car_number, rc_book,pan_card, old_car, insurance_type, validity, price, policy_number) values ('$user', '$email', '$mobile', '$carnumber', '$rcbook','$pan', '$oldcar', '$type', '$validity', '$price', '$policy_number')";
    if (mysqli_query($db, $sql)) {
        echo '<script>
            alert("Car Insurance Booked Successfully.");
            window.location.href = "car-insurance.php";
        </script>';
    } else {
        echo '<script>
            alert("Error: Unable to Booked Car Insurance.");
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
        .navbar .dropdown-toggle::after {
            border: none;
            content: "\f107";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            vertical-align: middle;
            margin-left: 8px;
        }

        .service-item {
            position: relative;
            overflow: hidden;
            box-shadow: 0 0 45px rgba(0, 0, 0, .07);
        }

        .service-item .service-icon {
            width: 90px;
            height: 90px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .service-item .service-icon img {
            max-width: 60px;
            max-height: 60px;
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
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Car Service</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a href="car-packages.php" class="dropdown-item">Car Service Packages</a>
                        <a href="car-rent.php" class="dropdown-item">Car Rent</a>
                        <a href="car-booking.php" class="dropdown-item">Car Booking</a>
                        <a href="car-insurance.php" class="dropdown-item active">Car Insurance</a>
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

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <?php
                while ($row = mysqli_fetch_array($GetData)) {
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
                            <div class="d-flex">
                                <button type="button" class="btn btn-primary w-75" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $row['id']; ?>" data-bs-whatever="@mdo">Book insurance</button>
                                <button onclick="openRazorpay(<?php echo $row['price'] ?>)" class="btn btn-success w-75">Make Payment</button>
                            </div>
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
                                            <h5 class="modal-title" id="exampleModalLabel">Car Insurance</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post">
                                                <div class="mb-3 form-floating">
                                                    <input type="text" class="form-control rounded-3 bg-white" readonly id="username" name="username" placeholder="" autocomplete="off" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" required>
                                                    <label for="username">Enter your Username</label>
                                                </div>
                                                <div class="mb-3 form-floating">
                                                    <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="" autocomplete="off" required>
                                                    <label for="email">Enter your Email</label>
                                                </div>
                                                <div class="mb-3 form-floating">
                                                    <input type="text" class="form-control rounded-3" id="mobile" pattern="[0-9]{10,10}" title="Enter 10 digits only" name="mobile" placeholder="" autocomplete="off" required>
                                                    <label for="mobile">Enter Your Mobile No.</label>
                                                </div>
                                                <div class="mb-3 form-floating">
                                                    <input type="text" class="form-control rounded-3" id="carnumber" name="carnumber" placeholder="" autocomplete="off" required>
                                                    <label for="carnumber">Enter Your Car Number</label>
                                                </div>
                                                <div class="mb-3 form-floating">
                                                    <input type="text" class="form-control rounded-3" id="rcbooknumber" name="rcbooknumber" placeholder="" autocomplete="off" required>
                                                    <label for="rcbooknumber">Enter RC Book No.</label>
                                                </div>
                                                <div class="mb-3 form-floating">
                                                    <input type="text" class="form-control rounded-3" id="pannumber" name="pannumber" placeholder="" autocomplete="off" required>
                                                    <label for="rcbooknumber">Enter Your Pan Card No.</label>
                                                </div>
                                                <div class="mb-3 form-floating">
                                                    <input type="text" class="form-control rounded-3" id="oldcar" name="oldcar" autocomplete="off" placeholder="" required>
                                                    <label for="oldcar">How old Car</label>
                                                </div>
                                                <div class="mb-3 form-floating">
                                                    <input type="text" class="form-control rounded-3 bg-white" readonly id="type" name="type" placeholder="" value="<?php echo $row['type']; ?>" autocomplete="off" required>
                                                    <label for="type">Insurance Type</label>
                                                </div>
                                                <div class="mb-3 form-floating">
                                                    <input type="text" class="form-control rounded-3 bg-white" readonly id="validity" name="validity" placeholder="" value="<?php echo $row['validity']; ?>" autocomplete="off" required>
                                                    <label for="validity">Enter insurance Validity</label>
                                                </div>
                                                <div class="mb-3 form-floating">
                                                    <input type="text" class="form-control rounded-3 bg-white" readonly id="totalprice" name="totalprice" placeholder="" value="<?php echo $row['price']; ?>" autocomplete="off" required>
                                                    <label for="totalprice">Enter Total Price</label>
                                                </div>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-primary" name="btnsubmit" value="Book insurance">
                                            </form>
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
    </div>

    <!-- Include jQuery library -->
    <?php
    if (mysqli_num_rows($GetData1) > 0) {
    ?>
        <div style="border: 1px solid black; border-radius: 10px; margin: auto; padding: 10px; width: 40%;" id="submit-message" class="wow fadeInUp" data-wow-delay="0.1s">
            <div class="w-100">
                <h3 class="text-center">Car Insurance Details</h3>
                <table class="table table-bordered border-dark">
                    <tbody>
                        <tr>
                            <td>Name:</td>
                            <td><?php echo $GetStatusData['username'] ?></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><?php echo $GetStatusData['email'] ?></td>
                        </tr>
                        <tr>
                            <td>Mobile:</td>
                            <td><?php echo $GetStatusData['mobile'] ?></td>
                        </tr>
                        <tr>
                            <td>Car Number:</td>
                            <td><?php echo $GetStatusData['car_number'] ?></td>
                        </tr>
                        <tr>
                            <td>Rc Book Number:</td>
                            <td><?php echo $GetStatusData['rc_book'] ?></td>
                        </tr>
                        <tr>
                            <td>Pan Card Number:</td>
                            <td><?php echo $GetStatusData['pan_card'] ?></td>
                        </tr>
                        <tr>
                            <td>How Old Car:</td>
                            <td><?php echo $GetStatusData['old_car'] ?></td>
                        </tr>
                        <tr>
                            <td>Policy Number:</td>
                            <td><?php echo $GetStatusData['policy_number'] ?></td>
                        </tr>
                        <tr>
                            <td>Insurance Start Date And Time:</td>
                            <td><?php echo $GetStatusData['insurance_start_date'] ?></td>
                        </tr>
                        <tr>
                            <td>Insurance Type:</td>
                            <td><?php echo $GetStatusData['insurance_type'] ?></td>
                        </tr>
                        <tr>
                            <td>Validity:</td>
                            <td><?php echo $GetStatusData['validity'] ?></td>
                        </tr>
                        <tr>
                            <td>Price:</td>
                            <td><?php echo $GetStatusData['price'] ?></td>
                        </tr>
                    </tbody>
                </table>
                <a href="generate_pdf.php" class="btn btn-primary">Download PDF</a>
            </div>
        </div>

    <?php
    }
    ?>


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>

</body>

</html>