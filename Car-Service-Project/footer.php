<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Mota Varachha,Surat.</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91 78628 82054</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>carsolution@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="https://wa.me/+917862882054" target="_blank"><i class="fa-brands fa-whatsapp fs-5"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/carsolution.it" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.youtube.com/@carsolution786" target="_blank"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Opening Hours</h4>
                    <h6 class="text-light">Monday - Friday:</h6>
                    <p class="mb-4">09.00 AM - 09.00 PM</p>
                    <h6 class="text-light">Saturday - Sunday:</h6>
                    <p class="mb-0">09.00 AM - 12.00 PM</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Services</h4>
                    <a class="btn btn-link" href="RSA.php">RSA Service</a>
                    <a class="btn btn-link" href="car-booking.php">Car Booking</a>
                    <a class="btn btn-link" href="car-insurance.php">Car Insurance</a>
                    <a class="btn btn-link" href="old-car.php">Used Car</a>
                    <a class="btn btn-link" href="car-packages.php">Car Service Packages</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Join Us</h4>
                    <p>Enter your whatsapp number here to connect with us, so stay informed about the latest offers of Car Solutions.</p>
                    <div class="position-relative mx-auto mt-1" style="max-width: 400px;">
                        <?php
                            include("database.php");

                            if (isset($_REQUEST['btnwhatsapp'])) {
                                $whatsapp=$_REQUEST['whatsapp'];

                                $insert = "insert into whatsapp (whatsapp) values ('$whatsapp')";
                                mysqli_query($db,$insert);

                                echo '<script>
                                    alert("Whatsapp Number Send Successfully..");
                                    window.alert.href = "Home.php";
                                </script>';
                            }
                        ?>
                        <form action="" method="post" class="mt-2">
                            <input class="form-control border-0 w-100 pe-5" type="text" autocomplete="off" required pattern="[0-9]{10,10}" title="Enter 10 digits only" name="whatsapp" placeholder="Your Mobile Number">
                            <button type="submit" class="btn btn-primary position-absolute top-0 end-0" style="width: 30%; height: 36px;" name="btnwhatsapp">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="Home.php">Car Solution</a>, All Right Reserved.

                        Designed By <a class="border-bottom" href="#">Our Team Member</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="Home.php">Home</a>
                            <a href="car-packages.php">Service</a>
                            <a href="contact.php">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->