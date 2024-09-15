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

$session = $_SESSION['username'];
$sql = "select * from registration where username='$session'";
$check = mysqli_query($db, $sql);

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
        .box {
            margin: auto;
            margin-top: 50px;
            width: 100%;
            padding: 15px;
            max-width: 500px;
            background: white;
            border-radius: 4px;
            box-shadow: rgba(60, 66, 87, 0.12) 0px 7px 14px 0px, rgba(0, 0, 0, 0.12) 0px 3px 6px 0px;
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


    <div class="box">
        <div class="profile">
            <?php
            if (mysqli_num_rows($check)) {
                $row = mysqli_fetch_array($check);
            ?>
            <div class="text-center p-4">
                <img class="rounded-circle" src="image/<?php echo $row['image']; ?>" width="200" height="200">
                <h1 class="fs-1 mt-2">
                    <?php echo $row["username"]; ?>
                </h1>
            </div>

            <div class="p-2 border-top border-bottom border-dark d-flex w-100">
                <div class="w-75">
                    <i class="fa-solid fa-user icon m-3"></i><a href="ShowProfile.php">Show Profile</a>
                </div>
                <div class="w-25 text-end">
                    <i class="fa-solid fa-chevron-right chevron"></i>
                </div>
            </div>
            <div class="p-2 border-bottom border-dark d-flex">
                <div class="w-75">
                    <i class="fa-solid fa-user icon m-3"></i><a href="Profile_edit.php?edit=<?php echo $row['id']; ?>">Edit Profile</a>
                </div>
                <div class="w-25 text-end">
                    <i class="fa-solid fa-chevron-right chevron"></i>
                </div>
            </div>
            <div class="p-2 border-bottom border-dark d-flex">
                <div class="w-75">
                    <i class="fa-solid fa-lock icon m-3"></i><a href="Forgot-password.php">Forgot Password</a>
                </div>
                <div class="w-25 text-end">
                    <i class="fa-solid fa-chevron-right chevron"></i>
                </div>
            </div>
            <div class="p-2 border-bottom border-dark d-flex">
                <div class="w-75">
                    <i class="fa-solid fa-right-from-bracket icon m-3"></i></i><a href="logout.php">Logout</a>
                </div>
                <div class="w-25 text-end">
                    <i class="fa-solid fa-chevron-right chevron"></i>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>


    <?php include("footer.php"); ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa-solid fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        function show() {
            var x = document.getElementById("showpassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>