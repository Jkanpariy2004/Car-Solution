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

$viewpack = "Select * from add_car_package";
$GetDatapack = mysqli_query($db, $viewpack);

$username1 = $_SESSION['username'];
$view2 = "select * from car_package where name='$username1'";
$GetData2 = mysqli_query($db, $view2);

$view1 = "select * from car_package where name='$username1'";
$GetData1 = mysqli_query($db, $view1);
$GetStatusData = mysqli_fetch_array($GetData1);

$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$mobile = isset($_SESSION['mobile']) ? $_SESSION['mobile'] : '';

if (isset($_POST['btnsubmit'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $mobile_no = $_REQUEST['phone'];
    $package_type = $_REQUEST['price'];
    $service_date = date('Y-m-d', strtotime($_REQUEST['date']));
    $message = $_REQUEST['message'];
    $booking_number = rand(1000000000, 9999999999);

    $sql = "insert into car_package (name, email, mobile_no, package_type, service_date, message,booking_no,payment_status) values ('$name', '$email', '$mobile_no', '$package_type', '$service_date', '$message','$booking_number','Pending')";
    if (mysqli_query($db, $sql)) {
        echo '<script>
            alert("Car Service Package Booked Successfully.");
            window.location.href = "car-packages.php";
        </script>';
    } else {
        echo '<script>
            alert("Error: Unable to book the package.");
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
                <a href="Home.php" class="nav-item nav-link">Home</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Car Service</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a href="car-packages.php" class="dropdown-item active">Car Service Packages</a>
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

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-bg-1.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Car Service Packages</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Car Packages</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Service Start -->

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

    <!-- Service Start -->
    <div class="container-xxl service py-5">
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
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button onclick="openRazorpay(<?php echo $rowpack['price'] ?>)" class="btn btn-success">Make Payment</button>
                                <form id="razorpayForm" method="POST">
                                    <input type="hidden" name="razorpay_order_id" id="razorpay_order_id" />
                                    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
                                    <input type="hidden" name="razorpay_signature" id="razorpay_signature" />
                                </form>

                                <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                                <script>
                                    function openRazorpay(price) {
                                        var options = {
                                            key: "rzp_test_NXkmOvfVPrzbBy",
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

    <!-- Booking Start -->
    <div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 py-5">
                    <div style="margin-top: 35%;">
                        <h1 class="text-white mb-4">Why Choice Us</h1>
                        <p class="text-white mb-0">Count on us for reliable and trustworthy services that prioritize your safety and satisfaction. We understand the value of your time. Our efficient services aim to get you back on the road as quickly as possible. Quality services need not come at a premium. We offer competitive and fair pricing for all our services. Every vehicle is unique, and we tailor our services to meet the specific needs of your car..</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bg-primary h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                        <h1 class="text-white mb-4">Book For A Service</h1>
                        <form method="post">
                            <div class="row g-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-white" readonly name="name" id="floatingInput" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" autocomplete="off" placeholder="" required>
                                    <label for="floatingInput">Enter Your Name</label>
                                </div>
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="floatingInput" autocomplete="off" id="floatingInput" placeholder="" required>
                                    <label for="floatingInput">Enter Your Email</label>
                                </div>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="phone" id="floatingInput" autocomplete="off" pattern="[0-9]{10,10}" title="Enter 10 digits only" id="floatingInput" placeholder="" required>
                                    <label for="floatingInput">Enter Your Phone Number</label>
                                </div>
                                <div class="form-floating">
                                    <select class="form-select" name="price" id="floatingSelect" required>
                                        <option value="" selected disabled hidden>Select Package No.</option>
                                        <?php
                                        $viewPackages = "SELECT * FROM add_car_package";
                                        $getPackages = mysqli_query($db, $viewPackages);

                                        while ($rowPackage = mysqli_fetch_assoc($getPackages)) {
                                            echo '<option value="' . $rowPackage['packege_no'] . '">' . $rowPackage['packege_no'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <label for="floatingSelect">Select Package No.</label>
                                </div>

                                <div class="col-12 col-sm-6 w-100">
                                    <div class="date" id="date1" data-target-input="nearest">
                                        <input type="text" class="form-control p-3 fs-6 border-0 datetimepicker-input" required autocomplete="off" placeholder="Service Date" name="date" data-target="#date1" data-toggle="datetimepicker">
                                    </div>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" required id="floatingTextarea2" id="floatingInput" autocomplete="off" name="message" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Message</label>
                                </div>
                                <div class="col-12">
                                    <input type="submit" class="btn btn-secondary w-100" value="Book Now" name="btnsubmit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->

    <?php
    if (mysqli_num_rows($GetData1) > 0) {
    ?>
        <div style="border: 1px solid black; border-radius: 10px; margin: auto; padding: 10px; width: 40%;" class="wow fadeInUp" data-wow-delay="0.1s">
            <div class="w-100">
                <h3 class="text-center">Car Service Package Details</h3>
                <table class="table table-bordered border-dark">
                    <tbody>
                        <tr>
                            <td>Name:</td>
                            <td><?php echo $GetStatusData['name'] ?></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><?php echo $GetStatusData['email'] ?></td>
                        </tr>
                        <tr>
                            <td>Mobile No.:</td>
                            <td><?php echo $GetStatusData['mobile_no'] ?></td>
                        </tr>
                        <tr>
                            <td>Package No:</td>
                            <td><?php echo $GetStatusData['package_type'] ?></td>
                        </tr>
                        <tr>
                            <td>Car Service Date:</td>
                            <td><?php echo $GetStatusData['service_date'] ?></td>
                        </tr>
                        <tr>
                            <td>Message:</td>
                            <td><?php echo $GetStatusData['message'] ?></td>
                        </tr>
                        <tr>
                            <td>Booking Number:</td>
                            <td><?php echo $GetStatusData['booking_no'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    <?php
    }
    ?>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>