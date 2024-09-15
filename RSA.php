<?php
session_start();

$_SESSION['timeout'] = time() + 10800;
if (isset($_SESSION['timeout']) && time() > $_SESSION['timeout']) {
    session_unset();
    session_destroy();

    header("Location:Login.php");
}
// include("database.php");
$db = mysqli_connect('localhost', 'root', '', 'car_service');

if ($_SESSION['email'] == '') {
    header("location:Login.php");
}

$view = "Select * from r_s_a";
$GetData = mysqli_query($db, $view);

$view1 = "Select * from r_s_a";
$GetData1 = mysqli_query($db, $view1);

if (isset($_REQUEST['delete'])) {
    $id = $_REQUEST['delete'];

    $sql = "delete from r_s_a where id='$id' ";
    mysqli_query($db, $sql);
    header("location:RSA.php");
}

if (isset($_REQUEST['btnsubmit'])) {
    $id = $_REQUEST['id'];
    $name = $_REQUEST['name'];
    $mobile = $_REQUEST['mobile'];
    $email = $_REQUEST['email'];
    $pickup_point = $_REQUEST['pickup'];
    $address = $_REQUEST['address'];
    $latitude = $_REQUEST['latitude'];
    $longitude = $_REQUEST['longitude'];
    $booking_id = $_REQUEST['booking_id'];

    $sql = "insert into mechanic (rsa_id,username, mobile, email, pickup_point, address, latitude, longitude,booking_id,status) select id,username, mobile, email, pickup_point, address, latitude, longitude,booking_id,'unaccept' from r_s_a WHERE id = $id";
    mysqli_query($db, $sql);

    if (mysqli_affected_rows($db)) {
        echo '<script>
            alert("RSA Request Successfully Transfer To Mechanic.");
            window.location.href = "RSA.php";
        </script>';
    } else {
        echo '<script>
            alert("Error: RSA Request Successfully Transfer To Mechanic.");
        </script>';
    }
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
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include("sidenavbar.php"); ?>


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

                <!-- Begin Page Content -->

                <div class="container-fluid">
                    <div class="table-container">
                        <h1 class="text-center p-3 border-bottom border-dark">RSA Service Request Data</h1>
                        <table id="example" class="display dataTable table-dark table-bordered text-center" style="width: 100%;">
                            <thead>
                                <tr class="text-white">
                                    <th>Username</th>
                                    <th>Mobile No.</th>
                                    <th>Email</th>
                                    <th>PickUp Point</th>
                                    <th>Address</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Booking ID</th>
                                    <th>Delete</th>
                                    <th>Transfer Request</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $GetData = mysqli_query($db, "SELECT * FROM r_s_a");
                                while ($row = mysqli_fetch_array($GetData)) {
                                ?>
                                    <tr class="table-light border-bottom border-dark">
                                        <td class="text-center p-2"><?php echo $row['username'] ?></td>
                                        <td><?php echo $row['mobile'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['pickup_point'] ?></td>
                                        <td><?php echo $row['address'] ?></td>
                                        <td><?php echo $row['latitude'] ?></td>
                                        <td><?php echo $row['longitude'] ?></td>
                                        <td><?php echo $row['booking_id'] ?></td>
                                        <td>
                                            <a href="RSA.php?delete=<?php echo $row['id'] ?>" onclick="return confirm('Are You Sure Record Delete !!!')" class="fs-2 text-dark active" role="button" aria-pressed="true">
                                                <i class='bx bx-trash'></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="" method="post">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <input type="hidden" name="name" value="<?php echo $row['username']; ?>">
                                                <input type="hidden" name="mobile" value="<?php echo $row['mobile']; ?>">
                                                <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                                                <input type="hidden" name="pickup" value="<?php echo $row['pickup_point']; ?>">
                                                <input type="hidden" name="address" value="<?php echo $row['address']; ?>">
                                                <input type="hidden" name="latitude" value="<?php echo $row['latitude']; ?>">
                                                <input type="hidden" name="longitude" value="<?php echo $row['longitude']; ?>">
                                                <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>">
                                                <input type="submit" class="btn btn-success rounded-3" value="Transfer" name="btnsubmit">
                                            </form>
                                        </td>
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
    <!-- data table -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#example');
    </script>

</body>

</html>