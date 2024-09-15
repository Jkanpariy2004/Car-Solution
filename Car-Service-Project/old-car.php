<?php
session_start();

$_SESSION['timeout'] = time() + 10800;
if (isset($_SESSION['timeout']) && time() > $_SESSION['timeout']) {
    session_unset();
    session_destroy();

    header("Location:Login.php");
}


include("database.php");

if (empty($_SESSION['username'])) {
    header("location:Login.php");
    exit(); // Add exit here to prevent further execution
}

$view = "SELECT * FROM old_car";
$GetData = mysqli_query($db, $view);

if (isset($_REQUEST['btnsubmit'])) { // Changed to POST method
    // Retrieve form data
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $mobile = $_REQUEST['mobile'];
    $address = $_REQUEST['address'];
    $carname = $_REQUEST['carname'];
    $carmodel = $_REQUEST['carmodel'];
    $reg_year = $_REQUEST['year'];
    $fuel = $_REQUEST['fuel'];
    $kms = $_REQUEST['kms'];
    $owner = $_REQUEST['owner'];
    $tra = $_REQUEST['tra'];
    $insurance = $_REQUEST['insurance'];
    $seats = $_REQUEST['seats'];
    $Rto = $_REQUEST['rto'];
    $engine = $_REQUEST['engine'];
    $menufecture = $_REQUEST['menufecture'];
    $totalprice = $_REQUEST['totalprice'];

    $carphotos = array();

    // Process uploaded photos
    if (!empty($_FILES['carphotos']['name'][0])) {
        $totalFiles = count($_FILES['carphotos']['name']);
        for ($i = 0; $i < $totalFiles; $i++) {
            $carphoto = $_FILES['carphotos']['name'][$i];
            move_uploaded_file($_FILES['carphotos']['tmp_name'][$i], 'images1/' . $carphoto);
            $carphotos[] = $carphoto;
        }
    }

    $carphotos_str = implode(',', $carphotos);

    // Modified SQL query with a comma after 'year_of_menufacture'
    $insert = "INSERT INTO old_car (name, email, mobile, address, car_name, model_name, registration_year, fuel_type, kms_driven, ownership, transmission, insurance_validity, seats, RTO, engine_displacement, year_of_menufacture, photo, price) VALUES ('$name', '$email', '$mobile', '$address', '$carname', '$carmodel', '$reg_year', '$fuel', '$kms', '$owner', '$tra', '$insurance', '$seats', '$Rto', '$engine', '$menufecture', '$carphotos_str', '$totalprice')";
    mysqli_query($db, $insert);

    echo '<script>
            alert("Used Car Details Added Successfully.");
            window.location.href = "old-car.php";
          </script>';
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
        .adminbg {
            margin: auto;
            margin-top: 50px;
            width: 100%;
            padding: 15px;
            max-width: 700px;
            background: white;
            border-radius: 4px;
            box-shadow: rgba(60, 66, 87, 0.12) 0px 7px 14px 0px, rgba(0, 0, 0, 0.12) 0px 3px 6px 0px;
        }

        .modal-img {
            width: 50%;
            height: auto;
            object-fit: fill;
            max-height: 240px;
        }

        .mdialog {
            max-width: 700px !important;
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
                        <a href="car-packages.php" class="dropdown-item">Car Service Packages</a>
                        <a href="car-rent.php" class="dropdown-item">Car Rent</a>
                        <a href="car-booking.php" class="dropdown-item">Car Booking</a>
                        <a href="car-insurance.php" class="dropdown-item">Car Insurance</a>
                        <a href="old-car.php" class="dropdown-item active">Used Car Selling & Purchasing</a>
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

    <div class="container adminbg">
        <form method="post" enctype="multipart/form-data">
            <h1 class="text-center mb-3">Used Car Selling Form</h1>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3 bg-white" name="name" readonly id="floatingInput" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" autocomplete="off" placeholder="" required>
                <label for="floatingInput">Enter Your Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control rounded-3" name="email" id="floatingInput" autocomplete="off" placeholder="" required>
                <label for="floatingInput">Enter Your Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="tel" class="form-control rounded-3" name="mobile" id="floatingInput" autocomplete="off" placeholder="" required>
                <label for="floatingInput">Your Phone Number</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control rounded-3" name="address" placeholder="" style="height: 100px" id="floatingTextarea" required></textarea>
                <label for="floatingTextarea">Your address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="carname" id="floatingInput" autocomplete="off" placeholder="" required>
                <label for="floatingInput">Car Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="carmodel" id="floatingInput" autocomplete="off" placeholder="" required>
                <label for="floatingInput">Car Model Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="year" id="floatingInput" autocomplete="off" placeholder="" required>
                <label for="floatingInput">Car Registration Year</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="fuel" id="floatingInput" autocomplete="off" placeholder="" required>
                <label for="floatingInput">Car Fuel Type</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="kms" id="floatingInput" autocomplete="off" placeholder="" required>
                <label for="floatingInput">Car Kms Driven</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="owner" id="floatingInput" autocomplete="off" placeholder="" required>
                <label for="floatingInput">Car Ownership</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="tra" id="floatingInput" autocomplete="off" placeholder="" required>
                <label for="floatingInput">Car Transmission</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="insurance" id="floatingInput" autocomplete="off" placeholder="" required>
                <label for="floatingInput">Car Insurance validity</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="seats" id="floatingInput" autocomplete="off" placeholder="" required>
                <label for="floatingInput">Car Seats</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="rto" id="floatingInput" autocomplete="off" placeholder="" required>
                <label for="floatingInput">Car Registration RTO</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="engine" id="floatingInput" autocomplete="off" placeholder="" required>
                <label for="floatingInput">Car Engine Displacement</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="menufecture" id="floatingInput" autocomplete="off" placeholder="" required>
                <label for="floatingInput">Enter Car Year Of Menufecturing</label>
            </div>
            <div class="mb-3">
                <label for="formFileMultiple">Your Car's Photos</label>
                <input type="file" class="form-control bg-white rounded-3" name="carphotos[]" id="formFileMultiple" required multiple>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="totalprice" id="floatingInput" autocomplete="off" placeholder="" required>
                <label for="floatingInput">Car Price</label>
            </div>
            <button type="submit" name="btnsubmit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>

    <?php if (mysqli_num_rows($GetData) > 0) { ?>
        <div class="container mt-5">
            <h1 class="text-center mb-3">Used Car Selling</h1>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                while ($row = mysqli_fetch_array($GetData)) {
                ?>
                    <div class="col">
                        <div class="card h-100">
                            <?php
                            // Get the first photo for the current old car
                            $carphotos_array = explode(',', $row['photo']);
                            $first_photo = isset($carphotos_array[0]) ? $carphotos_array[0] : '';
                            ?>
                            <img class="" src="image/<?php echo $first_photo; ?>" width="100%" height="100%">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#carPhotosModal_<?php echo $row['id']; ?>">View More Photos</button>
                            <div class="card-body text-dark">
                                <div class="card-body text-dark">
                                    <h5 class="card-title text-primary">Car Name: <?php echo $row['car_name']; ?></h5>
                                    <p class="card-title"><span class="fw-bold">Car Model:</span> <?php echo $row['model_name']; ?></p>
                                    <!-- Add a button to open car details popup -->
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#carDetailsModal_<?php echo $row['id']; ?>">Car Details</button>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#ownerDetailsModal_<?php echo $row['id']; ?>">Owner Details</button>
                                </div>

                                <!-- Modal Popup for Car Details -->
                                <div class="modal fade" id="carDetailsModal_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="carDetailsModalLabel_<?php echo $row['id']; ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered mdialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="carDetailsModalLabel_<?php echo $row['id']; ?>">Car Details</h5>
                                                <!-- Remove the close button from here -->
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <!-- Left column -->
                                                    <div class="col-md-6">
                                                        <p class=" mt-3 mb-3"><span class="fw-bold">Car Registration Year:</span> <?php echo $row['registration_year']; ?></p>
                                                        <p class=" mt-3 mb-3"><span class="fw-bold">Fuel Type:</span> <?php echo $row['fuel_type']; ?></p>
                                                        <p class=" mt-3 mb-3"><span class="fw-bold">Kms Driven:</span> <?php echo $row['kms_driven']; ?></p>
                                                        <p class=" mt-3 mb-3"><span class="fw-bold">Ownership:</span> <?php echo $row['ownership']; ?></p>
                                                        <p class=" mt-3 mb-3"><span class="fw-bold">Transmission:</span> <?php echo $row['transmission']; ?></p>
                                                    </div>
                                                    <!-- Right column -->
                                                    <div class="col-md-6">
                                                        <p class=" mt-3 mb-3"><span class="fw-bold">Insurance Validity:</span> <?php echo $row['insurance_validity']; ?></p>
                                                        <p class=" mt-3 mb-3"><span class="fw-bold">Seats:</span> <?php echo $row['seats']; ?></p>
                                                        <p class=" mt-3 mb-3"><span class="fw-bold">RTO:</span> <?php echo $row['RTO']; ?></p>
                                                        <p class=" mt-3 mb-3"><span class="fw-bold">Engine Displacement:</span> <?php echo $row['engine_displacement']; ?></p>
                                                        <p class=" mt-3 mb-3"><span class="fw-bold">Year Of Menufacturing:</span> <?php echo $row['year_of_menufacture']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Modal Popup for Owner Details -->
                            <div class="modal fade" id="ownerDetailsModal_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="ownerDetailsModalLabel_<?php echo $row['id']; ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content text-dark">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ownerDetailsModalLabel_<?php echo $row['id']; ?>">Owner Details</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p class=" mt-3 mb-3"><span class="fw-bold">Owner Name:</span> <?php echo $row['name']; ?></p>
                                            <p class=" mt-3 mb-3"><span class="fw-bold">Email:</span> <?php echo $row['email']; ?></p>
                                            <p class=" mt-3 mb-3"><span class="fw-bold">Mobile No.:</span> <?php echo $row['mobile']; ?></p>
                                            <p class=" mt-3 mb-3"><span class="fw-bold">Address:</span> <?php echo $row['address']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Add button to trigger modal popup -->
                            <div class="card-footer">
                                <h1 class="text-center text-dark"><span class="fw-bold">Price:</span> <?php echo $row['price']; ?></h1>
                            </div>

                            <!-- Modal Popup for Car Photos -->
                            <div class="modal fade" id="carPhotosModal_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="carPhotosModalLabel_<?php echo $row['id']; ?>" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="carPhotosModalLabel_<?php echo $row['id']; ?>">More Photos for <?php echo $row['car_name']; ?></h5>
                                            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                                                <span class="navbar-toggler-icon"></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                            $Ex_img = explode(',', $row['photo']);
                                            foreach ($Ex_img as $q) {
                                                echo '<img src="images1/' . $q . '" class="img-fluid modal-img" alt="Car Photo">';
                                            }
                                            ?>
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
    <?php
    }
    ?>

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