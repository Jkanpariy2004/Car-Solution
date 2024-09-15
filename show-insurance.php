<?php
session_start();

$_SESSION['timeout'] = time() + 10800;
if (isset($_SESSION['timeout']) && time() > $_SESSION['timeout']) {
    session_unset();
    session_destroy();

    header("Location:Login.php");
}
$db = mysqli_connect('localhost', 'root', '', 'car_service');
// if ($_SESSION['email'] == '') {
// 	header("location:Login_admin.php");
// }

if ($_SESSION['email'] == '') {
    header("location:Login.php");
}

$view = "Select * from insurance";
$GetData = mysqli_query($db, $view);


if (isset($_REQUEST['delete'])) {
    $id = $_REQUEST['delete'];

    $sql = "delete from insurance where id='$id' ";
    mysqli_query($db, $sql);
    header("location:show-insurance.php");
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

                <div class="container-fluid" style="overflow-x:auto;">
                    <div class="table-container">
                        <h1 class="text-center p-3">Car insurance Data</h1>
                        <table id="example" class="display dataTable table-dark table-bordered text-center" style="width: 100%;">
                            <thead>
                                <tr class="text-white">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Car number</th>
                                    <th>RC Book Number</th>
                                    <th>Pan Card Number</th>
                                    <th>How old car</th>
                                    <th>Insurance Type</th>
                                    <th>Price</th>
                                    <th>Policy Number</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Fetch data from r_s_a table
                                // $GetData = mysqli_query($db, "SELECT * FROM r_s_a");
                                while ($row = mysqli_fetch_array($GetData)) {
                                ?>
                                    <tr class="table-light border-bottom border-dark">
                                        <td><?php echo $row['username'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['mobile'] ?></td>
                                        <td><?php echo $row['car_number'] ?></td>
                                        <td><?php echo $row['rc_book'] ?></td>
                                        <td><?php echo $row['pan_card'] ?></td>
                                        <td><?php echo $row['old_car'] ?></td>
                                        <td><?php echo $row['insurance_type'] ?></td>
                                        <td><?php echo $row['price'] ?></td>
                                        <td><?php echo $row['policy_number'] ?></td>
                                        <td>
                                            <a href="show-insurance.php?delete=<?php echo $row['id'] ?>" onclick="return confirm('Are You Sure Record Delete !!!')" class="fs-2 text-dark active" role="button" aria-pressed="true">
                                                <i class='bx bx-trash'></i>
                                            </a>
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

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#example');
    </script>

</body>

</html>