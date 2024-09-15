<?php
session_start();

$_SESSION['timeout'] = time() + 10800;
if (isset($_SESSION['timeout']) && time() > $_SESSION['timeout']) {
    session_unset();
    session_destroy();

    header("Location:mechanic-Login.php");
}
include("database.php");

if ($_SESSION['username'] == '') {
    header("location:Mechanic-Login.php");
}

$view = "Select * from mechanic";
$GetData = mysqli_query($db, $view);

if (isset($_REQUEST['delete'])) {
    $_SESSION['id'] = $id;
    $id = $_REQUEST['delete'];

    $sql = "delete from mechanic where id='$id' ";
    mysqli_query($db, $sql);
    header("location:mechanic.php");
}

if (isset($_REQUEST['accept']) || isset($_REQUEST['unaccept'])) {
    if (isset($_REQUEST['accept'])) {
        $id = $_REQUEST['accept'];
        $updateQuery = "update mechanic set status='accept' where id='$id'";
    } elseif (isset($_REQUEST['unaccept'])) {
        $id = $_REQUEST['unaccept'];
        $updateQuery = "update mechanic set status='unaccept' where id='$id'";
    }
    mysqli_query($db, $updateQuery);
    header("location: mechanic.php");
}
?>

<!DOCTYPE php>
<php lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Car Solution Mechanic Dashboard</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link rel="stylesheet" href="icon/css/all.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- data table -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">

        <style>
            .table-container {
                border: 1px solid #000;
                border-radius: 10px;
                padding: 10px;
                margin: auto;
                margin-top: 50px;
                margin-right: 10px;
                margin-left: 10px;
                margin-bottom: 10px;
                padding-left: 10px;
                padding-right: 10px;
            }

            table tr th {
                font-size: 12px;
                padding: 5px;
            }

            #map {
                height: 400px;
                width: 100%;
            }

            a{
                text-decoration: none;
            }

            a:hover{
                text-decoration: none;
            }
        </style>
    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                    <div class="sidebar-brand-icon">
                        <img src="img/logo.png" class="rounded-circle" alt="" height="50" width="50">
                    </div>
                    <div class="sidebar-brand-text mx-3">Mechanic Dashboard</div>
                </a>

                <hr class="sidebar-divider d-none d-md-block">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Service
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item active">
                    <a class="nav-link" href="mechanic.php">
                        <i class='bx bx-user'></i>
                        <span>Service Request</span>
                    </a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Show Profile
                </div>
                <li class="nav-item active">
                    <a class="nav-link" href="ShowProfile.php">
                        <i class='bx bx-user'></i>
                        <span>Show Profile</span>
                    </a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Logout
                </div>
                <li class="nav-item active">
                    <a class="nav-link" href="logout_mechanic.php">
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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <div class="text-center w-100">
                        <h1 class="blink">Car Solution Mechanic Dashboard</h1>
                    </div>

                </nav>
                <!-- Main Content -->
                <div id="content">
                    <div class="container-fluid" style="overflow-x:auto;">
                        <div class="table-container">
                            <h1 class="text-center p-3 border-bottom border-dark">mechanic Report To service</h1>
                            <table id="example" class="display dataTable table-dark table-bordered text-center" style="width: 100%;">
                                <thead>
                                    <tr class="text-white">
                                        <th>RSA id</th>
                                        <th>Name</th>
                                        <th>Mobile No.</th>
                                        <th>Email</th>
                                        <th>PickUp Point</th>
                                        <th>Address</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Booking Id</th>
                                        <th>Delete</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($GetData)) {
                                    ?>
                                        <tr class="table-light border-bottom border-dark">
                                            <td class="text-center"><?php echo $row['rsa_id'] ?></td>
                                            <td class="text-center"><?php echo $row['username'] ?></td>
                                            <td class="text-center"><?php echo $row['mobile'] ?></td>
                                            <td class="text-center"><?php echo $row['email'] ?></td>
                                            <td class="text-center"><?php echo $row['pickup_point'] ?></td>
                                            <td class="text-center"><?php echo $row['address'] ?></td>
                                            <td class="text-center"><?php echo $row['latitude'] ?></td>
                                            <td class="text-center"><?php echo $row['longitude'] ?></td>
                                            <td class="text-center"><?php echo $row['booking_id'] ?></td>
                                            <td class="text-center"><a href="mechanic.php?delete=<?php echo $row['id'] ?>" onclick=" return confirm('Are You Sure Record Delete !!!') " class="fs-2 text-dark active" role="button" aria-pressed="true"><i class='bx bx-trash'></i></a></td>
                                            <td class="text-center">
                                                <?php
                                                if ($row['status'] == 'accept') {
                                                    echo '<a href="mechanic.php?unaccept=' . $row['id'] . '">' . $row['status'] . '</a>';
                                                } elseif ($row['status'] == 'unaccept') {
                                                    echo '<a href="mechanic.php?accept=' . $row['id'] . '">' . $row['status'] . '</a>';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-container my-5">

                            <form method="post">
                                <div id="map"></div>
                                <div class="text-center w-100 mt-2 mb-2">
                                    <h1>Live Location Viewer</h1>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control rounded-3" required autocomplete="off" id="latitude" placeholder="" required>
                                    <label for="latitude">Enter Latitude Address</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control rounded-3" required autocomplete="off" id="longitude" placeholder="" required>
                                    <label for="longitude">Enter Longitude Address</label>
                                </div>

                                <div>
                                    <button type="button" onclick="showLocation()" class="btn btn-success w-100">Show Location</button>
                                </div>
                            </form>

                            <script>
                                let map;
                                let marker;

                                function initMap() {
                                    map = new google.maps.Map(document.getElementById("map"), {
                                        center: {
                                            lat: 0,
                                            lng: 0
                                        },
                                        zoom: 8
                                    });
                                }

                                function showLocation() {
                                    const latitude = parseFloat(document.getElementById("latitude").value);
                                    const longitude = parseFloat(document.getElementById("longitude").value);

                                    if (isNaN(latitude) || isNaN(longitude)) {
                                        alert("Please enter valid latitude and longitude values.");
                                        return;
                                    }

                                    const location = {
                                        lat: latitude,
                                        lng: longitude
                                    };

                                    if (!marker) {
                                        marker = new google.maps.Marker({
                                            position: location,
                                            map: map,
                                            title: "Location"
                                        });
                                    } else {
                                        marker.setPosition(location);
                                    }

                                    map.setCenter(location);
                                }
                            </script>
                            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGllXdpBQ-adMBoWxzfuJbNS5s-QErvKA&callback=initMap"></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

        <!-- data table -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
        <script>
            new DataTable('#example');
        </script>

    </body>

</php>