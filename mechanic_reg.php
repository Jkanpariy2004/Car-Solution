<?php
session_start();

$_SESSION['timeout'] = time() + 10800;
if (isset($_SESSION['timeout']) && time() > $_SESSION['timeout']) {
    session_unset();
    session_destroy();

    header("Location:Mechanic-Login.php");
}
include("database.php");

// if ($_SESSION['email'] == '') {
// 	header("location:Login_admin.php");
// }

if ($_SESSION['email'] == '') {
    header("location:Login.php");
}

$view = "Select * from mechanic_register";
$GetData = mysqli_query($db, $view);

if (isset($_REQUEST['delete'])) {
    $id = $_REQUEST['delete'];
    $editimg = "select *from mechanic_register where id='$id'";
    $img1 = mysqli_query($db, $editimg);
    $return = mysqli_fetch_array($img1);
    unlink('College-Service-Project/image/' . $return['image']);

    $sql = "delete from mechanic_register where id='$id' ";
    mysqli_query($db, $sql);
    header("location:user.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Car Solution Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
    <style>
        .table-container {
            border: 1px solid #000;
            border-radius: 10px;
            padding: 10px;
            margin: auto;
            margin-right: 10px;
            margin-left: 10px;
            margin-bottom: 10px;
            padding-left: 10px;
            padding-right: 10px;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="img/logo.png" class="rounded-circle" alt="" height="50" width="50">
                </div>
                <div class="sidebar-brand-text mx-3">Admin Dashboard</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="user.php">
                    <i class='bx bx-user'></i>
                    <span>User data</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsehome" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Home Page</span>
                </a>
                <div id="collapsehome" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Add data:</h6>
                        <a class="collapse-item" href="home-slider.php">Slider</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Find Data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Find Fuel data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">All City:</h6>
                        <a class="collapse-item" href="Fuelahemdabad.php">ahemdabad</a>
                        <a class="collapse-item" href="Fuelbanglore.php">banglore</a>
                        <a class="collapse-item" href="Fuelhyderabad.php">hyderabad</a>
                        <a class="collapse-item" href="Fuelmumbai.php">mumbai</a>
                        <a class="collapse-item" href="Fuelpune.php">pune</a>
                        <a class="collapse-item" href="Fuelrajkot.php">rajkot</a>
                        <a class="collapse-item" href="Fuelsurat.php">surat</a>
                        <a class="collapse-item" href="Fuelvadodara.php">vadodara</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Find EV data</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">All City:</h6>
                        <a class="collapse-item" href="evahemdabad.php">ahemdabad</a>
                        <a class="collapse-item" href="evbanglore.php">banglore</a>
                        <a class="collapse-item" href="evhyderabad.php">hyderabad</a>
                        <a class="collapse-item" href="evmumbai.php">mumbai</a>
                        <a class="collapse-item" href="evpune.php">pune</a>
                        <a class="collapse-item" href="evrajkot.php">rajkot</a>
                        <a class="collapse-item" href="evsurat.php">surat</a>
                        <a class="collapse-item" href="evvadodara.php">vadodara</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Car services
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiescarpack" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class='bx bxs-car'></i>
                    <span>Car Services Package</span>
                </a>
                <div id="collapseUtilitiescarpack" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">show & Add Data:</h6>
                        <a class="collapse-item" href="car-package.php">Show Services Package</a>
                        <a class="collapse-item" href="add-car-package.php">Add Services Package</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiescarrent" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class='bx bxs-car'></i>
                    <span>Car Rental Service</span>
                </a>
                <div id="collapseUtilitiescarrent" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">show & Add Data:</h6>
                        <a class="collapse-item" href="car-rent.php">Show Car Rent Data</a>
                        <a class="collapse-item" href="add-car-rent.php">Add car Rent Data</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiescarbook" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class='bx bxs-car'></i>
                    <span>Car Booking Service</span>
                </a>
                <div id="collapseUtilitiescarbook" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">show & Add Data:</h6>
                        <a class="collapse-item" href="car-booking.php">Show Car Data</a>
                        <a class="collapse-item" href="add-car-booking.php">Add car Data</a>
                        <a class="collapse-item" href="add-car-slider.php">Add car Slider</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiescarins" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class='bx bxs-car'></i>
                    <span>Car Insurance Service</span>
                </a>
                <div id="collapseUtilitiescarins" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">show & Add Data:</h6>
                        <a class="collapse-item" href="show-insurance.php">Show Insurance Data</a>
                        <a class="collapse-item" href="add-show-insurance.php">Add Insurance Data</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="used-car.php">
                    <i class='bx bxs-car'></i>
                    <span>Used car</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                RSA Service
            </div>
            <li class="nav-item">
                <a class="nav-link" href="RSA.php">
                    <i class='bx bxs-car-mechanic'></i>
                    <span>RSA Service</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Other Services
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="contact.php">
                    <i class='bx bxs-contact'></i>
                    <span>Contact Us</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="News.php">
                    <i class='bx bxs-news'></i>
                    <span>News</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="mechanic_reg.php">
                    <i class='bx bxs-user'></i>
                    <span>mechanic Data</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="tables.php">
                    <i class='bx bx-news'></i>
                    <span>News</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Logout
            </div>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class='bx bx-log-out-circle'></i>
                    <span>Logout</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <div class="text-center w-100">
                        <h1 class="blink">Car Solution Admin Dashboard</h1>
                    </div>

                </nav>
                <!-- End of Topbar -->

                <div class="container-fluid" style="overflow-x: auto;">
                    <div class="table-container">
                        <h1 class="text-center p-3">Mechanic Register Data</h1>
                        <table id="example" class="display dataTable table-dark table-bordered text-center" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Phone Number</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">password</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($GetData)) {
                                ?>
                                    <tr class="table-light border-bottom border-dark" style="text-align: left;">
                                        <td class="text-center" style="text-align: left;"><img class="rounded-circle" src="Car-Service-Project/image/<?php echo $row['photo']; ?>" width="50" height="50"></td>
                                        <td class="text-center"><?php echo $row['name'] ?></td>
                                        <td class="text-center"><?php echo $row['email'] ?></td>
                                        <td class="text-center"><?php echo $row['phone_number'] ?></td>
                                        <td class="text-center"><?php echo $row['username'] ?></td>
                                        <td class="text-center"><?php echo $row['password'] ?></td>
                                        <td class="text-center"  style="text-align: left;"><a href="user.php?delete=<?php echo $row['id'] ?>" onclick=" return confirm('Are You Sure Record Delete !!!') " class="fs-2 text-dark active" role="button" aria-pressed="true"><i class='bx bx-trash'></i></a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#example');
    </script>

</body>

</html>