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

$view = "Select * from add_car_rent";
$GetData = mysqli_query($db, $view);

$username1 = $_SESSION['username'];
$view2 = "select * from car_rent where name='$username1'";
$GetData2 = mysqli_query($db, $view2);

$view1 = "select * from car_rent where name='$username1'";
$GetData1 = mysqli_query($db, $view1);
$GetStatusData = mysqli_fetch_array($GetData1);

if (isset($_REQUEST['btnsubmit'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $mobile = $_REQUEST['phone'];
    $carname = $_REQUEST['carname'];
    $modelname = $_REQUEST['modelname'];
    $pickup_point = $_REQUEST['pickup'];
    $drop_point = $_REQUEST['drop'];
    $price = $_REQUEST['price'];
    $fuelprice = $_REQUEST['fuelprice'];
    $address = $_REQUEST['address'];
    $time = $_REQUEST['time'];
    $booking_number = rand(1000000000, 9999999999);
    $booking_date = date('Y-m-d', strtotime($_REQUEST['booking_date']));

    $insert = "insert into car_rent (name, email, mobile, carname, modelname, pickup_point, drop_point, price, fuelprice, address, time, booking_no, booking_date) values ('$name', '$email', '$mobile', '$carname', '$modelname', '$pickup_point', '$drop_point','$price','$fuelprice', '$address', '$time','$booking_number', '$booking_date')";
    if (mysqli_query($db, $insert)) {
        echo '<script>
            alert("Car Rent Service Booked Successfully.");
            window.location.href = "car-rent.php";
        </script>';
    } else {
        echo '<script>
            alert("Error: Unable to Booked Car Rent Service.");
        </script>';
    }
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$mobile = isset($_SESSION['mobile']) ? $_SESSION['mobile'] : '';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Solution</title>
    <link rel="icon" class="circle-rounded" type="image/png" href="img/logo.png" />
    <link rel="stylesheet" href="slider.css">
    <link rel="stylesheet" href="css copy/style.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
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

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.7.2/css/all.css"></script>

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        a {
            text-decoration: none;
        }

        form {
            text-align: justify;
        }

        .form-control:disabled,
        .form-control:read-only {
            background-color: white;
            opacity: 1;
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
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Car Service</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a href="car-packages.php" class="dropdown-item">Car Service Packages</a>
                        <a href="car-rent.php" class="dropdown-item active">Car Rent</a>
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


    <main class="cardmain">
        <nav class="nav d-none">
            <i class="uil uil-bars navOpenBtn"></i>
            <ul class="nav-links">
                <i class="uil uil-times navCloseBtn"></i>
            </ul>
            <i class="uil uil-search search-icon" id="searchIcon"></i>
        </nav>

        <section class="main-section">
            <div class="text-section block">
                <h1 style="color: #D81324 !important;">Car Rental</h1>
                <h3>Make your dreams come true , Start today</h3>
                <p>
                    A rental car is a vehicle that you can temporarily use in exchange for payment, typically on a daily
                    or weekly basis. People choose rental cars for various reasons, such as travel, business trips, or
                    when their own vehicle is unavailable. Rental car options vary from compact cars to SUVs and luxury
                    vehicles, offered by companies like Hertz, Avis, and Enterprise.
                </p>

                <div class="slot-buttons">
                    <a href="#" onclick="scrollToBottom()">
                        Slide Down
                    </a>
                </div>
            </div>
            <div class="img-container block">
                <div class="slider-container">
                    <div class="slider" id="slider"></div>
                </div>
            </div>
        </section>
    </main>


    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="car-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th class="bg-primary heading">Per Day Rate</th>
                                    <th class="bg-dark heading">Per Week Rate</th>
                                    <th class="bg-primary heading">Per Month Rate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($GetData)) {
                                ?>
                                    <tr class="">
                                        <td class="car-image w-25">
                                            <img class="" src="image/<?php echo $row['image']; ?>" width="95%" height="100%">
                                        </td>
                                        <td class="product-name">
                                            <h3 class="text-uppercase"><?php echo $row['name'] ?></h3>
                                            <p class="mb-0 rated">
                                                <span>rated:</span>
                                                <span class="fa-solid fa-star"></span>
                                                <span class="fa-solid fa-star"></span>
                                                <span class="fa-solid fa-star"></span>
                                                <span class="fa-solid fa-star"></span>
                                                <span class="fa-solid fa-star"></span>
                                            </p>
                                        </td>

                                        <td class="price">
                                            <p class="btn-custom">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $row['id']; ?>" data-bs-whatever="@mdo">Rent a car</button>
                                                <button onclick="openRazorpay(<?php echo $row['dprice'] ?>)" class="btn btn-success">Make Payment</button>
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
                                                            <h5 class="modal-title" id="exampleModalLabel">Car Rental</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post">
                                                                <div class="form-floating mb-3">
                                                                    <input type="email" class="form-control rounded-3 bg-white" id="nameInput" readonly value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" name="name" placeholder="" required autocomplete="off">
                                                                    <label for="nameInput">Enter Your Name</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="email" class="form-control rounded-3" id="emailInput" name="email" placeholder="" required autocomplete="off">
                                                                    <label for="emailInput">Enter Your Email</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded-3" pattern="[0-9]{10,10}" title="Enter 10 digits only" id="phoneInput" pattern="[0-9]{10,10}" title="Enter 10 digits oniy" name="phone" placeholder="" required autocomplete="off">
                                                                    <label for="phoneInput">Enter Your Mobile No.</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded-3" id="carNameInput" readonly name="carname" placeholder="" required autocomplete="off" value="<?php echo $row['name']; ?>">
                                                                    <label for="carNameInput">Enter Car Name</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded-3" id="modelNameInput" readonly name="modelname" placeholder="" required autocomplete="off" value="<?php echo $row['name']; ?>">
                                                                    <label for="modelNameInput">Enter Model Name</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded-3" id="pickupInput" name="pickup" placeholder="" required autocomplete="off">
                                                                    <label for="pickupInput">Enter Pickup Point</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded-3" id="dropInput" name="drop" placeholder="" required autocomplete="off">
                                                                    <label for="dropInput">Enter Drop Point</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded-3 bg-white" readonly id="dropInput" name="price" placeholder="" required autocomplete="off" value="<?php echo $row['dprice'] ?>">
                                                                    <label for="dropInput">Enter Price</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded-3 bg-white" readonly id="dropInput" name="fuelprice" placeholder="" required autocomplete="off" value="<?php echo $row['dfuelcharge'] ?>">
                                                                    <label for="dropInput">Enter Fuel Price</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <textarea class="form-control rounded-3" placeholder="" required id="floatingTextarea2" style="height: 100px" name="address"></textarea>
                                                                    <label for="floatingTextarea2">Enter Your Address</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded-3 bg-white" readonly id="dropInput" name="time" placeholder="" required autocomplete="off" value="1 Day">
                                                                    <label for="dropInput">Enter Time</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="date" class="form-control rounded-3 bg-white" id="dropInput" name="booking_date" placeholder="" required autocomplete="off">
                                                                    <label for="dropInput">Enter Booking Date</label>
                                                                </div>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <input type="submit" class="btn btn-primary" name="btnsubmit" value="Book Car">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            </p>
                                            <div class="price-rate">
                                                <h3>
                                                    <span class="num"><small class="currency">Rs.</small><?php echo $row['dprice'] ?></span>
                                                    <span class="per">/Per Day</span>
                                                </h3>
                                                <span class="subheading">Rs<?php echo $row['dfuelcharge'] ?>/hour fuel surcharges</span>
                                            </div>
                                        </td>

                                        <td class="price">
                                            <p class="btn-custom">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1_<?php echo $row['id']; ?>" data-bs-whatever="@mdo">Rent a car</button>
                                                <button onclick="openRazorpay(<?php echo $row['wprice'] ?>)" class="btn btn-success">Make Payment</button>
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
                                            <div class="modal fade" id="exampleModal1_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Car Rental</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post">
                                                                <div class="form-floating mb-3">
                                                                    <input type="email" class="form-control rounded-3 bg-white" id="nameInput" readonly value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" name="name" placeholder="" required autocomplete="off">
                                                                    <label for="nameInput">Enter Your Name</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="email" class="form-control rounded-3" id="emailInput" name="email" placeholder="" required autocomplete="off">
                                                                    <label for="emailInput">Enter Your Email</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded-3" pattern="[0-9]{10,10}" title="Enter 10 digits only" id="phoneInput" name="phone" placeholder="" required autocomplete="off">
                                                                    <label for="phoneInput">Enter Your Mobile No.</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded-3" id="carNameInput" readonly name="carname" placeholder="" required autocomplete="off" value="<?php echo $row['name']; ?>">
                                                                    <label for="carNameInput">Enter Car Name</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded-3" id="modelNameInput" readonly name="modelname" placeholder="" required autocomplete="off" value="<?php echo $row['name']; ?>">
                                                                    <label for="modelNameInput">Enter Model Name</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded-3" id="pickupInput" name="pickup" placeholder="" required autocomplete="off">
                                                                    <label for="pickupInput">Enter Pickup Point</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded-3" id="dropInput" name="drop" placeholder="" required autocomplete="off">
                                                                    <label for="dropInput">Enter Drop Point</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded-3 bg-white" readonly id="dropInput" name="price" placeholder="" required autocomplete="off" value="<?php echo $row['wprice'] ?>">
                                                                    <label for="dropInput">Enter Price</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded-3 bg-white" readonly id="dropInput" name="fuelprice" placeholder="" required autocomplete="off" value="<?php echo $row['wfuelprise'] ?>">
                                                                    <label for="dropInput">Enter Fuel Price</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <textarea class="form-control rounded-3" placeholder="" required id="floatingTextarea2" style="height: 100px" name="address"></textarea>
                                                                    <label for="floatingTextarea2">Enter Your Address</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded-3 bg-white" readonly id="dropInput" name="time" placeholder="" required autocomplete="off" value="1 Week">
                                                                    <label for="dropInput">Enter Time</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="date" class="form-control rounded-3 bg-white" id="dropInput" name="booking_date" placeholder="" required autocomplete="off">
                                                                    <label for="dropInput">Enter Booking Date</label>
                                                                </div>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <input type="submit" class="btn btn-primary" name="btnsubmit" value="Book Car">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            </p>
                                            <div class="price-rate">
                                                <h3>
                                                    <span class="num"><small class="currency">Rs</small><?php echo $row['wprice'] ?></span>
                                                    <span class="per">/Per Week</span>
                                                </h3>
                                                <span class="subheading">RS.<?php echo $row['wfuelprise'] ?>/hour fuel surcharges</span>
                                            </div>
                                        </td>

                                        <td class="price">
                                            <p class="btn-custom">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2_<?php echo $row['id']; ?>" data-bs-whatever="@mdo">Rent a car</button>
                                                <button onclick="openRazorpay(<?php echo $row['mprice'] ?>)" class="btn btn-success">Make Payment</button>
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
                                            <div class="modal fade" id="exampleModal2_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Car Rental</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post">
                                                                <div class="form-floating mb-3">
                                                                    <input type="email" class="form-control rounded-3 bg-white" id="nameInput" readonly value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" name="name" placeholder="" required autocomplete="off">
                                                                    <label for="nameInput">Enter Your Name</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="email" class="form-control rounded-3" id="emailInput" name="email" placeholder="" required autocomplete="off">
                                                                    <label for="emailInput">Enter Your Email</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded-3" pattern="[0-9]{10,10}" title="Enter 10 digits only" id="phoneInput" name="phone" placeholder="" required autocomplete="off">
                                                                    <label for="phoneInput">Enter Your Mobile No.</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded-3" id="carNameInput" readonly name="carname" placeholder="" required autocomplete="off" value="<?php echo $row['name']; ?>">
                                                                    <label for="carNameInput">Enter Car Name</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded-3" id="modelNameInput" readonly name="modelname" placeholder="" required autocomplete="off" value="<?php echo $row['name']; ?>">
                                                                    <label for="modelNameInput">Enter Model Name</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded-3" id="pickupInput" name="pickup" placeholder="" required autocomplete="off">
                                                                    <label for="pickupInput">Enter Pickup Point</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded-3" id="dropInput" name="drop" placeholder="" required autocomplete="off">
                                                                    <label for="dropInput">Enter Drop Point</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded-3" readonly id="dropInput" name="price" placeholder="" required autocomplete="off" value="<?php echo $row['mprice'] ?>">
                                                                    <label for="dropInput">Enter Price</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded-3" readonly id="dropInput" name="fuelprice" placeholder="" required autocomplete="off" value="<?php echo $row['mfuelprice'] ?>">
                                                                    <label for="dropInput">Enter Fuel Price</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <textarea class="form-control rounded-3" placeholder="" required id="floatingTextarea2" style="height: 100px" name="address"></textarea>
                                                                    <label for="floatingTextarea2">Enter Your Address</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control rounded-3 bg-white" readonly id="dropInput" name="time" placeholder="" required autocomplete="off" value="1 Month">
                                                                    <label for="dropInput">Enter Time</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="date" class="form-control rounded-3 bg-white" id="dropInput" name="booking_date" placeholder="" required autocomplete="off">
                                                                    <label for="dropInput">Enter Booking Date</label>
                                                                </div>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <input type="submit" class="btn btn-primary" name="btnsubmit" value="Book Car">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            </p>
                                            <div class="price-rate">
                                                <h3>
                                                    <span class="num"><small class="currency">Rs</small><?php echo $row['mprice'] ?></span>
                                                    <span class="per">/per month</span>
                                                </h3>
                                                <span class="subheading">Rs.<?php echo $row['mfuelprice'] ?>/hour fuel surcharges</span>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    if (mysqli_num_rows($GetData1) > 0) {
    ?>
        <div style="border: 1px solid black; border-radius: 10px; margin: auto; padding: 10px; width: 60%; margin-top: 20px;" class="wow fadeInUp" data-wow-delay="0.1s">
            <h3 class="text-center">Car Rent Details</h3>
            <div style="border: 1px solid black; border-radius: 10px; padding: 10px; margin: 10px;">
                <div class="w-100 d-flex">
                    <div class="w-50">Name </div>
                    <div class="w-50">: <?php echo $GetStatusData['name'] ?></div>
                </div>
                <div class="w-100 d-flex">
                    <div class="w-50">Email </div>
                    <div class="w-50">: <?php echo $GetStatusData['email'] ?></div>
                </div>
                <div class="w-100 d-flex">
                    <div class="w-50">Mobile</div>
                    <div class="w-50">: <?php echo $GetStatusData['mobile'] ?></div>
                </div>
                <div class="w-100 d-flex">
                    <div class="w-50">Car Name</div>
                    <div class="w-50">: <?php echo $GetStatusData['carname'] ?></div>
                </div>
                <div class="w-100 d-flex">
                    <div class="w-50">Car Model Name</div>
                    <div class="w-50">: <?php echo $GetStatusData['modelname'] ?></div>
                </div>
                <div class="w-100 d-flex">
                    <div class="w-50">Pick Up Point</div>
                    <div class="w-50">: <?php echo $GetStatusData['pickup_point'] ?></div>
                </div>
                <div class="w-100 d-flex">
                    <div class="w-50">Drop Point </div>
                    <div class="w-50">: <?php echo $GetStatusData['drop_point'] ?></div>
                </div>
                <div class="w-100 d-flex">
                    <div class="w-50">Price</div>
                    <div class="w-50">: <?php echo $GetStatusData['price'] ?></div>
                </div>
                <div class="w-100 d-flex">
                    <div class="w-50">Fuel Price </div>
                    <div class="w-50">: <?php echo $GetStatusData['fuelprice'] ?></div>
                </div>
                <div class="w-100 d-flex">
                    <div class="w-50">Address</div>
                    <div class="w-50">: <?php echo $GetStatusData['address'] ?></div>
                </div>
                <div class="w-100 d-flex">
                    <div class="w-50">Time </div>
                    <div class="w-50">: <?php echo $GetStatusData['time'] ?></div>
                </div>
                <div class="w-100 d-flex">
                    <div class="w-50">Booking Number </div>
                    <div class="w-50">: <?php echo $GetStatusData['booking_no'] ?></div>
                </div>
                <div class="w-100 d-flex">
                    <div class="w-50">Booking Date </div>
                    <div class="w-50">: <?php echo date('d-m-Y', strtotime($GetStatusData['booking_date'])) ?></div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <?php include("footer.php"); ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top" style="display: none;"><i class="bi bi-arrow-up"></i></a>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        const nav = document.querySelector(".nav"),
            searchIcon = document.querySelector("#searchIcon"),
            navOpenBtn = document.querySelector(".navOpenBtn"),
            navCloseBtn = document.querySelector(".navCloseBtn");
        const slider = document.getElementById("slider");

        searchIcon.addEventListener("click", () => {
            nav.classList.toggle("openSearch");
            nav.classList.remove("openNav");
            if (nav.classList.contains("openSearch")) {
                return searchIcon.classList.replace("uil-search", "uil-times");
            }
            searchIcon.classList.replace("uil-times", "uil-search");
        });

        navOpenBtn.addEventListener("click", () => {
            nav.classList.add("openNav");
            nav.classList.remove("openSearch");
            searchIcon.classList.replace("uil-times", "uil-search");
        });
        navCloseBtn.addEventListener("click", () => {
            nav.classList.remove("openNav");
        });

        const imageArray = [
            "https://freepngimg.com/thumb/car/11-2-car-picture.png",
            "https://www.freepnglogos.com/uploads/car-png/car-png-large-images-40.png",
            "https://freepngimg.com/thumb/car/11-2-car-picture.png",
            "https://www.freepnglogos.com/uploads/car-png/car-png-large-images-40.png",
            "https://freepngimg.com/thumb/car/11-2-car-picture.png",
            "https://www.freepnglogos.com/uploads/car-png/car-png-large-images-40.png",
        ];

        let currentIndex = 0;

        function scrollToBottom() {
            window.scrollTo({
                top: document.body.scrollHeight,
                behavior: "smooth"
            });
        }

        function showSlide(index) {
            const newPosition = -index * 100 + "%";
            slider.style.transform = "translateX(" + newPosition + ")";
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % imageArray.length;
            showSlide(currentIndex);
        }

        setInterval(nextSlide, 3000);

        // Dynamically add images to the slider
        imageArray.forEach((imageUrl) => {
            const slide = document.createElement("div");
            slide.classList.add("slide");

            const image = document.createElement("img");
            image.src = imageUrl;
            image.alt = "Slider Image";
            image.classList.add("image");

            slide.appendChild(image);
            slider.appendChild(slide);
        });

        // Show the initial slide
        showSlide(currentIndex);
    </script>

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