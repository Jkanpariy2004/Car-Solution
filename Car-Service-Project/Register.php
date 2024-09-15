<?php
session_start();
error_reporting(0);
include("database.php");

$_SESSION['timeout'] = time() + 10800;
if (isset($_SESSION['timeout']) && time() > $_SESSION['timeout']) {
    session_unset();
    session_destroy();

    header("Location:Login.php");
}

$user = '';
$email = '';
$phone = '';
$gender = '';
$hobby = '';
$image = '';
$city = '';
$password = '';
$con_password = '';

if (isset($_REQUEST['btnsubmit'])) {
    $user = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $gender = $_REQUEST['gender'];
    $hobby = isset($_REQUEST['hobby']) ? implode(',', $_REQUEST['hobby']) : '';
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], 'image/' . $image);
    $city = $_REQUEST['city'];
    $password = $_REQUEST['password'];
    $con_password = $_REQUEST['conpassword'];

    $errors = array();

    if (empty($user)) {
        $errors['username'] = 'Username cannot be blank.';
    }

    if (empty($email)) {
        $errors['email'] = 'Email cannot be blank.';
    }

    if (empty($phone)) {
        $errors['phone'] = 'Phone Number cannot be blank.';
    } elseif (!ctype_digit($phone)) {
        $errors['phone'] = 'Phone Number should contain digits only.';
    } elseif (strlen($phone) != 10) {
        $errors['phone'] = 'Please enter 10 digits only.';
    } elseif (!preg_match("/^[789]\d{9}$/", $phone)) {
        $errors['phone'] = 'Please enter a valid Indian phone number.';
    }

    if (!isset($gender)) {
        $errors['gender'] = 'Gender must be selected.';
    }

    if (empty($hobby)) {
        $errors['hobby'] = 'At least one hobby must be selected.';
    }

    if (empty($image)) {
        $errors['image'] = 'Please Upload your Photo.';
    }

    if (empty($city)) {
        $errors['city'] = 'City must be selected.';
    }

    if (empty($password)) {
        $errors['password'] = 'Password cannot be blank.';
    } elseif (strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters long.';
    }

    if (empty($con_password)) {
        $errors['conpassword'] = 'Confirm Password cannot be blank.';
    } elseif ($password != $con_password) {
        $errors['conpassword'] = 'Password and Confirm Password do not match.';
    }


    $query = "select * from registration where username='$user' or email='$email' or phone='$phone'";
    $result = mysqli_query($db, $query);
    $existing_records = mysqli_num_rows($result);

    if ($existing_records) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['username'] == $user) {
                $_SESSION['username'] = $user;
                $errors['username'] = 'Username already exists.';
            }
            if ($row['email'] == $email) {
                $errors['email'] = 'Email already exists.';
            }
            if ($row['phone'] == $phone) {
                $errors['phone'] = 'Phone Number already exists.';
            }
        }
    }

    if (empty($errors)) {
        $sql = "insert into registration (username, email, phone, gender, hobby, image, city, password, conpassword) values ('$user', '$email', '$phone', '$gender', '$hobby', '$image', '$city', '$password', '$con_password')";
        mysqli_query($db, $sql);

        $errors['success'] = 'Your Registration Was Successfull..';
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
        body {
            background-image: url('image/colorful-wallpaper-background-multicolored-generative-ai.jpg');
            background-size: cover;
            background-position: center;
        }

        .valid:before {
            position: relative;
            left: -35px;
            content: "✔";
        }

        .invalid:before {
            position: relative;
            left: -35px;
            content: "✖";
        }

        #message p {
            display: none;
        }

        #message p.valid {
            display: block;
        }

        #message p.invalid {
            display: block;
            color: red;
        }


        .register {
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 100vh; */
            margin: 50px;
        }

        .registerbg {
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
        }

        .textbox {
            background-color: transparent;
            color: white;
        }

        .textbox:focus {
            background-color: transparent;
            color: white;
        }

        .form-floating label {
            color: white;
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

        .was-validated .form-check-input:invalid~.form-check-label,
        .form-check-input.is-invalid~.form-check-label {
            color: red;
        }

        .was-validated .form-check-input:invalid,
        .form-check-input.is-invalid {
            border-color: white;
        }

        .form-check-input[type="radio"] {
            border-radius: 50%;
            border-color: white;
        }

        .form-check-input[type="checkbox"] {
            border-radius: .25em;
            border-color: white;
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
                <a href="news.php" class="nav-item nav-link"><i class="fa-solid fa-user"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->



    <div class="register">
        <form method="POST" class="registerbg p-4 wow fadeIn" enctype="multipart/form-data" data-wow-delay="0.1s" style="max-width: 50%;">
            <div class="text-center">
                <h1 class="m-3 text-white">Register</h1>
            </div>
            <?php
            if (isset($errors['success'])) {
                echo '<h6 class="alert alert-success">' . $errors['success'] . '</h6>';
            }
            ?>
            <div class="form-floating mt-3">
                <input type="text" class="form-control rounded-3 <?php if (isset($errors['username'])) echo 'is-invalid'; ?> textbox" autocomplete="off" id="floatingInput" name="username" placeholder="" value="<?php echo htmlspecialchars($user); ?>">
                <label for="floatingInput label">Enter your Username</label>
            </div>
            <?php
            if (isset($errors['username'])) {
                echo '<div class="alert alert-danger">' . $errors['username'] . '</div>';
            }
            ?>

            <div class="form-floating mt-3">
                <input type="email" class="form-control rounded-3 <?php if (isset($errors['email'])) echo 'is-invalid'; ?> textbox" autocomplete="off" id="floatingInput" name="email" placeholder="" value="<?php echo htmlspecialchars($email); ?>">
                <label for="floatingInput">Enter your Email</label>
            </div>
            <?php
            if (isset($errors['email'])) {
                echo '<div class="alert alert-danger">' . $errors['email'] . '</div>';
            }
            ?>

            <div class="form-floating mt-3">
                <input type="text" class="form-control rounded-3 <?php if (isset($errors['phone'])) echo 'is-invalid'; ?> textbox" autocomplete="off" id="phone" name="phone" placeholder="" value="<?php echo htmlspecialchars($phone); ?>">
                <label for="phone">Enter your Mobile No.</label>
            </div>
            <?php
            if (isset($errors['phone'])) {
                echo '<div class="alert alert-danger">' . $errors['phone'] . '</div>';
            }
            ?>

            <div class="form-floating mt-3 d-flex">
                <div class="w-25">
                    <label for="">Gender:</label>
                </div>
                <div class="form-check w-25">
                    <input class="form-check-input <?php if (isset($errors['gender'])) echo 'is-invalid'; ?> textbox" type="radio" name="gender" value="Male" id="flexRadioDefault1" <?php if (isset($_POST['gender']) && $_POST['gender'] == 'Male') echo 'checked'; ?>>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Male
                    </label>
                </div>
                <div class="form-check w-50">
                    <input class="form-check-input <?php if (isset($errors['gender'])) echo 'is-invalid'; ?> textbox" type="radio" name="gender" value="Female" id="flexRadioDefault2" <?php if (isset($_POST['gender']) && $_POST['gender'] == 'Female') echo 'checked'; ?>>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Female
                    </label>
                </div>
                <?php if (isset($errors['gender'])) : ?>
                    <div class="invalid-feedback">
                        <?php echo $errors['gender']; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php
            if (isset($errors['gender'])) {
                echo '<div class="alert alert-danger">' . $errors['gender'] . '</div>';
            }
            ?>

            <div class="form-floating mt-3 d-flex">
                <div class="w-25">
                    <label for="">Hobby:</label>
                </div>
                <div class="form-check w-25">
                    <input class="form-check-input <?php if (isset($errors['hobby'])) echo 'is-invalid'; ?> textbox" type="checkbox" value="Playing" name="hobby[]" id="flexCheckDefault" <?php if (isset($_POST['hobby']) && in_array('Playing', $_POST['hobby'])) echo 'checked'; ?>>
                    <label class="form-check-label" for="flexCheckDefault">
                        Playing
                    </label>
                </div>
                <div class="form-check w-25">
                    <input class="form-check-input <?php if (isset($errors['hobby'])) echo 'is-invalid'; ?> textbox" type="checkbox" value="Reading" name="hobby[]" id="flexCheckDefault1" <?php if (isset($_POST['hobby']) && in_array('Reading', $_POST['hobby'])) echo 'checked'; ?>>
                    <label class="form-check-label" for="flexCheckDefault1">
                        Reading
                    </label>
                </div>
                <div class="form-check w-25">
                    <input class="form-check-input <?php if (isset($errors['hobby'])) echo 'is-invalid'; ?> textbox" type="checkbox" value="Coding" name="hobby[]" id="flexCheckDefault2" <?php if (isset($_POST['hobby']) && in_array('Coding', $_POST['hobby'])) echo 'checked'; ?>>
                    <label class="form-check-label" for="flexCheckDefault2">
                        Coding
                    </label>
                </div>
                <?php if (isset($errors['hobby'])) : ?>
                    <div class="invalid-feedback">
                        <?php echo $errors['hobby']; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php
            if (isset($errors['hobby'])) {
                echo '<div class="alert alert-danger">' . $errors['hobby'] . '</div>';
            }
            ?>

            <div class="">
                <label for="formFile" class="text-white mt-2">Upload your Photo:</label>
                <input type="file" class="form-control rounded-3 bg-transparent <?php if (isset($errors['image'])) echo 'is-invalid'; ?> textbox" autocomplete="off" id="floatingInput" name="image" placeholder="image" value="<?php echo htmlspecialchars($image); ?>">
            </div>
            <?php
            if (isset($errors['image'])) {
                echo '<div class="alert alert-danger mt-2">' . $errors['image'] . '</div>';
            }

            if (isset($_FILES['image']['name'])) {
                $uploadedImage = $_FILES['image']['name'];
                echo '<div style="color: white;">Uploaded Image: ' . htmlspecialchars($uploadedImage) . '</div>';
            }
            ?>

            <div class="mt-3">
                <select class="form-control bg-transparent rounded-3 <?php if (isset($errors['city'])) echo 'is-invalid'; ?> textbox" style="padding: 15px;" name="city">
                    <option hidden value="">Select your Select City</option>
                    <option value="Surat" class="bg-dark" <?php if ($city == 'Surat') echo 'selected'; ?>>Surat</option>
                    <option value="Vapi" class="bg-dark" <?php if ($city == 'Vapi') echo 'selected'; ?>>Vapi</option>
                    <option value="Bharuch" class="bg-dark" <?php if ($city == 'Bharuch') echo 'selected'; ?>>Bharuch</option>
                    <option value="Valsad" class="bg-dark" <?php if ($city == 'Valsad') echo 'selected'; ?>>Valsad</option>
                </select>
                <?php
                if (isset($errors['city'])) {
                    echo '<div class="alert alert-danger">' . $errors['city'] . '</div>';
                }
                ?>
            </div>

            <div class="form-floating mt-3">
                <div class="form-floating">
                    <input type="password" class="form-control rounded-3 <?php if (isset($errors['password'])) echo 'is-invalid'; ?> textbox" autocomplete="off" id="psw" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one number, one uppercase and lowercase letter, one special character, and be at least 8 characters long" value="<?php echo htmlspecialchars($password); ?>">
                    <label for="psw">Enter Your Password</label>
                    <i class="position-absolute top-50 end-0 translate-middle-y bi bi-eye-slash fs-4 toggle text-white" id="toggleBtn1" style="cursor: pointer;" onclick="togglePassword('psw', 'toggleBtn1')"></i>
                </div>
                <?php
                if (isset($errors['password'])) {
                    echo '<div class="alert alert-danger">' . $errors['password'] . '</div>';
                    echo '<style>
                        .toggle { 
                            margin-right: 30px; 
                            margin-top: 0px; 
                        }
                    </style>';
                }
                ?>
            </div>
            <div id="message">
                <h5>Password must contain the following:</h5>
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>
            <div class="form-floating mt-3">
                <input type="password" class="form-control rounded-3 <?php if (isset($errors['conpassword'])) echo 'is-invalid'; ?> textbox" autocomplete="off" id="psw1" name="conpassword" placeholder="Confirm Password" value="<?php echo htmlspecialchars($con_password); ?>">
                <label for="psw1">Confirm Your Password</label>
                <i class="position-absolute top-50 end-0 translate-middle-y bi bi-eye-slash fs-4 toggle text-white" id="toggleBtn2" style="cursor: pointer;" onclick="togglePassword('psw1', 'toggleBtn2')"></i>
            </div>
            <?php
            if (isset($errors['conpassword'])) {
                echo '<div class="alert alert-danger">' . $errors['conpassword'] . '</div>';
                echo '<style>
                    .toggle { 
                        margin-right: 30px; 
                        margin-top: 0px; 
                    }
            </style>';
            }
            ?>

            <script>
                function togglePassword(inputId, toggleBtnId) {
                    const passwordInput = document.getElementById(inputId);
                    const toggleBtn = document.getElementById(toggleBtnId);

                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        toggleBtn.classList.remove('bi-eye-slash');
                        toggleBtn.classList.add('bi-eye');
                    } else {
                        passwordInput.type = 'password';
                        toggleBtn.classList.remove('bi-eye');
                        toggleBtn.classList.add('bi-eye-slash');
                    }
                }


                document.addEventListener("DOMContentLoaded", function() {
                    var successMessage = document.querySelector('.alert-success');
                    var usernameInput = document.querySelector('input[name="username"]');
                    var emailInput = document.querySelector('input[name="email"]');
                    var phoneInput = document.querySelector('input[name="phone"]');
                    var genderInputs = document.querySelectorAll('input[name="gender"]');
                    var hobbyInputs = document.querySelectorAll('input[name="hobby[]"]');
                    var imageInput = document.querySelector('input[name="image"]');
                    var citySelect = document.querySelector('select[name="city"]');
                    var passwordInput = document.querySelector('input[name="password"]');
                    var confirmPasswordInput = document.querySelector('input[name="conpassword"]');

                    if (successMessage) {
                        var count = 5;
                        var countdownInterval = setInterval(function() {
                            successMessage.textContent = "Registration successful. Please wait " + count + " seconds.";
                            count--;
                            if (count < 0) {
                                clearInterval(countdownInterval);
                                window.location.href = "Login.php"; 
                            }
                        }, 1000); // Update every second (1000 milliseconds)

                        setTimeout(function() {
                            usernameInput.value = '';
                            emailInput.value = '';
                            phoneInput.value = '';
                            genderInputs.forEach(function(input) {
                                input.checked = false;
                            });
                            hobbyInputs.forEach(function(input) {
                                input.checked = false;
                            });
                            imageInput.value = '';
                            citySelect.selectedIndex = 0;
                            passwordInput.value = '';
                            confirmPasswordInput.value = '';
                        }); 
                    }
                });
            </script>

            <div class="m-auto">
                <input type="submit" name="btnsubmit" class="btn w-100  btn-primary text-white fw-bold fs-4 btn mt-3 loginbtn rounded-3" value="Register">
            </div>
            <p class="mt-3 text-center text-white">Do you have an account?<a href="Login.php" class="text-white link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Login</a></p>
        </form>



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


        <script>
            var myInput = document.getElementById("psw");
            var letter = document.getElementById("letter");
            var capital = document.getElementById("capital");
            var number = document.getElementById("number");
            var length = document.getElementById("length");

            // When the user clicks on the password field, show the message box
            myInput.onfocus = function() {
                document.getElementById("message").style.display = "block";
            }

            // When the user clicks outside of the password field, hide the message box
            myInput.onblur = function() {
                document.getElementById("message").style.display = "none";
            }

            // When the user starts to type something inside the password field
            myInput.onkeyup = function() {
                // Validate lowercase letters
                var lowerCaseLetters = /[a-z]/g;
                if (myInput.value.match(lowerCaseLetters)) {
                    letter.classList.remove("invalid");
                    letter.classList.add("valid");
                } else {
                    letter.classList.remove("valid");
                    letter.classList.add("invalid");
                }

                // Validate capital letters
                var upperCaseLetters = /[A-Z]/g;
                if (myInput.value.match(upperCaseLetters)) {
                    capital.classList.remove("invalid");
                    capital.classList.add("valid");
                } else {
                    capital.classList.remove("valid");
                    capital.classList.add("invalid");
                }

                // Validate numbers
                var numbers = /[0-9]/g;
                if (myInput.value.match(numbers)) {
                    number.classList.remove("invalid");
                    number.classList.add("valid");
                } else {
                    number.classList.remove("valid");
                    number.classList.add("invalid");
                }

                // Validate length
                if (myInput.value.length >= 8) {
                    length.classList.remove("invalid");
                    length.classList.add("valid");
                } else {
                    length.classList.remove("valid");
                    length.classList.add("invalid");
                }
            }

            function Password() {
                var passwordInput = document.getElementById("psw");
                var toggleButton = document.getElementById("toggleBtn");

                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    toggleButton.classList.remove("bi-eye");
                    toggleButton.classList.add("bi-eye-slash");
                } else {
                    passwordInput.type = "password";
                    toggleButton.classList.remove("bi-eye-slash");
                    toggleButton.classList.add("bi-eye");
                }
            }
        </script>


</body>

</html>