<?php
session_start();

$_SESSION['timeout'] = time() + 10800;
if (isset($_SESSION['timeout']) && time() > $_SESSION['timeout']) {
    session_unset();
    session_destroy();

    header("Location:Login.php");
}
include("database.php");


if (isset($_REQUEST['btnlogin'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $user = $_REQUEST['user'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], 'Car-service-project/image/' . $image);
    $password = $_REQUEST['password'];
    $con_password = $_REQUEST['conpassword'];

    $errors = array();

    if (empty($name)) {
        $errors['name'] = "name cannot be blank.";
    }

    if (empty($email)) {
        $errors['email'] = "email cannot be blank.";
    }

    if (empty($phone)) {
        $errors['phone_number'] = 'Phone Number cannot be blank.';
    } elseif (!preg_match("/^[789]\d{9}$/", $phone)) {
        $errors['phone_number'] = 'Please enter 10 digits only.';
    }

    if (empty($user)) {
        $errors['username'] = "username cannot be blank.";
    }

    if (empty($image)) {
        $errors['photo'] = "Please Upload Your Photo.";
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

    if (empty($errors)) {
        $sql = " insert into mechanic_register (name,email,phone_number,username,photo,password,conpassword) values ('$name','$email','$phone','$user','$image','$password','$con_password')";
        $result = mysqli_query($db, $sql);

        $errors['success'] = "Your Registration Successfull...";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
        .login {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 150vh;
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

    <div class="login">
        <form method="POST" class="loginbg p-4 wow fadeIn" data-wow-delay="0.1s" style="max-width: 50%;" enctype="multipart/form-data">
            <div class="text-center">
                <h1 class="m-3">Mechanic Registration</h1>
            </div>
            <?php
            if (isset($errors['success'])) {
                echo '<h5 class="alert alert-success text-center mb-3">' . $errors['success'] . '</h5>';
            }
            ?>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3 <?php if (isset($errors['name'])) echo 'is-invalid'; ?>" autocomplete="off" id="floatingInput" name="name" placeholder="">
                <label for="floatingInput">Enter Your Name</label>
                <?php
                if (isset($errors['name'])) {
                    echo '<h6 class="alert alert-danger">' . $errors['name'] . '</h6>';
                }
                ?>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control rounded-3 <?php if (isset($errors['email'])) echo 'is-invalid'; ?>" autocomplete="off" id="floatingInput" name="email" placeholder="">
                <label for="floatingInput">Enter Your Email</label>
                <?php
                if (isset($errors['email'])) {
                    echo '<h6 class="alert alert-danger">' . $errors['email'] . '</h6>';
                }
                ?>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3 <?php if (isset($errors['phone_number'])) echo 'is-invalid'; ?>" autocomplete="off" id="floatingInput" name="phone" placeholder="">
                <label for="floatingInput">Enter Your Phone Number</label>
                <?php
                if (isset($errors['phone_number'])) {
                    echo '<h6 class="alert alert-danger">' . $errors['phone_number'] . '</h6>';
                }
                ?>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3 <?php if (isset($errors['username'])) echo 'is-invalid'; ?>" autocomplete="off" id="floatingInput" name="user" placeholder="">
                <label for="floatingInput">Enter Your User Name</label>
                <?php
                if (isset($errors['username'])) {
                    echo '<h6 class="alert alert-danger">' . $errors['username'] . '</h6>';
                }
                ?>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label mb-0">Enter your Profile Photo</label>
                <input class="form-control" name="image" type="file" id="formFile" class=" <?php if (isset($errors['photo'])) echo 'is-invalid'; ?>">
                <?php
                if (isset($errors['photo'])) {
                    echo '<h6 class="alert alert-danger">' . $errors['photo'] . '</h6>';
                }
                ?>
            </div>

            <div class="form-floating mt-3">
                <div class="form-floating">
                    <input type="password" class="form-control rounded-3 <?php if (isset($errors['password'])) echo 'is-invalid'; ?> textbox" autocomplete="off" id="psw" name="password" placeholder="Password">
                    <label for="psw">Enter Your Password</label>
                    <i class="position-absolute top-50 end-0 translate-middle-y bi bi-eye-slash fs-4 toggle" id="toggleBtn1" style="cursor: pointer;" onclick="togglePassword('psw', 'toggleBtn1')"></i>
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
            <div class="form-floating mt-3">
                <input type="password" class="form-control rounded-3 <?php if (isset($errors['conpassword'])) echo 'is-invalid'; ?> textbox" autocomplete="off" id="psw1" name="conpassword" placeholder="Confirm Password">
                <label for="psw1">Confirm Your Password</label>
                <i class="position-absolute top-50 end-0 translate-middle-y bi bi-eye-slash fs-4 toggle" id="toggleBtn2" style="cursor: pointer;" onclick="togglePassword('psw1', 'toggleBtn2')"></i>
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
            </script>

            <div class="m-auto">
                <input type="submit" name="btnlogin" class="btn w-100  btn-primary fw-bold fs-5 btn mt-3 loginbtn rounded-3" value="Register">
            </div>
            <div class="text-center">
                <a type="submit" href="Login.php" class="btn btn-danger w-25 btn mt-3 loginbtn rounded-3">Admin Login</a>
                <a type="submit" href="Mechanic-Login.php" class="btn btn-success w-25 btn mt-3 loginbtn rounded-3">Mechanic Login</a>
                <a type="submit" href="Mechanic-id-reg.php" class="btn btn-warning w-25 btn mt-3 loginbtn rounded-3">Mechanic Register</a>
            </div>
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