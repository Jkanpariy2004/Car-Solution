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

$username1 = $_SESSION['username'];
$view = "select * from mechanic where username='$username1'";
$GetData = mysqli_query($db, $view);

$view1 = "select * from mechanic where username='$username1'";
$GetData1 = mysqli_query($db, $view1);
$GetStatusData = mysqli_fetch_array($GetData1);

if (isset($_REQUEST['btnsubmit'])) {
    $username = $_REQUEST['username'];
    $mobile = $_REQUEST['mobile'];
    $email = $_REQUEST['email'];
    $pickup_point = $_REQUEST['pickup'];
    $address = $_REQUEST['address'];
    $latitude = $_REQUEST['latitude'];
    $longitude = $_REQUEST['longitude'];
    $booking_id = rand(1000000000, 9999999999);

    $insert = "insert into r_s_a (username, mobile, email, pickup_point, address, latitude, longitude,booking_id) values ('$username', '$mobile', '$email', '$pickup_point', '$address', '$latitude', '$longitude','$booking_id')";
    if (mysqli_query($db, $insert)) {
        echo '<script>
            alert("RSA Service Booked Successfully.");
            window.location.href = "RSA.php";
        </script>';
    } else {
        echo '<script>
            alert("Error: Unable to Booked RSA Service.");
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

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- jQuery (required by Owl Carousel) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Owl Carousel JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

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
            height: 200px;
            object-fit: fill;
        }

        #map {
            height: 300px;
            margin-bottom: 15px;
            border-radius: 5px;
            width: 100%;
        }

        .card {
            border: none;
        }
    </style>
</head>

<body>

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
                <a href="RSA.php" class="nav-item nav-link active">RSA Servive</a>
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



    <div class="container adminbg wow fadeInUp" data-wow-delay="0.1s">
        <form method="post" enctype="multipart/form-data">
            <h1 class="text-center mb-3">RSA Service Form</h1>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3 bg-white" name="username" id="floatingInput" autocomplete="off" placeholder="" required>
                <label for="floatingInput">Enter Your Username</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" pattern="[0-9]{10,10}" title="Enter 10 digits only" name="mobile" id="floatingInput" autocomplete="off" placeholder="" required>
                <label for="floatingInput">Your Mobile Number</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control rounded-3" name="email" id="floatingInput" autocomplete="off" placeholder="" required>
                <label for="floatingInput">Enter Your Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="pickup" id="floatingInput" autocomplete="off" placeholder="" required>
                <label for="floatingInput">Enter Your Pickup Point</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control rounded-3" name="address" placeholder="" style="height: 100px" id="floatingTextarea" required></textarea>
                <label for="floatingTextarea">Enter Your address</label>
            </div>
            <div id="map"></div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3 bg-white" name="latitude" readonly id="latitude" autocomplete="off" placeholder="" required>
                <label for="latitude">Your Latitude Address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3 bg-white" name="longitude" readonly id="longitude" autocomplete="off" placeholder="" required>
                <label for="longitude">Your Longitude Address</label>
            </div>
            <button type="submit" name="btnsubmit" class="btn btn-primary w-100">Submit</button>

            <div class="text-center mt-3 mb-3">
                <button type="button" class="btn btn-success w-50" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Track Request
                </button>
                <?php
                if (mysqli_num_rows($GetData1) > 0) {
                ?>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">RSA Track Service Request</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-primary fs-5">Your Request has been <span class="fw-bold text-dark"><?php echo $GetStatusData['status']; ?></span> By Mechanic. <br> If Your Any Query For Chat With Our Service Executive.👉 <b><a href="https://wa.me/+917862882054" target="_blank">Whatsapp</a></b>👈</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </form>
    </div>
    <?php
    if (mysqli_num_rows($GetData1) > 0) {
    ?>
        <div style="border: 1px solid black; border-radius: 10px; margin: auto; padding: 10px; width: 40%;" class="wow fadeInUp mt-5" data-wow-delay="0.1s">
            <div class="w-100">
                <h3 class="text-center">RSA Service Booking Details</h3>
                <table class="table table-bordered border-dark">
                    <tbody>
                        <tr>
                            <td>Username:</td>
                            <td><?php echo $GetStatusData['username'] ?></td>
                        </tr>
                        <tr>
                            <td>Mobile No.:</td>
                            <td><?php echo $GetStatusData['mobile'] ?></td>
                        </tr>
                        <tr>
                            <td>Email ID:</td>
                            <td><?php echo $GetStatusData['email'] ?></td>
                        </tr>
                        <tr>
                            <td>PickUp Point:</td>
                            <td><?php echo $GetStatusData['pickup_point'] ?></td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td><?php echo $GetStatusData['address'] ?></td>
                        </tr>
                        <tr>
                            <td>Latitude:</td>
                            <td><?php echo $GetStatusData['latitude'] ?></td>
                        </tr>
                        <tr>
                            <td>Longitude:</td>
                            <td><?php echo $GetStatusData['longitude'] ?></td>
                        </tr>
                        <tr>
                            <td>Booking id:</td>
                            <td><?php echo $GetStatusData['booking_id'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    <?php
    }
    ?>
    <div class="container mb-2 wow fadeInUp" data-wow-delay="0.1s">
        <h1 class="text-center mb-3 mt-3">Our Service</h1>
        <div class="card-group">
            <div class="card">
                <img src="img/rsa1.jpg" style="padding: 20px; height: 318px;" class="card-img-top" alt="...">
            </div>
            <div class="card">
                <img src="img/rsa2.jpg" style="padding: 20px; height: 300px;" class="card-img-top" alt="...">
            </div>
            <div class="card">
                <img src="img/rsa3.jpg" style="padding: 20px; height: 300px;" class="card-img-top" alt="...">
            </div>
        </div>
    </div>

    <div class="container wow fadeInUp" data-wow-delay="0.1s">
        <div class="card-group">
            <div class="card">
                <img src="img/rsa4.jpg" style="padding: 20px; height: 300px;" class="card-img-top" alt="...">
            </div>
            <div class="card">
                <img src="img/rsa5.jpg" style="padding: 20px; height: 300px;" class="card-img-top" alt="...">
            </div>
            <div class="card">
                <img src="img/rsa6.jpg" style="padding: 20px; height: 300px;" class="card-img-top" alt="...">
            </div>
        </div>
    </div>
    <script>
        let map;
        let marker;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 0,
                    lng: 0
                },
                zoom: 4,
            });
            marker = new google.maps.Marker({
                position: {
                    lat: 0,
                    lng: 0
                },
                map: map,
                title: "Current Location",
            });
            getLocation();
        }

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.watchPosition(updateLocation);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function updateLocation(position) {
            const {
                latitude,
                longitude
            } = position.coords;
            const newPos = new google.maps.LatLng(latitude, longitude);
            marker.setPosition(newPos); // Update marker position
            map.setCenter(newPos); // Optional: Center the map to the new position

            // Update textbox values
            document.getElementById("latitude").value = latitude;
            document.getElementById("longitude").value = longitude;
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGllXdpBQ-adMBoWxzfuJbNS5s-QErvKA&callback=initMap"></script>

    <?php include("footer.php"); ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top" style="display: none;"><i class="bi bi-arrow-up"></i></a>

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