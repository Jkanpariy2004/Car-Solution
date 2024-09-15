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


// $view = "Select * from registration";
// $GetData = mysqli_query($db, $view);

$session = $_SESSION['username'];
$sql = "select * from registration where username='$session'";
$check = mysqli_query($db, $sql);

if (isset($_REQUEST['edit'])) {
    $id = $_REQUEST['edit'];
    $sql = "select *from registration where id='$id' ";
    $asd = mysqli_query($db, $sql);
    $return = mysqli_fetch_array($asd);
}

if (isset($_REQUEST['btnsubmit'])) {
    $newUsername = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $gender = $_REQUEST['gender'];
    $hobby = implode(',', $_REQUEST['hobby']);
    $city = $_REQUEST['city'];
    // $password = $_REQUEST['password'];
    // $conpassword = $_REQUEST['conpassword'];
    $_SESSION['username'] = $newUsername;


    $sql = "update registration set username='$newUsername',email='$email',phone='$phone',gender='$gender',hobby='$hobby',city='$city' where id='$id'";
    mysqli_query($db, $sql);
    header("location:Account.php");
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
            <form action="" method="post">
                <?php
                if (mysqli_num_rows($check)) {
                    $row = mysqli_fetch_array($check);
                ?>

                    <table class="table">
                        <tr>
                            <td colspan="2" class="text-center p-4">
                                <img class="rounded-circle" src="image/<?php echo $row['image']; ?>" width="200" height="200">
                            </td>
                        </tr>
                        <tr>
                            <td>Username:</td>
                            <td><input type="text" class="bg-white form-control rounded-3" name="username" autocomplete="off" value="<?php echo $return['username']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Email id:</td>
                            <td><input type="email" class="form-control rounded-3" name="email" value="<?php echo $return['email']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Phone Number:</td>
                            <td><input type="number" class="form-control rounded-3" name="phone" value="<?php echo $return['phone']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Gender:</td>
                            <td>
                                <input type="radio" name="gender" class="form-check-input m-1" value="Male" <?php if ($return['gender'] == 'Male') {
                                                                                                                echo "checked";
                                                                                                            } ?>>Male
                                <input type="radio" name="gender" class="form-check-input m-1" value="female" <?php if ($return['gender'] == 'female') {
                                                                                                                    echo "checked";
                                                                                                                } ?>>Female
                            </td>
                        </tr>
                        <tr>
                            <td>Hobby:</td>
                            <td>
                                <?php $ex = explode(",", $return['hobby']); ?>

                                <input type="checkbox" class="form-check-input m-1" name="hobby[]" value="Playing" <?php if (in_array('Playing', $ex)) {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>playing
                                <input type="checkbox" class="form-check-input m-1" name="hobby[]" value="Reading" <?php if (in_array('Reading', $ex)) {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>reading
                                <input type="checkbox" class="form-check-input m-1" name="hobby[]" value="Coding" <?php if (in_array('Coding', $ex)) {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>coding
                            </td>

                        </tr>
                        <tr>
                            <td>City:</td>
                            <td>
                                <select name="city" class="form-control bg-white rounded-3">
                                    <option value="" hidden>Select City</option>
                                    <option value="Surat" <?php if ($return['city'] == 'Surat') {
                                                                echo "selected";
                                                            } ?>>Surat</option>
                                    <option value="Vapi" <?php if ($return['city'] == 'Vapi') {
                                                                echo "selected";
                                                            } ?>>Vapi</option>
                                    <option value="Valsad" <?php if ($return['city'] == 'Valsad') {
                                                                echo "selected";
                                                            } ?>>Valsad</option>
                                    <option value="Bharuch" <?php if ($return['city'] == 'Bharuch') {
                                                                echo "selected";
                                                            } ?>>Bharuch</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="text" class="form-control rounded-3 bg-white" readonly name="password" value="<?php echo $return['password']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Confirm Password:</td>
                            <td><input type="text" class="form-control rounded-3 bg-white" readonly name="conpassword" value="<?php echo $return['conpassword']; ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center">
                                <button class="btn btn-success btn-lg active" name="btnsubmit">Update Profile</button>
                            </td>
                        </tr>
                    </table>

                <?php
                }
                ?>
            </form>
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
</body>

</html>