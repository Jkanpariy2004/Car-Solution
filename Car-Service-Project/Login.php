<?php
session_start();

$_SESSION['timeout'] = time() + 10800;
if (isset($_SESSION['timeout']) && time() > $_SESSION['timeout']) {
    session_unset();
    session_destroy();

    header("Location:Login.php");
}
include("database.php");

$user = '';
$password = '';

if (isset($_REQUEST['btnlogin'])) {
    $user = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    $errors = array();

    if (empty($user)) {
        $errors['username'] = "Username Can't be blank.";
    }

    if (empty($password)) {
        $errors['password'] = "Password Can't be blank.";
    }

    if (empty($errors)) {
        $sql = "select * from registration where username='$user' and BINARY password='$password'";
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['username'] = $user;
            header("Refresh: 10; URL=Home.php");
            $errors['success'] = "Login successful. Please Wait 5 seconds.";
        } else {
            $sql = "select * from registration where username='$user'";
            $result = mysqli_query($db, $sql);

            if (mysqli_num_rows($result) > 0) {
                $errors['password'] = "Incorrect Password.Please Enter Valid Password.";
            } else {
                $errors['username'] = "Username is not found.";
            }
        }
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

        .button {
            background: #fff;
            color: #000;
            font-weight: 600;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 3px;
            font-size: 20px;
            border: 2px solid transparent;
            transition: 0.3s ease;
        }

        .button:hover {
            color: #fff;
            border-color: #fff;
            background: rgba(255, 255, 255, 0.15);
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
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <div class="login">
        <form method="POST" class="loginbg p-4 wow fadeIn" data-wow-delay="0.1s" style="max-width: 50%;">
            <div class="text-center">
                <h1 class="m-3 text-white">Login</h1>
            </div>
            <?php
            if (isset($errors['success'])) {
                echo '<h5 class="alert alert-success text-center mb-3">' . $errors['success'] . '</h5>';
            }

            ?>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3 <?php if (isset($errors['username'])) echo 'is-invalid'; ?>" autocomplete="off" id="floatingInput" name="username" placeholder="" value="<?php echo htmlspecialchars($user); ?>" style="background-color: transparent; color: white;">
                <label for="floatingInput" style="color: white;">User Name</label>
                <?php
                if (isset($errors['username'])) {
                    echo '<h6 class="alert alert-danger">' . $errors['username'] . '</h6>';
                }
                ?>
            </div>

            <div class="form-floating position-relative">
                <input type="password" class="form-control rounded-3 <?php if (isset($errors['password'])) echo 'is-invalid'; ?>" autocomplete="off" id="passwordInput" name="password" placeholder="Password" value="<?php echo htmlspecialchars($password); ?>" style="background-color: transparent; color: white;">
                <label for="passwordInput" style="color: white;">Password</label>
                <i class="position-absolute top-50 end-0 translate-middle-y bi bi-eye-slash fs-4 toggle" id="toggleBtn1" style="cursor: pointer;" onclick="Password()"></i>
            </div>
            <?php
            if (isset($errors['password'])) {
                echo '<h6 class="alert alert-danger">' . $errors['password'] . '</h6>';
                echo '<style>
                    .toggle { 
                        margin-right: 30px; 
                        margin-top: 0px; 
                    }
                </style>';
            }
            ?>
            <script>
                function Password() {
                    var passwordInput = document.getElementById("passwordInput");
                    var passwordToggleIcon = document.getElementById("toggleBtn1");

                    if (passwordInput.type === "password") {
                        passwordInput.type = "text";
                        passwordToggleIcon.classList.remove("bi-eye-slash");
                        passwordToggleIcon.classList.add("bi-eye");
                    } else {
                        passwordInput.type = "password";
                        passwordToggleIcon.classList.remove("bi-eye");
                        passwordToggleIcon.classList.add("bi-eye-slash");
                    }
                }

                document.addEventListener("DOMContentLoaded", function() {
                    var successMessage = document.querySelector('.alert-success');
                    var usernameInput = document.querySelector('input[name="username"]');
                    var passwordInput = document.querySelector('input[name="password"]');

                    if (successMessage) {
                        var count = 5;
                        var countdownInterval = setInterval(function() {
                            successMessage.textContent = "Login successful. Please Wait " + count + " seconds.";
                            count--;
                            if (count < 0) {
                                clearInterval(countdownInterval);
                                window.location.href = "Home.php"; // Redirect to Home.php after countdown
                            }
                        }, 1000); // Update every second (1000 milliseconds)

                        // Clear the input values after countdown
                        setTimeout(function() {
                            usernameInput.value = '';
                            passwordInput.value = '';
                        }); // 5 seconds
                    }
                });
            </script>
            <div class="mt-3 text-end">
                <a href="Forgot-password.php" class="link-primary link-offset-2 text-white link-underline-opacity-25 link-underline-opacity-100-hover"> Forgot Password?</a>
            </div>
            <div class="m-auto">
                <input type="submit" name="btnlogin" class="btn w-100  btn-primary text-white fw-bold fs-4 btn mt-3 loginbtn rounded-3" value="Login">
            </div>
            <p class="mt-3 text-center text-white">Don't have an account?<a href="Register.php" class="link-primary link-offset-2 text-white link-underline-opacity-25 link-underline-opacity-100-hover"> Register</a></p>
        </form>
    </div>


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